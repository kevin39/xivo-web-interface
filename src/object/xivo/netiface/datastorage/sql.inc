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

xivo_object::required(array('abstract','datastorage','sql.inc'),true);

class xivo_object_netiface_sql extends xivo_object_abstract_sql
{
	var $_unique	= array(array('ifname'));

	function exists_link($ifname)
	{
		if(dwho_has_len($ifname) === false)
			return(null);

		$this->_dso->new_select($this->_table,array('ifname'));

		$this->_dso->wherebegin('ifname',$ifname.':');
		$this->_dso->andwhere(array('vlanrawdevice' => $ifname));

		return($this->_dso->select_single());
	}

	function get_voip_iface()
	{
		$this->_dso->new_select($this->_table);

		$this->_dso->where(array('networktype' => 'voip'));

		return($this->_dso->select_single());
	}
}

?>
