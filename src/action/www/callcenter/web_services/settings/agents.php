<?php

#
# XiVO Web-Interface
# Copyright (C) 2006-2014  Avencall
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

$access_category = 'settings';
$access_subcategory = 'agents';

include(dwho_file::joinpath(dirname(__FILE__),'..','_common.php'));

$act = $_QRY->get('act');

switch($act)
{
	case 'view':
		if ($_QRY->get('id') === null)
		{
			$http_response->set_status_line(404);
			$http_response->send(true);
		}
		$appagent = &$ipbx->get_application('agent');

		$nocomponents = array('contextmember' => true);

		if(($info = $appagent->get($_QRY->get('id'),
					   null,
					   $nocomponents)) === false
		&& ($info = $appagent->get_by_number($_QRY->get('id'))) === false)
		{
			dwho_error_log($appagent->get_error());
			$http_response->set_status_line(204);
			$http_response->send(true);
		}

		$_TPL->set_var('info',$info);
		break;
	case 'add':
		$appagent = &$ipbx->get_application('agent');

		if($appagent->add_from_json() === true)
			$status = 200;
		else
			$status = 400;

		dwho_error_log($appagent->get_error(), $status);

		$http_response->set_status_line($status);
		$http_response->send(true);
		break;
	case 'edit':
		$appagent = &$ipbx->get_application('agent');
		if(($info = $appagent->get($_QRY->get('id'))) === false)
			$status = 204;
		elseif($appagent->edit_from_json($info) === true)
			$status = 200;
		else
			$status = 400;

		dwho_error_log($appagent->get_error(), $status);

		$http_response->set_status_line($status);
		$http_response->send(true);
		break;
	case 'delete':
		$appagent = &$ipbx->get_application('agent');

		if($appagent->get($_QRY->get('id')) === false)
			$status = 404;
		else if($appagent->delete() === true)
			$status = 200;
		else
			$status = 500;

		dwho_error_log($appagent->get_error(), $status);

		$http_response->set_status_line($status);
		$http_response->send(true);
		break;
	case 'deleteall':
		$appagent = &$ipbx->get_application('agent');

		if(($list = $appagent->get_agents_list()) === false
		|| ($nb = count($list)) === 0)
		{
			$http_response->set_status_line(204);
			$http_response->send(true);
		}
		for ($i=0; $i<$nb; $i++)
		{
			$ref = &$list[$i];
			$appagent->get($ref['agentfeatures']['id']);
			$appagent->delete();
		}
		$status = 200;

		$http_response->set_status_line($status);
		$http_response->send(true);
		break;
	case 'search':
		$appagent = &$ipbx->get_application('agent',null,false);

		if(($list = $appagent->get_agents_search($_QRY->get('search'))) === false)
		{
			$http_response->set_status_line(204);
			$http_response->send(true);
		}

		$_TPL->set_var('list',$list);
		break;
	case 'list':
	default:
		$act = 'list';

		$appagent = &$ipbx->get_application('agent',null,false);

		if(($list = $appagent->get_agents_list()) === false)
		{
			$http_response->set_status_line(204);
			$http_response->send(true);
		}

		$_TPL->set_var('list',$list);
}

$_TPL->set_var('act',$act);
$_TPL->set_var('sum',$_QRY->get('sum'));
$_TPL->display('/service/ipbx/'.$ipbx->get_name().'/call_center/agents');

?>
