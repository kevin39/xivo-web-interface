<?php
#
# Copyright (C) 2014  Avencall
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

$array['element']['func_key_id'] = array();
$array['element']['func_key_id']['default'] = 0;

$array['element']['destination_type_id'] = array();
$array['element']['destination_type_id']['default'] = 0;

$array['element']['filtermember_id'] = array();
$array['element']['filtermember_id']['default'] = 0;
$array['element']['filtermember_id']['null'] = false;


$array['filter'] = array();
$array['filter']['func_key_id'] = array('cast' => 'ulongint');
$array['filter']['destination_type_id'] = array('cast' => 'ulongint');
$array['filter']['filtermember_id'] = array('cast' => 'ulongint');

?>
