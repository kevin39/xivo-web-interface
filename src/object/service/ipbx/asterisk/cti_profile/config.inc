<?php
#
# XiVO Web-Interface
# Copyright (C) 2012-2014  Avencall
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
$array['element'] = array();

$array['element']['name'] = array();
$array['element']['name']['default'] = '';

$array['element']['presence_id'] = array();
$array['element']['presence_id']['default'] = 0;
$array['element']['presence_id']['setdef'] = true;

$array['element']['phonehints_id'] = array();
$array['element']['phonehints_id']['default'] = 0;
$array['element']['phonehints_id']['setdef'] = true;


$array['filter'] = array();
$array['filter']['name'] = array('cast' => 'sgraph','minlen' => 3,'maxlen' => 128);
$array['filter']['presence_id'] = array('cast' => 'uint');
$array['filter']['phonehints_id'] = array('cast' => 'uint');

?>