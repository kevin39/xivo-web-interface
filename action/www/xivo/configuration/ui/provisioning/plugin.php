<?php

#
# XiVO Web-Interface
# Copyright (C) 2006-2011  Proformatique <technique@proformatique.com>
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
#

$access_category = 'provisioning';
$access_subcategory = 'plugin';

include(dwho_file::joinpath(dirname(__FILE__),'..','_common.php'));

$act = $_QRY->get('act');

$provdplugin = &$_XOBJ->get_module('provdplugin');

switch($act)
{
	case 'install':
		if (isset($_QR['id']) === false
		|| $provdplugin->install($_QR['id']) === false)
		{
			$http_response->set_status_line(400);
			$http_response->send(true);
		}
		
		$_TPL->display('/xivo/configuration/provisioning/generic');
		break;
	case 'install-pkgs':
		if (isset($_QR['id']) === false
		|| isset($_QR['plugin']) === false
		|| ($location = $provdplugin->install_pkgs($_QR['plugin'],$_QR['id'])) === false)
		{
			$http_response->set_status_line(400);
			$http_response->send(true);
		}
		die($location);
		break;
	case 'getparams':
		if (isset($_QR['uri']) === false
		|| ($uri = $_QR['uri']) === ''
		|| (($res = $provdplugin->get_params($uri))) === false
		|| isset($res['value']) === false)
		{
			dwho_report::push('error',dwho_i18n::babelfish('error_during_get_params',array($value)));
			$http_response->set_status_line(400);
			$http_response->send(true);
		}
		die($res['value']);
		break;
	case 'editparams':
		if (isset($_QR['uri']) === false
		|| ($uri = $_QR['uri']) === ''
		|| isset($_QR['value']) === false
		|| ($provdplugin->edit_params($uri,$_QR['value'])) === false) 
		{
			dwho_report::push('error',dwho_i18n::babelfish('error_during_edit_params',array($_QR['value'])));
			die(dwho_report::get_message('error'));
		}
		else
		{
			dwho_report::push('info','params_successfully_updated');
			die(dwho_report::get_message('info'));
		}
		break;
	case 'request_oip':
		if(dwho::load_class('dwho_json') === false)
		{
			$http_response->set_status_line(500);
			$http_response->send(true);
		}		
		elseif (isset($_QR['path']) === false
		|| isset($_QR['id']) === false
		|| ($path = urldecode($_QR['path'])) === false
		|| ($r = $provdplugin->request_oip($path)) === false
		|| ($data = dwho_json::decode($r,true)) === false
		|| isset($data['status']) === false)
		{
			$http_response->set_status_line(400);
			$http_response->send(true);
		}
		
		$status = $data['status'];
		$regex = '/(?:(\w+)\|)?(\w+)(?:;(\d+)(?:\/(\d+))?)?/';
		preg_match_all($regex,$status,$out);
		
		if (($nbout = count($out)) === 0
		|| ($nb = count($out[0])) === 0)
		{
			$http_response->set_status_line(204);
			$http_response->send(true);
		}
		
		$header = array_shift($out);
		$nbout--;
		
		$res = array();
		for ($i=0;$i<$nbout;$i++)
		{
			$ref = &$out[$i];
			for ($k=0;$k<$nb;$k++)
			{
				if (isset($res[$k]) === false)
					$res[$k] = array();
				if ($i > 1 && is_numeric($ref[$k]) === true)
					$ref[$k] = (int) $ref[$k];
				array_push($res[$k], $ref[$k]);
			}
		}
		
		$nbres = count($res);
		$rs = '';
		$rs .= "<ul>";
		for ($i=0;$i<$nbres;$i++)
		{
			$ref = &$res[$i];
			$nb = count($ref);
			$rs .= "<li>";
			for ($k=0;$k<$nb;$k++)
			{
				$str = &$ref[$k];
				switch($k)
				{
					case 0:
						if (empty($str) === false)
						$rs .= "<b>$str</b>:";
						break;
					case 1:
						$query = array();
						$query['act'] = 'edit';
						$query['id'] = $_QR['id'];
						$q = $_QRY->build_query_str($query);
						if ($str === 'success')
						{
							dwho_report::push('info',dwho_i18n::babelfish('successfully_installed',array($_QR['id'])));
							$_SESSION['_report'] = dwho_report::encode();
							die($_TPL->url('xivo/configuration/provisioning/plugin').'?'.$q);
						}
						elseif ($str === 'fail')
						{
							dwho_report::push('error',dwho_i18n::babelfish('error_during_installation',array($_QR['id'])));
							$_SESSION['_report'] = dwho_report::encode();
							die($_TPL->url('xivo/configuration/provisioning/plugin').'?'.$q);
						}
						$rs .= " $str";
						break;
					case 2:
						if ($str === '') break;
						$rs .= " ->  $str /";
						break;
					case 3:
						if ($str === '') break;
						$rs .= " $str";
						break;
				}		
			}
			$rs .= "</li>";
		}
		$rs .= "</ul>";
		
		die($rs);
		break;
	case 'list':
	default:
		$act = 'list';
		dwho_var_dump('list');
		die;
		$_TPL->set_var('act',$act);
		$_TPL->display('/xivo/configuration/provisioning/generic');
		break;
}

?>