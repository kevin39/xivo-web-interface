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

$array = array();

###################################################################
# CALLCENTER
###################################################################

$array['callcenter'] = array(
	'path'		=> 'callcenter/index');

$array['callcenter/web_services/restricted/settings/agents'] = array(
	'path'		=> 'callcenter/web_services/settings/agents',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['callcenter/web_services/restricted/settings/queues'] = array(
	'path'		=> 'callcenter/web_services/settings/queues',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['callcenter/web_services/restricted/settings/queuepenalty'] = array(
	'path'		=> 'callcenter/web_services/settings/queuepenalty',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['callcenter/web_services/restricted/settings/queueskills'] = array(
	'path'		=> 'callcenter/web_services/settings/queueskills',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['callcenter/web_services/restricted/settings/queueskillrules'] = array(
	'path'		=> 'callcenter/web_services/settings/queueskillrules',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));

$array['callcenter/web_services/private/settings/agents'] = array(
	'path'		=> 'callcenter/web_services/settings/agents',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['callcenter/web_services/private/settings/queues'] = array(
	'path'		=> 'callcenter/web_services/settings/queues',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['callcenter/web_services/private/settings/queuepenalty'] = array(
	'path'		=> 'callcenter/web_services/settings/queuepenalty',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['callcenter/web_services/private/settings/queueskills'] = array(
	'path'		=> 'callcenter/web_services/settings/queueskills',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['callcenter/web_services/private/settings/queueskillrules'] = array(
	'path'		=> 'callcenter/web_services/settings/queueskillrules',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));

###################################################################
# CTI
###################################################################

$array['cti/web_services/restricted/profiles'] = array(
	'path'		=> 'cti/web_services/profiles',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));

$array['cti/web_services/private/profiles'] = array(
	'path'		=> 'cti/web_services/profiles',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));

###################################################################
# XIVO
###################################################################


$array['xivo/ui/monit/'] = array(
	'path'		=> 'xivo/ui/monit/');
$array['xivo/configuration/ui/manage/entity/get'] = array(
	'path'		=> 'xivo/configuration/ui/manage/get',
	'define'	=> array('XIVO_LOC_UI_ACTION'	=> 'get'));
$array['xivo/configuration/ui/provisioning/plugin'] = array(
	'path'		=> 'xivo/configuration/ui/provisioning/plugin');
$array['xivo/configuration/ui/provisioning/configs'] = array(
	'path'		=> 'xivo/configuration/ui/provisioning/configs');
$array['xivo/configuration/ui/provisioning/configure'] = array(
	'path'		=> 'xivo/configuration/ui/provisioning/configure');
$array['xivo/configuration/ui/provisioning/devices'] = array(
	'path'		=> 'xivo/configuration/ui/provisioning/devices');


$array['xivo/configuration/web_services/restricted/check'] = array(
	'path'		=> 'xivo/configuration/web_services/check',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['xivo/configuration/web_services/restricted/manage/entity'] = array(
	'path'		=> 'xivo/configuration/web_services/manage/entity',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['xivo/configuration/web_services/restricted/network/interface'] = array(
	'path'		=> 'xivo/configuration/web_services/network/interface',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['xivo/configuration/web_services/restricted/network/resolvconf'] = array(
	'path'		=> 'xivo/configuration/web_services/network/resolvconf',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['xivo/configuration/web_services/restricted/network/mail'] = array(
	'path'		=> 'xivo/configuration/web_services/network/mail',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['xivo/configuration/web_services/restricted/network/dhcp'] = array(
	'path'		=> 'xivo/configuration/web_services/network/dhcp',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['xivo/configuration/web_services/restricted/support/monitoring'] = array(
	'path'		=> 'xivo/configuration/web_services/support/monitoring',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['xivo/configuration/web_services/restricted/provisioning/general'] = array(
	'path'		=> 'xivo/configuration/web_services/provisioning/general',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['xivo/configuration/web_services/restricted/provisioning/autoprov'] = array(
	'path'		=> 'xivo/configuration/web_services/provisioning/autoprov',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));


$array['xivo/configuration/web_services/private/manage/entity'] = array(
	'path'		=> 'xivo/configuration/web_services/manage/entity',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['xivo/configuration/web_services/private/network/interface'] = array(
	'path'		=> 'xivo/configuration/web_services/network/interface',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['xivo/configuration/web_services/private/network/resolvconf'] = array(
	'path'		=> 'xivo/configuration/web_services/network/resolvconf',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['xivo/configuration/web_services/private/provisioning/general'] = array(
	'path'		=> 'xivo/configuration/web_services/provisioning/general',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['xivo/configuration/web_services/private/provisioning/autoprov'] = array(
	'path'		=> 'xivo/configuration/web_services/provisioning/autoprov',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['xivo/configuration/web_services/private/provisioning/configregistrar'] = array(
	'path'		=> 'xivo/configuration/web_services/provisioning/configregistrar',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));


###################################################################
# SERVICE IPBX ASTERISK
###################################################################


# general_settings
$array['service/ipbx/asterisk/web_services/restricted/general_settings/sip'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/sip',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/general_settings/iax'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/iax',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/general_settings/sccp'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/sccp',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/general_settings/voicemail'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/voicemail',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/general_settings/phonebook'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/phonebook',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/general_settings/extenfeatures'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/extenfeatures',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/general_settings/advanced'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/advanced',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/general_settings/outboundmwi'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/outboundmwi',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));

$array['service/ipbx/asterisk/web_services/private/general_settings/sip'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/sip',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/general_settings/sccp'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/sccp',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/general_settings/iax'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/iax',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/general_settings/voicemail'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/voicemail',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/general_settings/phonebook'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/phonebook',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/general_settings/advanced'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/advanced',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/general_settings/outboundmwi'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/general_settings/outboundmwi',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));

# pbx_settings
$array['service/ipbx/asterisk/web_services/restricted/pbx_settings/users'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/pbx_settings/users',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/pbx_settings/lines'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/pbx_settings/lines',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/pbx_settings/devices'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/pbx_settings/devices',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/pbx_settings/groups'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/pbx_settings/groups',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/pbx_settings/meetme'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/pbx_settings/meetme',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));

$array['service/ipbx/asterisk/web_services/private/pbx_settings/users'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/pbx_settings/users',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/pbx_settings/lines'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/pbx_settings/lines',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/pbx_settings/devices'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/pbx_settings/devices',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/pbx_settings/groups'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/pbx_settings/groups',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/pbx_settings/meetme'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/pbx_settings/meetme',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));

# UI
$array['service/ipbx/asterisk/ui/pbx_settings/users/search'] = array(
	'path'		=> 'service/ipbx/asterisk/ui/pbx_settings/users',
	'define'	=> array('XIVO_LOC_UI_ACTION'	=> 'search'));
$array['service/ipbx/asterisk/ui/pbx_settings/lines/list'] = array(
	'path'		=> 'service/ipbx/asterisk/ui/pbx_settings/lines',
	'define'	=> array('XIVO_LOC_UI_ACTION'	=> 'list'));
$array['service/ipbx/asterisk/ui/pbx_settings/lines/search'] = array(
	'path'		=> 'service/ipbx/asterisk/ui/pbx_settings/lines',
	'define'	=> array('XIVO_LOC_UI_ACTION'	=> 'search'));
$array['service/ipbx/asterisk/ui/pbx_settings/users/groups/search'] = array(
	'path'		=> 'service/ipbx/asterisk/ui/pbx_settings/groups',
	'define'	=> array('XIVO_LOC_UI_ACL_CATEGORY'	    => 'pbx_settings',
                        'XIVO_LOC_UI_ACL_SUBCATEGORY'	=> 'users',
                        'XIVO_LOC_UI_ACTION'		    => 'search'));
$array['service/ipbx/asterisk/ui/pbx_settings/users/meetme/search'] = array(
	'path'		=> 'service/ipbx/asterisk/ui/pbx_settings/meetme',
	'define'	=> array('XIVO_LOC_UI_ACL_CATEGORY'		=> 'pbx_settings',
                        'XIVO_LOC_UI_ACL_SUBCATEGORY'	=> 'users',
                        'XIVO_LOC_UI_ACTION'		    => 'search'));
$array['service/ipbx/asterisk/ui/pbx_settings/users/paging/search'] = array(
	'path'		=> 'service/ipbx/asterisk/ui/pbx_settings/paging',
	'define'	=> array('XIVO_LOC_UI_ACL_CATEGORY'		=> 'pbx_settings',
                        'XIVO_LOC_UI_ACL_SUBCATEGORY'	=> 'users',
                        'XIVO_LOC_UI_ACTION'		    => 'search'));
$array['service/ipbx/asterisk/ui/pbx_settings/users/voicemail/search'] = array(
	'path'		=> 'service/ipbx/asterisk/ui/pbx_settings/voicemail',
	'define'	=> array('XIVO_LOC_UI_ACTION'	=> 'search'));
$array['service/ipbx/asterisk/ui/pbx_settings/users/voicemail/view'] = array(
	'path'		=> 'service/ipbx/asterisk/ui/pbx_settings/voicemail',
	'define'	=> array('XIVO_LOC_UI_ACTION'	=> 'view'));
$array['service/ipbx/asterisk/ui/pbx_settings/users/extension/view'] = array(
	'path'		=> 'service/ipbx/asterisk/ui/pbx_settings/extension',
	'define'	=> array('XIVO_LOC_UI_ACTION'	=> 'view'));
$array['service/ipbx/asterisk/ui/pbx_settings/meetme/users/search'] = array(
	'path'		=> 'service/ipbx/asterisk/ui/pbx_settings/users',
	'define'	=> array('XIVO_LOC_UI_ACL_CATEGORY'	    => 'pbx_settings',
                        'XIVO_LOC_UI_ACL_SUBCATEGORY'	=> 'meetme',
                        'XIVO_LOC_UI_ACTION'		    => 'search'));
$array['service/ipbx/asterisk/ui/pbx_settings/extension/search'] = array(
	'path'		=> 'service/ipbx/asterisk/ui/pbx_settings/extension',
	'define'	=> array('XIVO_LOC_UI_ACTION'	=> 'search'));

# call_management
$array['service/ipbx/asterisk/web_services/restricted/call_management/incall'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/call_management/incall',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/call_management/outcall'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/call_management/outcall',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/call_management/pickup'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/call_management/pickup',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/call_management/cel'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/call_management/cel',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/call_management/schedule'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/call_management/schedule',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));

$array['service/ipbx/asterisk/web_services/private/call_management/incall'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/call_management/incall',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/call_management/outcall'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/call_management/outcall',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/call_management/pickup'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/call_management/pickup',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/call_management/cel'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/call_management/cel',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/call_management/schedule'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/call_management/schedule',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));

$array['service/ipbx/asterisk/ui/call_management/schedule'] = array(
	'path'          => 'service/ipbx/asterisk/ui/call_management/schedule',
	'define'        => array('XIVO_LOC_UI_ACL_CATEGORY'    => 'call_management',
                            'XIVO_LOC_UI_ACL_SUBCATEGORY'  => 'schedule',
                            'XIVO_LOC_UI_ACTION'           => 'dialaction'));

# trunk_management
$array['service/ipbx/asterisk/web_services/restricted/trunk_management/sip'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/trunk_management/sip',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/trunk_management/iax'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/trunk_management/iax',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/trunk_management/custom'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/trunk_management/custom',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));

$array['service/ipbx/asterisk/web_services/private/trunk_management/sip'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/trunk_management/sip',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/trunk_management/iax'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/trunk_management/iax',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/trunk_management/custom'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/trunk_management/custom',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));

# pbx_services
$array['service/ipbx/asterisk/web_services/restricted/pbx_services/phonebook'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/pbx_services/phonebook',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/pbx_services/extenfeatures'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/pbx_services/extenfeatures',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/private/pbx_services/phonebook'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/pbx_services/phonebook',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/pbx_services/extenfeatures'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/pbx_services/extenfeatures',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));

# system_management
$array['service/ipbx/asterisk/web_services/restricted/system_management/context'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/system_management/context',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));

$array['service/ipbx/asterisk/web_services/restricted/system_management/extensions'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/system_management/extensions',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));

$array['service/ipbx/asterisk/web_services/private/system_management/context'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/system_management/context',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));

# control_system
$array['service/ipbx/asterisk/web_services/restricted/control_system/reload'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/control_system/reload',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['service/ipbx/asterisk/web_services/restricted/control_system/restart'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/control_system/restart',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));

$array['service/ipbx/asterisk/web_services/private/control_system/reload'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/control_system/reload',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['service/ipbx/asterisk/web_services/private/control_system/restart'] = array(
	'path'		=> 'service/ipbx/asterisk/web_services/control_system/restart',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));


###################################################################
##### STATISTICS
###################################################################

# RESTRICTED
$array['statistics/call_center/web_services/restricted/settings/configuration'] = array(
	'path'		=> 'statistics/call_center/web_services/settings/configuration',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['statistics/call_center/web_services/restricted/data/stats1'] = array(
	'path'		=> 'statistics/call_center/web_services/data/stats1',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['statistics/call_center/web_services/restricted/data/stats2'] = array(
	'path'		=> 'statistics/call_center/web_services/data/stats2',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['statistics/call_center/web_services/restricted/data/stats3'] = array(
	'path'		=> 'statistics/call_center/web_services/data/stats3',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));
$array['statistics/call_center/web_services/restricted/data/stats4'] = array(
	'path'		=> 'statistics/call_center/web_services/data/stats4',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'restricted'));

# PRIVATE
$array['statistics/call_center/web_services/private/settings/configuration'] = array(
	'path'		=> 'statistics/call_center/web_services/settings/configuration',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['statistics/call_center/web_services/private/data/stats1'] = array(
	'path'		=> 'statistics/call_center/web_services/data/stats1',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['statistics/call_center/web_services/private/data/stats2'] = array(
	'path'		=> 'statistics/call_center/web_services/data/stats2',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['statistics/call_center/web_services/private/data/stats3'] = array(
	'path'		=> 'statistics/call_center/web_services/data/stats3',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));
$array['statistics/call_center/web_services/private/data/stats4'] = array(
	'path'		=> 'statistics/call_center/web_services/data/stats4',
	'define'	=> array('XIVO_LOC_WEBSERVICES_MODE'	=> 'private'));

?>
