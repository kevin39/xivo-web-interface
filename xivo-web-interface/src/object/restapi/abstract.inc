<?php

#
# XiVO Web-Interface
# Copyright (C) 2006-2011  Avencall
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

require_once(dwho_file::joinpath(XIVO_PATH_OBJECT,'restapi','abstract','abstract.inc'));

abstract class xivo_restapi_helpers_abstract extends xivo_restapi_ressource_abstract
{
	private $_cnt = 0;

	public function __construct($_RAPI, $param=null)
	{
		parent::__construct($_RAPI, $param);
	}

	public function get_total()
	{
		return($this->_cnt);
	}

	public function get($id)
	{
		if(dwho_has_len($id) === false)
			return(false);

		$uri = $this->_build_uri(array($id));
		$rs = $this->request_get($uri);

		if($this->_status_code !== 200
		|| empty($rs) === true)
		{
			dwho_report::push('error', 'An Error occured while retrieving the '.$this->_name.': '.$this->_get_error_msg($rs));
			return(false);
		}

		return($rs);
	}

	public function find_all($search='',$order=false,$limit=false)
	{
		$uri = $this->_build_uri();

		$query = array();
		if (dwho_has_len($search) === true)
			array_push($query, array('search',$search));

		if (is_array($order))
		{
			$sort_key = array_keys($order);
			$sort_order = array_values($order);
			if ($sort_order[0] == SORT_DESC)
				$sort_order[0] = 'desc';
			elseif ($sort_order[0] == SORT_ASC)
				$sort_order[0] = 'asc';
			array_push($query, array('order', $sort_key[0]));
			array_push($query, array('direction', $sort_order[0]));
		}

		if (is_array($limit))
		{
			array_push($query, array('skip', $limit[0]));
			array_push($query, array('limit', $limit[1]));
		}

		$rs = $this->request_get($uri, $query);

		if (is_array($rs) === false
		|| isset($rs['items']) === false
		|| ($items = $rs['items']) === false
		|| isset($rs['total']) === false)
		{
			dwho_report::push('error', 'An Error occured while retrieving the list of '.$this->_name.'s: '.$this->_get_error_msg($rs));
			return(false);
		}

		$this->_cnt = $rs['total'];

		return($items);
	}

	public function add($data)
	{
		if (is_array($data) === false)
			return(false);

		$uri = $this->_build_uri();
		$rs = $this->request_post($uri,$data);

		if($this->_status_code !== 201)
		{
			dwho_report::push('error', 'An Error occured while creating the '.$this->_name.': '.$this->_get_error_msg($rs));
			return(false);
		}

		return($rs['id']);
	}

	public function edit($id, $data)
	{
		if (is_array($data) === false
		|| dwho_has_len($id) === false)
			return(false);

		$uri = $this->_build_uri(array($id));
		$rs = $this->request_put($uri,$data);

		if($this->_status_code !== 204)
		{
			dwho_report::push('error', 'An Error occured while editing the '.$this->_name.': '.$this->_get_error_msg($rs));
			return(false);
		}

		return(true);
	}

	public function delete($id)
	{
		if(dwho_has_len($id) === false)
			return(false);

		$uri = $this->_build_uri(array($id));
		$rs = $this->request_delete($uri);

		if($this->_status_code !== 204)
		{
			dwho_report::push('error', 'An Error occured while deleting the '.$this->_name.': '.$this->_get_error_msg($rs));
			return(false);
		}

		return(true);
	}

}

?>