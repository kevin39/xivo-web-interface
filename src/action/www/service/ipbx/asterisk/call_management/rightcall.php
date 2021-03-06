<?php

#
# XiVO Web-Interface
# Copyright (C) 2006-2016 Avencall
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

$act = isset($_QR['act']) === true ? $_QR['act'] : '';
$page = isset($_QR['page']) === true ? dwho_uint($_QR['page'],1) : 1;

$param = array();
$param['act'] = 'list';

switch($act)
{
	case 'add':
		$apprightcall = &$ipbx->get_application('rightcall');

		$result = $fm_save = $error = null;

		$rcalluser = $rcallgroup = $rcallincall = $rcalloutcall = array();
		$rcalluser['slt'] = $rcallgroup['slt'] = $rcallincall['slt'] = $rcalloutcall['slt'] = null;

		$userorder = array();
		$userorder['firstname'] = SORT_ASC;
		$userorder['lastname'] = SORT_ASC;

		$appuser = &$ipbx->get_application('user',null);
		$rcalluser['list'] = $appuser->get_users_list(null,$userorder,null,true);

		$grouporder = array();
		$grouporder['name'] = SORT_ASC;
		$grouporder['number'] = SORT_ASC;
		$grouporder['context'] = SORT_ASC;

		$appgroup = &$ipbx->get_application('group',null,false);
		$rcallgroup['list'] = $appgroup->get_groups_list(null,$grouporder,null,true);

		$incallorder = array();
		$incallorder['exten'] = SORT_ASC;
		$incallorder['context'] = SORT_ASC;

		$appincall = &$ipbx->get_application('incall',null,false);
		$rcallincall['list'] = $appincall->get_incalls_list(null,$incallorder,null,true);

		$outcallorder = array();
		$outcallorder['name'] = SORT_ASC;
		$outcallorder['context'] = SORT_ASC;

		$appoutcall = &$ipbx->get_application('outcall',null,false);
		$rcalloutcall['list'] = $appoutcall->get_outcalls_list(null,$outcallorder,null,true);

		if(isset($_QR['fm_send']) === true && dwho_issa('rightcall',$_QR) === true)
		{
			if($apprightcall->set_add($_QR) === false
			|| $apprightcall->add() === false)
			{
				$fm_save = false;
				$result = $apprightcall->get_result();
				$error = $apprightcall->get_error();
			}
			else
				$_QRY->go($_TPL->url('service/ipbx/call_management/rightcall'),$param);
		}

		dwho::load_class('dwho_sort');

		if($rcalluser['list'] !== false && dwho_issa('rightcalluser',$result) === true
		&& ($rcalluser['slt'] = dwho_array_intersect_key($result['rightcalluser'],$rcalluser['list'],'typeval')) !== false)
			$rcalluser['slt'] = array_keys($rcalluser['slt']);

		if($rcallgroup['list'] !== false && dwho_issa('rightcallgroup',$result) === true
		&& ($rcallgroup['slt'] = dwho_array_intersect_key($result['rightcallgroup'],$rcallgroup['list'],'typeval')) !== false)
			$rcallgroup['slt'] = array_keys($rcallgroup['slt']);

		if($rcallincall['list'] !== false && dwho_issa('rightcallincall',$result) === true
		&& ($rcallincall['slt'] = dwho_array_intersect_key($result['rightcallincall'],$rcallincall['list'],'typeval')) !== false)
			$rcallincall['slt'] = array_keys($rcallincall['slt']);

		if($rcalloutcall['list'] !== false && dwho_issa('rightcalloutcall',$result) === true
		&& ($rcalloutcall['slt'] = dwho_array_intersect_key($result['rightcalloutcall'],$rcalloutcall['list'],'typeval')) !== false)
			$rcalloutcall['slt'] = array_keys($rcalloutcall['slt']);

		if(dwho_issa('rcallexten',$result) === true)
			$rcallexten = $result['rcallexten'];
		else
			$rcallexten = null;

		$dhtml = &$_TPL->get_module('dhtml');
		$dhtml->set_js('js/dwho/submenu.js');
		$dhtml->load_js_multiselect_files();

		$_TPL->set_var('rcalluser',$rcalluser);
		$_TPL->set_var('rcallgroup',$rcallgroup);
		$_TPL->set_var('rcallincall',$rcallincall);
		$_TPL->set_var('rcalloutcall',$rcalloutcall);
		$_TPL->set_var('rcallexten',$rcallexten);
		$_TPL->set_var('element',$apprightcall->get_elements());
		$_TPL->set_var('info',$result);
		$_TPL->set_var('error',$error);
		$_TPL->set_var('fm_save',$fm_save);
		break;
	case 'edit':
		$apprightcall = &$ipbx->get_application('rightcall');

		if(isset($_QR['id']) === false || ($info = $apprightcall->get($_QR['id'])) === false)
			$_QRY->go($_TPL->url('service/ipbx/call_management/rightcall'),$param);

		$result = $fm_save = $error = null;
		$return = &$info;

		$rcalluser = $rcallgroup = $rcallincall = $rcalloutcall = array();
		$rcalluser['slt'] = $rcallgroup['slt'] = $rcallincall['slt'] = $rcalloutcall['slt'] = null;

		$userorder = array();
		$userorder['firstname'] = SORT_ASC;
		$userorder['lastname'] = SORT_ASC;

		$appuser = &$ipbx->get_application('user',null);
		$rcalluser['list'] = $appuser->get_users_list(null,$userorder,null,true);

		$grouporder = array();
		$grouporder['name'] = SORT_ASC;
		$grouporder['number'] = SORT_ASC;
		$grouporder['context'] = SORT_ASC;

		$appgroup = &$ipbx->get_application('group',null,false);
		$rcallgroup['list'] = $appgroup->get_groups_list(null,$grouporder,null,true);

		$incallorder = array();
		$incallorder['exten'] = SORT_ASC;
		$incallorder['context'] = SORT_ASC;

		$appincall = &$ipbx->get_application('incall',null,false);
		$rcallincall['list'] = $appincall->get_incalls_list(null,$incallorder,null,true);

		$outcallorder = array();
		$outcallorder['name'] = SORT_ASC;
		$outcallorder['context'] = SORT_ASC;

		$appoutcall = &$ipbx->get_application('outcall',null,false);
		$rcalloutcall['list'] = $appoutcall->get_outcalls_list(null,$outcallorder,null,true);

		if(isset($_QR['fm_send']) === true && dwho_issa('rightcall',$_QR) === true)
		{
			$return = &$result;

			if($apprightcall->set_edit($_QR) === false
			|| $apprightcall->edit() === false)
			{
				$fm_save = false;
				$result = $apprightcall->get_result();
				$error = $apprightcall->get_error();
			}
			else
				$_QRY->go($_TPL->url('service/ipbx/call_management/rightcall'),$param);
		}

		dwho::load_class('dwho_sort');

		if($rcalluser['list'] !== false && dwho_issa('rightcalluser',$return) === true
		&& ($rcalluser['slt'] = dwho_array_intersect_key($return['rightcalluser'],$rcalluser['list'],'typeval')) !== false)
			$rcalluser['slt'] = array_keys($rcalluser['slt']);

		if($rcallgroup['list'] !== false && dwho_issa('rightcallgroup',$return) === true
		&& ($rcallgroup['slt'] = dwho_array_intersect_key($return['rightcallgroup'],$rcallgroup['list'],'typeval')) !== false)
			$rcallgroup['slt'] = array_keys($rcallgroup['slt']);

		if($rcallincall['list'] !== false && dwho_issa('rightcallincall',$return) === true
		&& ($rcallincall['slt'] = dwho_array_intersect_key($return['rightcallincall'],$rcallincall['list'],'typeval')) !== false)
			$rcallincall['slt'] = array_keys($rcallincall['slt']);

		if($rcalloutcall['list'] !== false && dwho_issa('rightcalloutcall',$return) === true
		&& ($rcalloutcall['slt'] = dwho_array_intersect_key($return['rightcalloutcall'],$rcalloutcall['list'],'typeval')) !== false)
			$rcalloutcall['slt'] = array_keys($rcalloutcall['slt']);

		if(dwho_issa('rightcallexten',$return) === false)
			$rcallexten = null;
		else
		{
			$rcallexten = $return['rightcallexten'];

			$extensort = new dwho_sort(array('key' => 'exten'));
			uasort($rcallexten,array($extensort,'str_usort'));
		}

		$dhtml = &$_TPL->get_module('dhtml');
		$dhtml->set_js('js/dwho/submenu.js');
		$dhtml->load_js_multiselect_files();

		$_TPL->set_var('id',$info['rightcall']['id']);
		$_TPL->set_var('rcalluser',$rcalluser);
		$_TPL->set_var('rcallgroup',$rcallgroup);
		$_TPL->set_var('rcallincall',$rcallincall);
		$_TPL->set_var('rcalloutcall',$rcalloutcall);
		$_TPL->set_var('rcallexten',$rcallexten);
		$_TPL->set_var('element',$apprightcall->get_elements());
		$_TPL->set_var('info',$return);
		$_TPL->set_var('error',$error);
		$_TPL->set_var('fm_save',$fm_save);
		break;
	case 'delete':
		$param['page'] = $page;

		$apprightcall = &$ipbx->get_application('rightcall');

		if(isset($_QR['id']) === false || $apprightcall->get($_QR['id']) === false)
			$_QRY->go($_TPL->url('service/ipbx/call_management/rightcall'),$param);

		$apprightcall->delete();

		$_QRY->go($_TPL->url('service/ipbx/call_management/rightcall'),$param);
		break;
	case 'deletes':
		$param['page'] = $page;

		if(($values = dwho_issa_val('rightcalls',$_QR)) === false)
			$_QRY->go($_TPL->url('service/ipbx/call_management/rightcall'),$param);

		$apprightcall = &$ipbx->get_application('rightcall');

		$nb = count($values);

		for($i = 0;$i < $nb;$i++)
		{
			if($apprightcall->get($values[$i]) !== false)
				$apprightcall->delete();
		}

		$_QRY->go($_TPL->url('service/ipbx/call_management/rightcall'),$param);
		break;
	case 'disables':
	case 'enables':
		$param['page'] = $page;
		$disable = $act === 'disables';

		if(($values = dwho_issa_val('rightcalls',$_QR)) === false)
			$_QRY->go($_TPL->url('service/ipbx/call_management/rightcall'),$param);

		$rightcall = &$ipbx->get_module('rightcall');

		$nb = count($values);

		for($i = 0;$i < $nb;$i++)
			$rightcall->disable($values[$i],$disable);

		$_QRY->go($_TPL->url('service/ipbx/call_management/rightcall'),$param);
		break;
	default:
		$act = 'list';
		$prevpage = $page - 1;
		$nbbypage = XIVO_SRE_IPBX_AST_NBBYPAGE;

		$apprightcall = &$ipbx->get_application('rightcall',null,false);

		$order = array();
		$order['name'] = SORT_ASC;

		$limit = array();
		$limit[0] = $prevpage * $nbbypage;
		$limit[1] = $nbbypage;

		$list = $apprightcall->get_rightcalls_list(null,$order,$limit);
		$total = $apprightcall->get_cnt();

		if($list === false && $total > 0 && $prevpage > 0)
		{
			$param['page'] = $prevpage;
			$_QRY->go($_TPL->url('service/ipbx/call_management/rightcall'),$param);
		}

		$_TPL->set_var('pager',dwho_calc_page($page,$nbbypage,$total));
		$_TPL->set_var('list',$list);
}

$menu = &$_TPL->get_module('menu');
$menu->set_top('top/user/'.$_USR->get_info('meta'));
$menu->set_left('left/service/ipbx/'.$ipbx->get_name());
$menu->set_toolbar('toolbar/service/ipbx/'.$ipbx->get_name().'/call_management/rightcall');

$_TPL->set_var('act',$act);
$_TPL->set_bloc('main','service/ipbx/'.$ipbx->get_name().'/call_management/rightcall/'.$act);
$_TPL->set_struct('service/ipbx/'.$ipbx->get_name());
$_TPL->display('index');

?>
