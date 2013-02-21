<?php
#
# XiVO Web-Interface
# Copyright (C) 2006-2012  Avencall
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

$access_category = 'configuration';
$access_subcategory = '';

include(dwho_file::joinpath(dirname(__FILE__),'_common.php'));

$starttime = microtime(true);

$ctidirectories = &$ipbx->get_module('ctidirectories');
$ctidirectoryfld = &$ipbx->get_module('ctidirectoryfields');
$ctisheetactions = &$ipbx->get_module('ctisheetactions');
$ctisheetevents = &$ipbx->get_module('ctisheetevents');
$ctistatus = &$ipbx->get_module('ctistatus');
$ctipresences = &$ipbx->get_module('ctipresences');
$ldapfilter = &$ipbx->get_module('ldapfilter');

xivo::load_class('xivo_ldapserver',XIVO_PATH_OBJECT,null,false);
$ldapserver = new xivo_ldapserver();

$load_directories = $ctidirectories->get_all();
$load_sheetactions = $ctisheetactions->get_all();
$load_sheetevents = $ctisheetevents->get_all();
$load_presences = $ctipresences->get_all();

$out = array(
	'directories'	  => array(),
	'sheets'		   => array(),
	# object display options referred to by the profiles
	'userstatus'	   => array()
);

# DIRECTORIES
if(isset($load_directories) === true && is_array($load_directories) === true)
{
	$dirout = array();

	foreach($load_directories as $dir)
	{
		$uri = $dir['uri'];
		if(strpos($uri, 'ldapfilter://') === 0)
		{
			if(is_null($filterid = $ldapfilter->get_primary(array('name'=> substr($uri, 13)))))
				continue;

			$filter = $ldapfilter->get($filterid);
			$server = $ldapserver->get($filter['ldapserverid']);

			// formatting ldap uri
			$uri  = sprintf("%s://%s:%s@%s:%s/%s???%s",
				($server['securitylayer'] == 'ssl' ? 'ldaps' : 'ldap'),
				$filter['user'],
				$filter['passwd'],
				$server['host'],
				$server['port'],
				$filter['basedn'],
				rawurlencode($filter['filter']));
		}

		$dird_match_direct = dwho_json::decode($dir['match_direct'], true);
		$dird_match_reverse = dwho_json::decode($dir['match_reverse'], true);

		$dirid = $dir['name'];
		$dirout[$dirid]['uri'] = $uri;
		$dirout[$dirid]['delimiter'] = $dir['delimiter'];
		$dirout[$dirid]['name'] = $dir['description'];
		$dirout[$dirid]['match_direct'] = $dird_match_direct == false ? array() : $dird_match_direct;
		$dirout[$dirid]['match_reverse'] = $dird_match_reverse == false ? array() : $dird_match_reverse;

		$fields = $ctidirectoryfld->get_all_where(array('dir_id' => $dir['id']));
		foreach($fields as $field)
			$dirout[$dirid]['field_' . $field['fieldname']] = array($field['value']);
	}
	$out['directories'] = $dirout;
}

# SHEETS
$sheetsout = array();
if(isset($load_sheetevents,$load_sheetevents[0]))
{
	$evtout = array();
	foreach(array_keys($load_sheetevents[0]) as $k)
	{
		if($k == 'id')
			continue;
		if($load_sheetevents[0][$k] == "")
			continue;
		$eventdef = array();
		$eventdef["display"] = $load_sheetevents[0][$k];
		$eventdef["option"] = $load_sheetevents[0][$k];
		$eventdef["condition"] = $load_sheetevents[0][$k];
		$evtout[$k][] = $eventdef;
	}
	$out['sheets']['events'] = $evtout;
}
if(isset($load_sheetactions) === true
&& is_array($load_sheetactions) === true)
{
	$optout = array();
	$dispout = array();
	$condout = array();

	foreach($load_sheetactions as $action)
	{
		$actid = $action['name'];

		$optout[$actid]['focus'] = $action['focus'] == 1 ? "yes" : "no";
		$optout[$actid]['zip'] = 1;

		$condout[$actid]['whom'] = $action['whom'];

		$arr = dwho_json::decode($action['sheet_info'], true);
		$qtui = "null";

		if(is_array($arr) === true)
		{
			foreach($arr as $k=>$v)
			{
				$a1 = $arr[$k];
				if($a1[1] == 'form')
					$qtui = $a1[3];
			}
		}
		$dispout[$actid]['systray_info'] = dwho_json::decode($action['systray_info'], true) == false ? array() : dwho_json::decode($action['systray_info'], true);
		$dispout[$actid]['sheet_info'] = dwho_json::decode($action['sheet_info'], true) == false ? array() : dwho_json::decode($action['sheet_info'], true);
		$dispout[$actid]['action_info'] = dwho_json::decode($action['action_info'], true) == false ? array() : dwho_json::decode($action['action_info'], true);
		$dispout[$actid]['sheet_qtui'][$qtui] = $action['sheet_qtui'];
	}
	$out['sheets']['options'] = $optout;
	$out['sheets']['displays'] = $dispout;
	$out['sheets']['conditions'] = $condout;
}

# PRESENCES (USER STATUSES)
if(isset($load_presences) === true
&& is_array($load_presences) === true)
{
	$presout = array();
	foreach($load_presences as $pres)
	{
		$presid = $pres['name'];
		$id = $pres['id'];
		$where = array();
		$where['presence_id'] = $id;
		if(($load_status = $ctistatus->get_all_where($where)) === false)
			continue;

		$statref = array();
		foreach($load_status as $stat)
			$statref[$stat['id']] = $stat['name'];

		foreach($load_status as $stat)
		{
			$name = $stat['name'];
			$presout[$presid][$name]['longname'] = $stat['display_name'];
			$presout[$presid][$name]['color'] = $stat['color'];
			$accessids = $stat['access_status'];

			$accessstatus = array();
			foreach(explode(',', $accessids) as $i)
				if (isset($statref[$i]))
					$accessstatus[] = $statref[$i];
			if(!empty($accessstatus)) {
				$presout[$presid][$name]['allowed'] = $accessstatus;
			}

			$actions = explode(',', $stat['actions']);
			$pattern = '/^(.*)\((.*)\)/';
			$actionsout = array();
			foreach($actions as $a)
			{
				if (preg_match($pattern, $a, $match) > 0)
					$actionsout[$match[1]] = $match[2];
			}
			if(!empty($actionsout)) {
				$presout[$presid][$name]['actions'] = $actionsout;
			}
		}
	}
	$out['userstatus'] = $presout;
}

$out['bench'] = (float) (microtime(true) - $starttime);

$_TPL->set_var('info',$out);
$_TPL->set_var('sum',$_QRY->get('sum'));
$_TPL->display('/genericjson');

?>
