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

require_once('xivo.php');

if($_USR->mk_active() === false)
	$_QRY->go($_TPL->url('xivo/logoff'));
	
$location = str_replace('/index.php','',$_LOC->get_current_location());

if(xivo_user::chk_acl('','','service'.$location) === false)
	$_QRY->go($_TPL->url('xivo'));

$ipbx = &$_SRE->get('ipbx');

$dhtml = &$_TPL->get_module('dhtml');
$dhtml->set_css('css/statistics/statistics.css');
$dhtml->set_js('js/xivo_calendar.js');
$dhtml->add_js('/struct/js/date.js.php');

$action_path = $_LOC->get_action_path('statistics/call_center',0);

if($action_path === false)
	$_QRY->go($_TPL->url('xivo/logoff'));

die(include($action_path));

?>