<?php

// look up for the path
require_once( dirname( dirname(__FILE__) ) . '/sv-config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') )
	wp_die(__("You are not allowed to be here"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>html5 video</title>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo SMARTVIDEO_URLPATH ?>tinymce/tinymce.js?v=1.5"></script>
</head>
<body id="html5video" onLoad="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';document.getElementById('audio_url').focus();" style="display: none">
<form onsubmit="return false;" action="#">
	<div class="tabs">
		<ul>
			<li id="audio_tab" class="current"><span><a href="javascript:mcTabs.displayTab('audio_tab','audio_panel');" onmousedown="return false;">{#html5video.audio_title}</a></span></li>
			<li id="video_tab"><span><a href="javascript:mcTabs.displayTab('video_tab','video_panel');" onmousedown="return false;">{#html5video.video_title}</a></span></li>
		</ul>
	</div>

	<div class="panel_wrapper">

		<div id="audio_panel" class="panel current" style="height:100px;">
			<table border="0" cellpadding="4" cellspacing="0">
			  <tr>
				<td class="nowrap"><label for="href">{#html5video.auto_url}</label></td>
				<td><input id="audio_url" name="href" type="text" class="mceFocus" value="http://" style="width: 200px" onfocus="try{this.select();}catch(e){}" /></td>
			  </tr>
			</table>
		</div>

		<div id="video_panel" class="panel" style="height:100px;">
			<table border="0" cellpadding="4" cellspacing="0">
			  <tr>
				<td class="nowrap"><label for="href">{#html5video.auto_url}</label></td>
				<td colspan="3"><input id="video_url" name="href" type="text" class="mceFocus" value="http://" style="width: 200px" onfocus="try{this.select();}catch(e){}" /></td>
			  </tr>
			  <tr>
				<td><label for="targetlist">{#html5video.width}</label></td>
				<td><input id="auto_width" name="href" type="text" class="mceFocus" value="" style="width: 50px" onfocus="try{this.select();}catch(e){}" /> ({#html5video.blank})</td>
				<td><label for="targetlist">{#html5video.height}</label></td>
				<td><input id="auto_height" name="href" type="text" class="mceFocus" value="" style="width: 50px" onfocus="try{this.select();}catch(e){}" /> ({#html5video.blank})</td>
			  </tr>
			  <tr>
				<td><label for="targetlist">{#html5video.poster_title}</label></td>
				<td colspan="3"><input id="video_poster" name="href" type="text" class="mceFocus" value="" style="width: 200px" onfocus="try{this.select();}catch(e){}" /> ({#html5video.blank})</td>
			  </tr>
			</table>
		</div>

	</div>

	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="{#cancel}" onclick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="{#insert}" onclick="inserthtml5video();" />
		</div>
	</div>
</form>
</body>
</html>
