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
$access_subcategory = 'queueskillrules';

$appqueue = &$ipbx->get_application('queue',null,false);

include(dwho_file::joinpath(dirname(__FILE__),'..','_common.php'));

$act = $_QRY->get('act');

switch($act)
{
	case 'delete':
		if(dwho_is_uint($_QRY->get('id')) === false)
		    $status = 400;
		else if($appqueue->skillrules_getone($_QRY->get('id')) === false)
		    $status = 404;
		else if($appqueue->skillrules_delete($_QRY->get('id')) === false)
			$status = 500;
		else
			$status = 200;

		$http_response->set_status_line($status);
		$http_response->send(true);
		break;

	case 'add':
	    $id     = false;
	    $data = $appqueue->_get_data_from_json();

		if($data === false
		|| !array_key_exists('name', $data)
		|| !array_key_exists('rule', $data)
		|| ($id = $appqueue->skillrules_save($data['name'], $data['rule'])) === false)
		{
    		$http_response->set_status_line(500);
    		$http_response->send(true);
    	}

		$_TPL->set_var('list',$appqueue->get_result('id'));
		break;

	case 'view':
		if(dwho_is_uint($_QRY->get('id')) === false
		|| ($info = $appqueue->skillrules_getone($_QRY->get('id'))) === false)
		{
			$http_response->set_status_line(204);
			$http_response->send(true);
		}

		$_TPL->set_var('info',$info);
		break;

	case 'search':
		if(dwho_has_len($_QRY->get('search')) === false
		|| ($list = $appqueue->skillrules_getall($_QRY->get('search'), null, true)) === false)
		{
			$http_response->set_status_line(204);
			$http_response->send(true);
		}

        foreach($list as &$elt)
        {
            if(array_key_exists('rule', $elt))
                $elt['rule'] = split(';', $elt['rule']);
        }
		$_TPL->set_var('list',$list);
		break;

	case 'list':
	default:
		if(($list = $appqueue->skillrules_getall()) === false)
		{
			$http_response->set_status_line(204);
			$http_response->send(true);
		}

        foreach($list as &$elt)
        {
            if(array_key_exists('rule', $elt))
                $elt['rule'] = split(';', $elt['rule']);
        }
		$_TPL->set_var('list',$list);
}

$_TPL->set_var('act',$act);
$_TPL->set_var('sum',$_QRY->get('sum'));
$_TPL->display('/service/ipbx/'.$ipbx->get_name().'/generic');

?>
