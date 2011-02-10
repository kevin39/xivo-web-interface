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

$url = &$this->get_module('url');

$hascachetype = $this->get_var('hascachetype');
$basedir = $this->get_var('basedir');
$table1 = $this->get_var('table1');
$axetype = $this->get_var('axetype');
$listrow = $this->get_var('listrow');
$xivo_jqplot = $this->get_var('xivo_jqplot');

?>

<div class="b-infos">
	<h3 class="sb-top xspan">
		<span class="span-left">&nbsp;</span>
		<span class="span-center"><?=$this->bbf('title_content_name');?></span>
		<span class="span-right">&nbsp;</span>
	</h3>
	<div class="sb-content"> 
<?php
	if ($table1->has_data() === false):
		echo $this->bbf('no_conf_selected');
	elseif($hascachetype === false):
		echo $this->bbf('no_cache_generated_for',array('queue'));
	else :
?>
		<div class="sb-list"> 
<?php
		echo $table1->infos_html();
		echo $table1->render_html(false);
?>
		</div>
<?php		
		$xivo_jqplot->get_result('chart1');
		$xivo_jqplot->get_result('chart2');
	endif;
?>
	</div>
	<div class="sb-foot xspan">
		<span class="span-left">&nbsp;</span>
		<span class="span-center">&nbsp;</span>
		<span class="span-right">&nbsp;</span>
	</div>
</div>
