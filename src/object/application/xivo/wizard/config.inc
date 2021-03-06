<?php

#
# XiVO Web-Interface
# Copyright (C) 2006-2016  Avencall
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

$array['step'] = array();
$array['step']['welcome'] = true;
$array['step']['license'] = true;
$array['step']['mainconfig'] = true;
$array['step']['entitycontext'] = true;
$array['step']['validate'] = true;


$array['element'] = array();

$array['element']['entity'] = array();
$array['element']['entity']['displayname'] = '';

$array['element']['context'] = array();

$array['element']['context']['incall'] = array();
$array['element']['context']['incall']['displayname'] = array();
$array['element']['context']['incall']['displayname']['default'] = '';

$array['element']['context']['incall']['numberbeg'] = array();
$array['element']['context']['incall']['numberbeg']['default'] = '';

$array['element']['context']['incall']['numberend'] = array();
$array['element']['context']['incall']['numberend']['default'] = '';

$array['element']['context']['incall']['didlength'] = array();
$array['element']['context']['incall']['didlength']['value'] = range(1,20);
$array['element']['context']['incall']['didlength']['default'] = 4;

$array['element']['context']['internal'] = array();
$array['element']['context']['internal']['displayname'] = array();
$array['element']['context']['internal']['displayname']['default'] = '';

$array['element']['context']['internal']['numberbeg'] = array();
$array['element']['context']['internal']['numberbeg']['default'] = '';

$array['element']['context']['internal']['numberend'] = array();
$array['element']['context']['internal']['numberend']['default'] = '';

$array['element']['context']['outcall'] = array();
$array['element']['context']['outcall']['displayname'] = array();
$array['element']['context']['outcall']['displayname']['default'] = '';


dwho::load_class('dwho_network');

$array['filter'] = array();
$array['filter']['mainconfig'] = array();
$array['filter']['mainconfig']['hostname'] = array('callback'		=> 'dwho_network::valid_hostname_part');
$array['filter']['mainconfig']['domain'] = array('callback'		=> 'dwho_network::valid_hostname');
$array['filter']['mainconfig']['adminpasswd'] = array('cast' => 'alnumpunct', 'minlen'	=> 4, 'maxlen'	=> 64);
$array['filter']['mainconfig']['confirmadminpasswd'] = array('egal'	=> 'adminpasswd');

$array['filter']['netiface'] = array();
$array['filter']['netiface']['address'] = array('callback'	=> 'dwho_network::valid_ipv4_dotdec');
$array['filter']['netiface']['netmask'] = array('callback'	=> 'dwho_network::valid_mask_ipv4',
						'callbackarg'	=> array(DWHO_NETWORK_MASK_IPV4_DOTDEC));
$array['filter']['netiface']['gateway'] = array('callback'	=> 'dwho_network::valid_host',
						'callbackarg'	=> array(DWHO_NETWORK_HOST_IPV4_DOTDEC));
$array['filter']['netiface']['interface'] = array('cast' => 'sgraph');

$array['filter']['resolvconf'] = array();
$array['filter']['resolvconf']['nameserver1'] = array('set'		=> 'false',
						      'chk'		=> 2,
						      'callback'	=> 'dwho_network::valid_host',
						      'callbackarg'	=> array(DWHO_NETWORK_HOST_IPV4 |
										 DWHO_NETWORK_HOST_HOSTNAME |
										 DWHO_NETWORK_HOST_HOSTNAME_TLD));
$array['filter']['resolvconf']['nameserver2'] = array('set'		=> 'false',
						      'chk'		=> 2,
						      'callback'	=> 'dwho_network::valid_host',
						      'callbackarg'	=> array(DWHO_NETWORK_HOST_IPV4 |
										 DWHO_NETWORK_HOST_HOSTNAME |
										 DWHO_NETWORK_HOST_HOSTNAME_TLD));

$array['filter']['entity'] = array();
$array['filter']['entity']['displayname'] = array('cast' => 'sgraph','minlen' => 3,'maxlen' => 128);

$array['filter']['context'] = array();

$array['filter']['context']['outcall'] = array();
$array['filter']['context']['outcall']['displayname'] = array('cast' => 'sgraph','minlen' => 3,'maxlen' => 128);

$array['filter']['context']['internal'] = array();
$array['filter']['context']['internal']['displayname'] = array('cast' => 'sgraph','minlen' => 3,'maxlen' => 128);
$array['filter']['context']['internal']['numberbeg'] = array('maxlen' => 16,'cast' => 'digit');
$array['filter']['context']['internal']['numberend'] = array('maxlen' => 16,'cast' => 'digit');

$array['filter']['context']['incall'] = array();
$array['filter']['context']['incall']['displayname'] = array('cast' => 'sgraph','minlen' => 3,'maxlen' => 128);
$array['filter']['context']['incall']['numberbeg'] = array('set' => false,'chk' => 2,'maxlen' => 16,'cast' => 'digit');
$array['filter']['context']['incall']['numberend'] = array('set' => false,'chk' => 2,'maxlen' => 16,'cast' => 'digit');
$array['filter']['context']['incall']['didlength'] = array('cast' => 'uint','between' => array(1,20));

?>
