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

xivo_service_asterisk::required(array('abstract','datastorage','abstract','sql.inc'),true);

class xivo_service_asterisk_func_key_sql extends xivo_service_asterisk_abstract_sql
{
	var $_disable		= null;

	public function get_func_key_by_user_id($user_id)
	{
		$this->_dso->new_select('userfeatures', null);
		$this->_dso->where(array('id' => $user_id), 'userfeatures');

		$this->_dso->innerjoin('func_key_mapping',
					'userfeatures.func_key_private_template_id = func_key_mapping.template_id',
					null,
					array('*'));

		return($this->_get_all_func_keys());
	}

	public function get_func_key_by_template_id($template_id)
	{
		$this->_dso->new_select('func_key_mapping', null);
		$this->_dso->where(array('template_id' => $template_id), 'func_key_mapping');

		return($this->_get_all_func_keys());
	}

	private function _get_all_func_keys()
	{
		$this->_dso->innerjoin('func_key',
					'func_key.id = func_key_mapping.func_key_id',
					null,
					array('*'));

		$this->_dso->innerjoin('func_key_destination_type',
					'func_key_destination_type.id = func_key.destination_type_id',
					null,
					array('destination_type_name' => 'name'));

		# USER FUNC_KEY
		$this->_dso->leftjoin('func_key_dest_user',
					'func_key_dest_user.func_key_id = func_key.id',
					null,
					array('user_id'));

		# GROUP FUNC_KEY
		$this->_dso->leftjoin('func_key_dest_group',
					'func_key_dest_group.func_key_id = func_key.id',
					null,
					array('group_id'));

		# QUEUE FUNC_KEY
		$this->_dso->leftjoin('func_key_dest_queue',
					'func_key_dest_queue.func_key_id = func_key.id',
					null,
					array('queue_id'));

		# SERVICE FUNC_KEY
		$this->_dso->leftjoin('func_key_dest_service',
					'func_key_dest_service.func_key_id = func_key.id',
					null,
					array('extension_id'));

		# CONFERENCE FUNC_KEY
		$this->_dso->leftjoin('func_key_dest_conference',
					'func_key_dest_conference.func_key_id = func_key.id',
					null,
					array('conference_id'));

		# FORWARD FUNC_KEY
		$this->_dso->leftjoin('func_key_dest_forward',
					'func_key_dest_forward.func_key_id = func_key.id',
					null,
					array('forward_id' => 'extension_id', 'number' => 'number'));

		# PARK POSITION FUNC_KEY
		$this->_dso->leftjoin('func_key_dest_park_position',
					'func_key_dest_park_position.func_key_id = func_key.id',
					null,
                    array('park_position'));

		# FEATURES FUNC_KEY
		$this->_dso->leftjoin('func_key_dest_features',
					'func_key_dest_features.func_key_id = func_key.id',
					null,
					array('features_id'));

		# PAGING FUNC_KEY
		$this->_dso->leftjoin('func_key_dest_paging',
					'func_key_dest_paging.func_key_id = func_key.id',
					null,
					array('paging_id'));

		# CUSTOM FUNC_KEY
		$this->_dso->leftjoin('func_key_dest_custom',
					'func_key_dest_custom.func_key_id = func_key.id',
					null,
					array('exten' => 'exten'));

		# AGENT FUNC_KEY
		$this->_dso->leftjoin('func_key_dest_agent',
					'func_key_dest_agent.func_key_id = func_key.id',
					null,
					array('agent_id' => 'agent_id', 'agent_extension_id' => 'extension_id'));

		# BSFILTER FUNC_KEY
		$this->_dso->leftjoin('func_key_dest_bsfilter',
					'func_key_dest_bsfilter.func_key_id = func_key.id',
					null,
					array('filtermember_id'));

		$this->_dso->new_order(array('position' => SORT_ASC), null, 'func_key_mapping');

		$r = $this->_dso->select_all();

		if(isset($r[0]) === false)
			$r = false;

		return($r);

	}

	public function get_func_key_id_with_dest_type_id($dst_type, $dst_id)
	{
		$pkey = $dst_type.'_id';

		return((int) $this->get_func_key_id($dst_type, $dst_id, $pkey));
	}

	public function get_func_key_id($dst_type, $dst_id, $pkey)
	{
		$this->_dso->new_select('func_key_dest_'.$dst_type, array('func_key_id'));
		$this->_dso->where(array($pkey => $dst_id));

		$r = $this->_dso->select_singlecolumn();

		if(isset($r[0]) === false)
			return(false);

		return((int) array_pop($r));
	}
}

?>
