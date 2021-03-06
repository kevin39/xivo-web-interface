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

$form = &$this->get_module('form');
$url = &$this->get_module('url');

$element = $this->get_var('element');
$info = $this->get_var('info');

$calllimits  = $this->get_var('calllimits');
$moh_list = $this->get_var('moh_list');
$context_list = $this->get_var('context_list');
//$parking_list = $this->get_var('parking_list');

$allow = array();
if (isset($info['allow']) === true)
	$allow = $info['allow']['var_val'];
$codec_active = empty($allow) === false;

?>
<div class="b-infos b-form">
<h3 class="sb-top xspan">
	<span class="span-left">&nbsp;</span>
	<span class="span-center"><?=$this->bbf('title_content_name');?></span>
	<span class="span-right">&nbsp;</span>
</h3>
<div class="sb-smenu">
	<ul>
		<li id="dwsm-tab-1"
		    class="dwsm-blur"
		    onclick="dwho_submenu.select(this,'sb-part-first');"
		    onmouseout="dwho_submenu.blur(this);"
		    onmouseover="dwho_submenu.focus(this);">
			<div class="tab">
				<span class="span-center">
					<a href="#first"><?=$this->bbf('smenu_general');?></a>
				</span>
			</div>
			<span class="span-right">&nbsp;</span>
		</li>
		<li id="dwsm-tab-2"
		    class="dwsm-blur"
		    onclick="dwho_submenu.select(this,'sb-part-jitterbuffer');"
		    onmouseout="dwho_submenu.blur(this);"
		    onmouseover="dwho_submenu.focus(this);">
			<div class="tab">
				<span class="span-center">
					<a href="#jitterbuffer"><?=$this->bbf('smenu_jitterbuffer');?></a>
				</span>
			</div>
			<span class="span-right">&nbsp;</span>
		</li>
		<li id="dwsm-tab-3"
		    class="dwsm-blur"
		    onclick="dwho_submenu.select(this,'sb-part-default');"
		    onmouseout="dwho_submenu.blur(this);"
		    onmouseover="dwho_submenu.focus(this);">
			<div class="tab">
				<span class="span-center">
					<a href="#default"><?=$this->bbf('smenu_default');?></a>
				</span>
			</div>
			<span class="span-right">&nbsp;</span>
		</li>
		<li id="dwsm-tab-4"
		    class="dwsm-blur"
		    onclick="dwho_submenu.select(this,'sb-part-realtime');"
		    onmouseout="dwho_submenu.blur(this);"
		    onmouseover="dwho_submenu.focus(this);">
			<div class="tab">
				<span class="span-center">
					<a href="#realtime"><?=$this->bbf('smenu_realtime');?></a>
				</span>
			</div>
			<span class="span-right">&nbsp;</span>
		</li>
		<li id="dwsm-tab-5"
		    class="dwsm-blur"
		    onclick="dwho_submenu.select(this,'sb-part-advanced');"
		    onmouseout="dwho_submenu.blur(this);"
		    onmouseover="dwho_submenu.focus(this);">
			<div class="tab">
				<span class="span-center">
					<a href="#advanced"><?=$this->bbf('smenu_advanced');?></a>
				</span>
			</div>
			<span class="span-right">&nbsp;</span>
		</li>
		<li id="dwsm-tab-6"
		    class="dwsm-blur-last"
		    onclick="dwho_submenu.select(this,'sb-part-calllimits',1);"
		    onmouseout="dwho_submenu.blur(this,1);"
		    onmouseover="dwho_submenu.focus(this,1);">
			<div class="tab">
				<span class="span-center">
					<a href="#calllimits"><?=$this->bbf('smenu_calllimits');?></a>
				</span>
			</div>
			<span class="span-right">&nbsp;</span>
		</li>
	</ul>
</div>

<div class="sb-content">
<form action="#" method="post" accept-charset="utf-8" onsubmit="dwho.form.select('it-codec');">

<?php
	echo	$form->hidden(array('name'	=> DWHO_SESS_NAME,
				    'value'	=> DWHO_SESS_ID)),
		$form->hidden(array('name'	=> 'fm_send',
				    'value'	=> 1));
?>

<div id="sb-part-first" class="b-nodisplay">

<?php
	echo	$form->text(array('desc'	=> $this->bbf('fm_bindport'),
				  'name'		=> 'bindport',
				  'labelid'		=> 'bindport',
				  'help'		=> $this->bbf('hlp_fm_bindport'),
				  'required'	=> false,
				  'value'		=> $this->get_var('info','bindport','var_val'),
				  'default'		=> $element['bindport']['default'],
				  'error'		=> $this->bbf_args('error',
					   $this->get_var('error', 'bindport')) )),

		$form->text(array('desc'	=> $this->bbf('fm_bindaddr'),
				  'name'		=> 'bindaddr',
				  'labelid'		=> 'bindaddr',
				  'size'		=> 15,
				  'help'		=> $this->bbf('hlp_fm_bindaddr'),
				  'required'	=> false,
				  'value'		=> $this->get_var('info','bindaddr','var_val'),
				  'default'		=> $element['bindaddr']['default'],
				  'error'		=> $this->bbf_args('error',
					   $this->get_var('error', 'bindaddr')) )),

		$form->select(array('desc'	=> $this->bbf('fm_iaxthreadcount'),
				    'name'		=> 'iaxthreadcount',
				    'labelid'	=> 'iaxthreadcount',
				    'key'		=> false,
				    'help'		=> $this->bbf('hlp_fm_iaxthreadcount'),
				    'selected'	=> $this->get_var('info','iaxthreadcount','var_val'),
				    'default'	=> $element['iaxthreadcount']['default']),
			      $element['iaxthreadcount']['value']),

		$form->select(array('desc'	=> $this->bbf('fm_iaxmaxthreadcount'),
				    'name'		=> 'iaxmaxthreadcount',
				    'labelid'	=> 'iaxmaxthreadcount',
				    'key'		=> false,
				    'bbf'		=> 'fm_iaxmaxthreadcount-opt',
				    'bbfopt'	=> array('argmode' => 'paramvalue'),
				    'help'		=> $this->bbf('hlp_fm_iaxmaxthreadcount'),
				    'selected'	=> $this->get_var('info','iaxmaxthreadcount','var_val'),
				    'default'	=> $element['iaxmaxthreadcount']['default']),
			      $element['iaxmaxthreadcount']['value']),

		$form->checkbox(array('desc'	=> $this->bbf('fm_iaxcompat'),
				      'name'	=> 'iaxcompat',
				      'labelid'	=> 'iaxcompat',
				      'help'	=> $this->bbf('hlp_fm_iaxcompat'),
				      'checked'	=> $this->get_var('info','iaxcompat','var_val'),
				      'default'	=> $element['iaxcompat']['default'])),

		$form->checkbox(array('desc'	=> $this->bbf('fm_authdebug'),
				      'name'	=> 'authdebug',
				      'labelid'	=> 'authdebug',
				      'help'	=> $this->bbf('hlp_fm_authdebug'),
				      'checked'	=> $this->get_var('info','authdebug','var_val'),
				      'default'	=> $element['authdebug']['default'])),

		$form->checkbox(array('desc'	=> $this->bbf('fm_delayreject'),
				      'name'	=> 'delayreject',
				      'labelid'	=> 'delayreject',
				      'help'	=> $this->bbf('hlp_fm_delayreject'),
				      'checked'	=> $this->get_var('info','delayreject','var_val'),
				      'default'	=> $element['delayreject']['default'])),

		$form->select(array('desc'	=> $this->bbf('fm_trunkfreq'),
				    'name'		=> 'trunkfreq',
				    'labelid'	=> 'trunkfreq',
				    'key'		=> false,
				    'bbf'		=> 'fm_trunkfreq-opt',
				    'bbfopt'	=> array('argmode' => 'paramvalue'),
				    'help'		=> $this->bbf('hlp_fm_trunkfreq'),
				    'selected'	=> $this->get_var('info','trunkfreq','var_val'),
				    'default'	=> $element['trunkfreq']['default']),
			      $element['trunkfreq']['value']),

		$form->checkbox(array('desc'	=> $this->bbf('fm_trunktimestamps'),
				      'name'	=> 'trunktimestamps',
				      'labelid'	=> 'trunktimestamps',
				      'help'	=> $this->bbf('hlp_fm_trunktimestamps'),
				      'checked'	=> $this->get_var('info','trunktimestamps','var_val'),
				      'default'	=> $element['trunktimestamps']['default']));

if($context_list !== false):
	echo	$form->select(array('desc'	=> $this->bbf('fm_regcontext'),
				    'name'		=> 'regcontext',
				    'labelid'	=> 'regcontext',
				    'empty'		=> true,
				    'key'		=> 'identity',
				    'altkey'	=> 'name',
				    'help'		=> $this->bbf('hlp_fm_regcontext'),
				    'default'	=> $element['regcontext']['default'],
				    'selected'	=> $this->get_var('info','regcontext','var_val')),
			      $context_list);
endif;

	echo	$form->select(array('desc'	=> $this->bbf('fm_minregexpire'),
				    'name'		=> 'minregexpire',
				    'labelid'	=> 'minregexpire',
				    'key'		=> false,
				    'bbf'		=> 'fm_regexpire-opt',
				    'bbfopt'	=> array('argmode'	=> 'paramvalue',
							 'time'		=> array(
									'from'		=> 'second',
									'format'	=> '%M%s')),
				    'help'		=> $this->bbf('hlp_fm_minregexpire'),
				    'selected'	=> $this->get_var('info','minregexpire','var_val'),
				    'default'	=> $element['minregexpire']['default']),
			      $element['minregexpire']['value']),

		$form->select(array('desc'	=> $this->bbf('fm_maxregexpire'),
				    'name'		=> 'maxregexpire',
				    'labelid'	=> 'maxregexpire',
				    'key'		=> false,
				    'bbf'		=> 'fm_regexpire-opt',
				    'bbfopt'	=> array('argmode'	=> 'paramvalue',
							 'time'		=> array(
									'from'		=> 'second',
									'format'	=> '%M%s')),
				    'help'		=> $this->bbf('hlp_fm_maxregexpire'),
				    'selected'	=> $this->get_var('info','maxregexpire','var_val'),
				    'default'	=> $element['maxregexpire']['default']),
			      $element['maxregexpire']['value']),

		$form->select(array('desc'	=> $this->bbf('fm_bandwidth'),
				    'name'		=> 'bandwidth',
				    'labelid'	=> 'bandwidth',
				    'key'		=> false,
				    'bbf'		=> 'fm_bandwidth-opt',
				    'bbfopt'	=> array('argmode' => 'paramvalue'),
				    'help'		=> $this->bbf('hlp_fm_bandwidth'),
				    'selected'	=> $this->get_var('info','bandwidth','var_val'),
				    'default'	=> $element['bandwidth']['default']),
			      $element['bandwidth']['value']),

		$form->select(array('desc'	=> $this->bbf('fm_tos'),
				    'name'		=> 'tos',
				    'labelid'	=> 'tos',
				    'empty'		=> true,
				    'key'		=> false,
				    'help'		=> $this->bbf('hlp_fm_tos'),
				    'selected'	=> $this->get_var('info','tos','var_val'),
				    'default'	=> $element['tos']['default']),
		$element['tos']['value']),

     $form->select(array('desc'  => $this->bbf('fm_cos'),
            'name'    => 'cos',
            'labelid' => 'cos',
            'key'   => false,
            'bbf'   => 'fm_cos-opt',
            'bbfopt'  => array('argmode' => 'paramvalue'),
            'help'    => $this->bbf('hlp_fm_cos'),
            'selected'  => $this->get_var('info','cos','var_val'),
            'default' => $element['cos']['default']),
			 $element['cos']['value']);
?>
</div>

<div id="sb-part-jitterbuffer" class="b-nodisplay">
<?php
	echo	$form->checkbox(array('desc'	=> $this->bbf('fm_jitterbuffer'),
				      'name'	=> 'jitterbuffer',
				      'labelid'	=> 'jitterbuffer',
				      'help'	=> $this->bbf('hlp_fm_jitterbuffer'),
				      'checked'	=> $this->get_var('info','jitterbuffer','var_val'),
				      'default'	=> $element['jitterbuffer']['default'])),

		$form->checkbox(array('desc'	=> $this->bbf('fm_forcejitterbuffer'),
				      'name'	=> 'forcejitterbuffer',
				      'labelid'	=> 'forcejitterbuffer',
				      'help'	=> $this->bbf('hlp_fm_forcejitterbuffer'),
				      'checked'	=> $this->get_var('info','forcejitterbuffer','var_val'),
				      'default'	=> $element['forcejitterbuffer']['default'])),

		$form->select(array('desc'	=> $this->bbf('fm_maxjitterbuffer'),
				    'name'		=> 'maxjitterbuffer',
				    'labelid'	=> 'maxjitterbuffer',
				    'key'		=> false,
				    'bbf'		=> 'fm_maxjitterbuffer-opt',
				    'bbfopt'	=> array('argmode' => 'paramvalue'),
				    'help'		=> $this->bbf('hlp_fm_maxjitterbuffer'),
				    'selected'	=> $this->get_var('info','maxjitterbuffer','var_val'),
				    'default'	=> $element['maxjitterbuffer']['default']),
			      $element['maxjitterbuffer']['value']),

		$form->select(array('desc'	=> $this->bbf('fm_maxjitterinterps'),
				    'name'		=> 'maxjitterinterps',
				    'labelid'	=> 'maxjitterinterps',
				    'key'		=> false,
				    'bbf'		=> 'fm_maxjitterinterps-opt',
				    'bbfopt'	=> array('argmode' => 'paramvalue'),
				    'help'		=> $this->bbf('hlp_fm_maxjitterinterps'),
				    'selected'	=> $this->get_var('info','maxjitterinterps','var_val'),
				    'default'	=> $element['maxjitterinterps']['default']),
				$element['maxjitterinterps']['value']),

    $form->select(array('desc'  => $this->bbf('fm_jittertargetextra'),
            'name'     => 'jittertargetextra',
            'labelid'  => 'jittertargetextra',
            'key'      => false,
            'help'     => $this->bbf('hlp_fm_jittertargetextra'),
            'selected' => $this->get_var('info','jittertargetextra','var_val'),
            'default'  => $element['jittertargetextra']['default']),
        $element['jittertargetextra']['value']),

		$form->select(array('desc'	=> $this->bbf('fm_resyncthreshold'),
				    'name'		=> 'resyncthreshold',
				    'labelid'	=> 'resyncthreshold',
				    'key'		=> false,
				    'bbf'		=> 'fm_resyncthreshold-opt',
				    'bbfopt'	=> array('argmode' => 'paramvalue'),
				    'help'		=> $this->bbf('hlp_fm_resyncthreshold'),
				    'selected'	=> $this->get_var('info','resyncthreshold','var_val'),
				    'default'	=> $element['resyncthreshold']['default']),
			      $element['resyncthreshold']['value']);
?>
</div>

<div id="sb-part-default" class="b-nodisplay">
<?php
	echo	$form->text(array('desc'	=> $this->bbf('fm_accountcode'),
				  'name'	=> 'accountcode',
				  'labelid'	=> 'accountcode',
				  'size'	=> 15,
				  'help'	=> $this->bbf('hlp_fm_accountcode'),
				  'required'=> false,
				  'value'	=> $this->get_var('info','accountcode','var_val'),
				  'default'	=> $element['accountcode']['default'],
				  'error'	=> $this->bbf_args('error',
					   $this->get_var('error', 'accountcode')) )),

		$form->select(array('desc'	=> $this->bbf('fm_amaflags'),
				    'name'		=> 'amaflags',
				    'labelid'	=> 'amaflags',
				    'key'		=> false,
				    'bbf'		=> 'ast_amaflag_name_info',
				    'bbfopt'	=> array('argmode' => 'paramvalue'),
				    'help'		=> $this->bbf('hlp_fm_amaflags'),
				    'selected'	=> $this->get_var('info','amaflags','var_val'),
				    'default'	=> $element['amaflags']['default']),
			      $element['amaflags']['value']),

		$form->checkbox(array('desc'	=> $this->bbf('fm_adsi'),
				      'name'	=> 'adsi',
				      'labelid'	=> 'adsi',
				      'help'	=> $this->bbf('hlp_fm_adsi'),
				      'checked'	=> $this->get_var('info','adsi','var_val'),
				      'default'	=> $element['adsi']['default'])),

    $form->checkbox(array('desc'  => $this->bbf('fm_srvlookup'),
              'name'    => 'srvlookup',
              'labelid' => 'srvlookup',
              'help'    => $this->bbf('hlp_fm_srvlookup'),
              'checked' => $this->get_var('info','srvlookup','var_val'),
              'default' => $element['srvlookup']['default'])),

		$form->select(array('desc'	=> $this->bbf('fm_transfer'),
				    'name'		=> 'transfer',
				    'labelid'	=> 'transfer',
				    'key'		=> false,
				    'bbf'		=> 'fm_transfer-opt',
				    'bbfopt'	=> array('argmode' => 'paramvalue'),
				    'help'		=> $this->bbf('hlp_fm_transfer'),
				    'selected'	=> $this->get_var('info','transfer','var_val'),
				    'default'	=> $element['transfer']['default']),
			      $element['transfer']['value']),

		$form->select(array('desc'	=> $this->bbf('fm_language'),
				    'name'		=> 'language',
				    'labelid'	=> 'language',
				    'key'		=> false,
				    'help'		=> $this->bbf('hlp_fm_language'),
				    'selected'	=> $this->get_var('info','language','var_val'),
				    'default'	=> $element['language']['default']),
			      $element['language']['value']);

if($moh_list !== false):
	echo	$form->select(array('desc'	=> $this->bbf('fm_mohinterpret'),
				    'name'		=> 'mohinterpret',
				    'labelid'	=> 'mohinterpret',
				    'key'		=> 'category',
				    'help'		=> $this->bbf('hlp_fm_language'),
				    'selected'	=> $this->get_var('info','mohinterpret','var_val'),
				    'default'	=> $element['mohinterpret']['default']),
			      $moh_list),

		$form->select(array('desc'	=> $this->bbf('fm_mohsuggest'),
				    'name'		=> 'mohsuggest',
				    'labelid'	=> 'mohsuggest',
				    'empty'		=> true,
				    'key'		=> 'category',
				    'help'		=> $this->bbf('hlp_fm_language'),
				    'selected'	=> $this->get_var('info','mohsuggest','var_val'),
				    'default'	=> $element['mohsuggest']['default']),
			      $moh_list);
endif;

	echo	$form->select(array('desc'	=> $this->bbf('fm_encryption'),
				    'name'		=> 'encryption',
				    'labelid'	=> 'encryption',
				    'key'		=> false,
				    'bbf'		=> 'fm_encryption-opt',
				    'bbfopt'	=> array('argmode' => 'paramvalue'),
				    'help'		=> $this->bbf('hlp_fm_encryption'),
				    'selected'	=> $this->get_var('info','encryption','var_val'),
				    'default'	=> $element['encryption']['default']),
			      $element['encryption']['value']),

    $form->checkbox(array('desc'  => $this->bbf('fm_forceencryption'),
              'name'    => 'forceencryption',
              'labelid' => 'forceencryption',
              'help'    => $this->bbf('hlp_fm_forceencryption'),
              'checked' => $this->get_var('info','forceencryption','var_val'),
              'default' => $element['forceencryption']['default'])),

		$form->select(array('desc'	=> $this->bbf('fm_maxauthreq'),
				    'name'		=> 'maxauthreq',
				    'labelid'	=> 'maxauthreq',
				    'key'		=> false,
				    'bbf'		=> 'fm_maxauthreq-opt',
				    'bbfopt'	=> array('argmode' => 'paramvalue'),
				    'help'		=> $this->bbf('hlp_fm_maxauthreq'),
				    'selected'	=> $this->get_var('info','maxauthreq','var_val'),
				    'default'	=> $element['maxauthreq']['default']),
			      $element['maxauthreq']['value']),

		$form->select(array('desc'	=> $this->bbf('fm_codecpriority'),
				    'name'		=> 'codecpriority',
				    'labelid'	=> 'codecpriority',
				    'key'		=> false,
				    'bbf'		=> 'fm_codecpriority-opt',
				    'bbfopt'	=> array('argmode' => 'paramvalue'),
				    'help'		=> $this->bbf('hlp_fm_codecpriority'),
				    'selected'	=> $this->get_var('info','codecpriority','var_val'),
				    'default'	=> $element['codecpriority']['default']),
			      $element['codecpriority']['value']);
?>

<fieldset id="fld-codeclist">
	<legend><?=$this->bbf('fld-codeclist');?></legend>
<?php
	echo	$form->checkbox(array('desc'	=> $this->bbf('fm_codec-custom'),
							'name'	=> 'codec-active',
							'labelid'	=> 'codec-active',
							'checked'	=> $codec_active));
?>
<div id="codeclist">
<?php
	echo	$form->select(array('desc'	=> $this->bbf('fm_codec-disallow'),
							'name'		=> 'disallow',
							'labelid'	=> 'disallow',
							'key'		=> false,
							'bbf'		=> 'fm_codec-disallow-opt',
							'bbfopt'	=> array('argmode' => 'paramvalue')),
					$element['disallow']['value']);
?>
	<div class="fm-paragraph fm-description">
		<?=$form->jq_select(array('paragraph'	=> false,
							'label'		=> false,
							'name'		=> 'allow[]',
							'id' 		=> 'it-allow',
							'key'		=> false,
							'bbf'		=> 'ast_codec_name_type',
							'bbfopt'	=> array('argmode' => 'paramvalue'),
							'selected'  => $allow),
					$element['allow']['value']);?>
	<div class="clearboth"></div>
	</div>
</div>
</fieldset>
</div>

<div id="sb-part-realtime" class="b-nodisplay">
<?php
	echo	$form->checkbox(array('desc'	=> $this->bbf('fm_rtcachefriends'),
				      'name'	=> 'rtcachefriends',
				      'labelid'	=> 'rtcachefriends',
				      'help'	=> $this->bbf('hlp_fm_rtcachefriends'),
				      'checked'	=> $this->get_var('info','rtcachefriends','var_val'),
				      'default'	=> $element['rtcachefriends']['default'])),

		$form->checkbox(array('desc'	=> $this->bbf('fm_rtupdate'),
				      'name'	=> 'rtupdate',
				      'labelid'	=> 'rtupdate',
				      'help'	=> $this->bbf('hlp_fm_rtupdate'),
				      'checked'	=> $this->get_var('info','rtupdate','var_val'),
				      'default'	=> $element['rtupdate']['default'])),

		$form->checkbox(array('desc'	=> $this->bbf('fm_rtignoreregexpire'),
				      'name'	=> 'rtignoreregexpire',
				      'labelid'	=> 'rtignoreregexpire',
				      'help'	=> $this->bbf('hlp_fm_rtignoreregexpire'),
				      'checked'	=> $this->get_var('info','rtignoreregexpire','var_val'),
				      'default'	=> $element['rtignoreregexpire']['default'])),

		$form->select(array('desc'	=> $this->bbf('fm_rtautoclear'),
				    'name'		=> 'rtautoclear',
				    'labelid'	=> 'rtautoclear',
				    'key'		=> false,
				    'bbf'		=> 'fm_rtautoclear-opt',
				    'bbfopt'	=> array('argmode'	=> 'paramvalue',
							 'time'		=> array(
									'from'		=> 'second',
									'format'	=> '%M%s')),
				    'help'		=> $this->bbf('hlp_fm_rtautoclear'),
				    'selected'	=> $this->get_var('info','rtautoclear','var_val'),
				    'default'	=> $element['rtautoclear']['default']),
			      $element['rtautoclear']['value']);
?>
</div>

<div id="sb-part-advanced" class="b-nodisplay">
<?php
	echo	$form->select(array('desc'	=> $this->bbf('fm_pingtime'),
				    'name'		=> 'pingtime',
				    'labelid'	=> 'pingtime',
				    'key'		=> false,
				    'bbf'		=> 'fm_pingtime-opt',
				    'bbfopt'	=> array('argmode' => 'paramvalue'),
				    'help'		=> $this->bbf('hlp_fm_pingtime'),
				    'selected'	=> $this->get_var('info','pingtime','var_val'),
				    'default'	=> $element['pingtime']['default']),
			      $element['pingtime']['value']),

		$form->select(array('desc'	=> $this->bbf('fm_lagrqtime'),
				    'name'		=> 'lagrqtime',
				    'labelid'	=> 'lagrqtime',
				    'key'		=> false,
				    'bbf'		=> 'fm_lagrqtime-opt',
				    'bbfopt'	=> array('argmode' => 'paramvalue'),
				    'help'		=> $this->bbf('hlp_fm_lagrqtime'),
				    'selected'	=> $this->get_var('info','lagrqtime','var_val'),
				    'default'	=> $element['lagrqtime']['default']),
			      $element['lagrqtime']['value']),

		$form->checkbox(array('desc'	=> $this->bbf('fm_nochecksums'),
				      'name'	=> 'nochecksums',
				      'labelid'	=> 'nochecksums',
				      'help'	=> $this->bbf('hlp_fm_nochecksums'),
				      'checked'	=> $this->get_var('info','nochecksums','var_val'),
				      'default'	=> $element['nochecksums']['default'])),

		$form->select(array('desc'	=> $this->bbf('fm_autokill'),
				    'name'		=> 'autokill',
				    'labelid'	=> 'autokill',
				    'key'		=> false,
				    'bbf'		=> 'fm_autokill-opt',
				    'bbfopt'	=> array('argmode' => 'paramvalue'),
				    'help'		=> $this->bbf('hlp_fm_autokill'),
				    'selected'	=> $this->get_var('info','autokill','var_val'),
				    'default'	=> $element['autokill']['default']),
			      $element['autokill']['value']),

		$form->text(array('desc'	=> $this->bbf('fm_calltokenoptional'),
				  'name'	=> 'calltokenoptional',
				  'labelid'	=> 'calltokenoptional',
				  'size'	=> 25,
				  'help'	=> $this->bbf('hlp_fm_calltokenoptional'),
				  'required'=> false,
				  'value'	=> $this->get_var('info','calltokenoptional','var_val'),
				  'default'	=> $element['calltokenoptional']['default'],
				  'error'	=> $this->bbf_args('error',
					$this->get_var('error', 'calltokenoptional')) )),

		/***********/

    $form->text(array('desc'  => $this->bbf('fm_trunkmaxsize'),
            'name'     => 'trunkmaxsize',
            'labelid'  => 'trunkmaxsize',
            'size'     => 10,
            'help'     => $this->bbf('hlp_fm_trunkmaxsize'),
            'required' => false,
            'value'    => $this->get_var('info', 'trunkmaxsize', 'var_val'),
            'default'  => $element['trunkmaxsize']['default'],
            'error'    => $this->bbf_args('error',
              $this->get_var('error','trunkmaxsize')))),

    $form->select(array('desc'  => $this->bbf('fm_trunkmtu'),
            'name'     => 'trunkmtu',
            'labelid'  => 'trunkmtu',
            'key'      => false,
            'help'     => $this->bbf('hlp_fm_trunkmtu'),
            'selected' => $this->get_var('info','trunkmtu','var_val'),
            'default'  => $element['trunkmtu']['default']),
        $element['trunkmtu']['value']),

    $form->checkbox(array('desc'  => $this->bbf('fm_allowfwdownload'),
              'name'    => 'allowfwdownload',
              'labelid' => 'allowfwdownload',
              'help'    => $this->bbf('hlp_fm_allowfwdownload'),
              'checked' => $this->get_var('info','allowfwdownload','var_val'),
              'default' => $element['allowfwdownload']['default'])),

/* PARKING - COMMENTED
		$form->select(array('desc'	=> $this->bbf('fm_parkinglot'),
				    'name'		=> 'parkinglot',
				    'labelid'	=> 'parkinglot',
						'help'		=> $this->bbf('hlp_fm_parkinglot'),
						'required'	=> false,
						'key'       => 'name',
						'altkey'    => 'id',
						'empty'     => true,
				    'selected'	=> $this->get_var('info','parkinglot','var_val'),
				    'default'	=> $element['parkinglot']['default']),
					$parking_list),
*/
    $form->checkbox(array('desc'  => $this->bbf('fm_shrinkcallerid'),
              'name'    => 'shrinkcallerid',
              'labelid' => 'shrinkcallerid',
              'help'    => $this->bbf('hlp_fm_shrinkcallerid'),
              'checked' => $this->get_var('info','shrinkcallerid','var_val'),
              'default' => $element['shrinkcallerid']['default']));


?>
</div>

<div id="sb-part-calllimits" class="b-nodisplay">
<?php
    echo $form->text(array('desc'  => $this->bbf('fm_maxcallnumbers'),
            'name'     => 'maxcallnumbers',
            'labelid'  => 'maxcallnumbers',
            'size'     => 6,
            'help'     => $this->bbf('hlp_fm_maxcallnumbers'),
            'required' => false,
            'value'    => $this->get_var('info', 'maxcallnumbers', 'var_val'),
            'default'  => $element['maxcallnumbers']['default'],
            'error'    => $this->bbf_args('error',
                $this->get_var('error','maxcallnumbers')))),

    $form->text(array('desc'  => $this->bbf('fm_maxcallnumbers_nonvalidated'),
            'name'     => 'maxcallnumbers_nonvalidated',
            'labelid'  => 'maxcallnumbers_nonvalidated',
            'size'     => 6,
            'help'     => $this->bbf('hlp_fm_maxcallnumbers_nonvalidated'),
            'required' => false,
            'value'    => $this->get_var('info', 'maxcallnumbers_nonvalidated', 'var_val'),
            'default'  => $element['maxcallnumbers_nonvalidated']['default'],
            'error'    => $this->bbf_args('error',
                $this->get_var('error','maxcallnumbers_nonvalidated'))));
?>

<?php
	$type = 'disp';
	$count = $calllimits?count($calllimits):0;
	$errdisplay = '';
?>
	<br/><br/>
	<div class="sb-list">
	<p><?= $this->bbf('title_pernetwork_calllimits'); ?></p>
		<table>
			<thead>
			<tr class="sb-top">

				<th class="th-left"><?=$this->bbf('fm_col_destination');?></th>
				<th class="th-center"><?=$this->bbf('fm_col_netmask');?></th>
				<th class="th-center"><?=$this->bbf('fm_col_calllimits');?></th>
				<th class="th-right th-rule">
					<?=$url->href_html($url->img_html('img/site/button/mini/orange/bo-add.gif',
									  $this->bbf('col_add'),
									  'border="0"'),
							   '#',
							   null,
							   'onclick="dwho.dom.make_table_list(\'disp\',this); return(dwho.dom.free_focus());"',
							   $this->bbf('col_add'));?>
				</th>
			</tr>
			</thead>
			<tbody id="disp">
		<?php
		if($count > 0):
			for($i = 0;$i < $count;$i++):

		?>
			<tr class="fm-paragraph<?=$errdisplay?>">
				<td class="td-left">
	<?php
					echo $form->text(array('paragraph'	=> false,
							       'name'		=> 'calllimits[destination][]',
							       'id'		=> false,
							       'label'		=> false,
							       'size'		=> 15,
							       'key'		=> false,
							       'value'		=> $calllimits[$i]['destination'],
							       'default'	=> '',
										 'error'		=> $this->bbf_args('calllimits-destination', $this->get_var('error', 'calllimits', $i, 'destination'))));
	 ?>
				</td>
				<td>
	<?php
					echo $form->text(array('paragraph'	=> false,
							       'name'		=> 'calllimits[netmask][]',
							       'id'		  => false,
							       'label'	=> false,
							       'size'		=> 15,
							       'key'		=> false,
							       'value'	=> $calllimits[$i]['netmask'],
							       'default'	=> '',
			               'error'		=> $this->bbf_args('calllimits-netmask', $this->get_var('error', 'calllimits', $i, 'netmask'))));
	 ?>
				</td>
				<td>
	<?php
					echo $form->text(array('paragraph'	=> false,
							       'name'		=> 'calllimits[calllimits][]',
							       'id'		  => false,
							       'label'	=> false,
							       'size'		=> 15,
							       'key'		=> false,
							       'value'	=> $calllimits[$i]['calllimits'],
							       'default'	=> '',
			               'error'		=> $this->bbf_args('calllimits-calllimits', $this->get_var('error', 'calllimits', $i, 'calllimits'))));
	 ?>
				</td>
				<td class="td-right">
					<?=$url->href_html($url->img_html('img/site/button/mini/blue/delete.gif',
									  $this->bbf('opt_'.$type.'-delete'),
									  'border="0"'),
							   '#',
							   null,
							   'onclick="dwho.dom.make_table_list(\''.$type.'\',this,1); return(dwho.dom.free_focus());"',
							   $this->bbf('opt_'.$type.'-delete'));?>
				</td>
			</tr>

		<?php
			endfor;
		endif;
		?>
			</tbody>
			<tfoot>
			<tr id="no-<?=$type?>"<?=($count > 0 ? ' class="b-nodisplay"' : '')?>>
				<td colspan="4" class="td-single"><?=$this->bbf('no_'.$type);?></td>
			</tr>
			</tfoot>
		</table>
		<table class="b-nodisplay">
			<tbody id="ex-<?=$type?>">
			<tr class="fm-paragraph">
				<td class="td-left">
	<?php
					echo $form->hidden(array('name'		=> 'calllimits[id][]',
                               		 'default'     	=> '-1'));

					echo $form->text(array('paragraph'	=> false,
							       'name'		=> 'calllimits[destination][]',
							       'id'		  => false,
							       'label'	=> false,
							       'size'		=> 15,
							       'key'		=> false,
							       'default'	=> ''));
	 ?>
				</td>
				<td>
	<?php
					echo $form->text(array('paragraph'	=> false,
							       'name'		=> 'calllimits[netmask][]',
							       'id'		=> false,
							       'label'		=> false,
							       'size'		=> 15,
							       'key'		=> false,
							       'default'	=> ''));
	 ?>
				</td>
				<td>
	<?php
					echo $form->text(array('paragraph'	=> false,
							       'name'		=> 'calllimits[calllimits][]',
							       'id'		=> false,
							       'label'		=> false,
							       'size'		=> 15,
							       'key'		=> false,
							       'default'	=> ''));
	 ?>
				</td>
				<td class="td-right">
					<?=$url->href_html($url->img_html('img/site/button/mini/blue/delete.gif',
									  $this->bbf('opt_'.$type.'-delete'),
									  'border="0"'),
							   '#',
							   null,
							   'onclick="dwho.dom.make_table_list(\''.$type.'\',this,1); return(dwho.dom.free_focus());"',
							   $this->bbf('opt_'.$type.'-delete'));?>
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
	<?=$form->submit(array('name'	=> 'submit',
			       'id'		=> 'it-submit',
			       'value'	=> $this->bbf('fm_bt-save')));?>
</form>
	</div>
	<div class="sb-foot xspan">
		<span class="span-left">&nbsp;</span>
		<span class="span-center">&nbsp;</span>
		<span class="span-right">&nbsp;</span>
	</div>
</div>
