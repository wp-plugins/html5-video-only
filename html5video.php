<?php
/*
Plugin Name: html5video
Plugin URI: http://www.paduu.com/
Description: Shortcodes for HTML5 video and audio
Author:excuseser
Version: 1.0.0
Author URI: http://www.paduu.com/

Copyright 2009-2010 excuseser
*/

define('SMARTVIDEO_URLPATH', WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__) ) . '/');
include_once (dirname(__FILE__) . '/tinymce/tinymce.php');

function audio_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'src' => '',
	'id' => '',
	'class' => 'html5audio',
	'options' => 'controls autobuffer',
	'format' => 'auto',
	), $atts ) );
	static $aud_cnt = 0;
	$format = ' '.$format;
	$filename = $src;
	if( $id == '') $id = 'html5audio-' . $aud_cnt++;
	if (substr($src, strlen($src)-4, 1)=='.') $src = substr($src, 0, strlen($src)-4);


	if (strpos($format, 'og')) $html5incompl = false; else $html5incompl = true;
	$output = '<!-- degradable html5 audio and video plugin --><div class="audio_wrap '.$class.'">';
	$output .= '<audio ' . $options . ' id="' . $id . '" class="' . $class . '">';
	if (strpos($filename, 'wav')) $output .= '<source src="'.$filename.'" type="audio/wav" />';
	if (strpos($filename, 'm4a')) $output .= '<source src="'.$filename.'" type="audio/mp4" />';
	if (strpos($filename, 'oga')) $output .= '<source src="'.$filename.'" type="audio/ogg" />';
	if (strpos($filename, 'ogg')) $output .= '<source src="'.$filename.'" type="audio/ogg" />';
	if (strpos($filename, 'mp3')) $output .= '<source src="'.$filename.'" type="audio/mpeg" />';
	$output .= '</audio></div>';
	return $output;
}
add_shortcode('audio', 'audio_shortcode');

function ispad() {
	return  ereg('/\(iPhone|iPad|iPod)/i',$_SERVER['HTTP_USER_AGENT']);
}

function video_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'src' => '',
	'poster' => '',
	'id' => '',
	'class' => 'html5video',
	'options' => 'controls autobuffer',
	'width' => '480',
	'height' => '320',
	'format' => 'auto',
	), $atts ) );
	static $vid_cnt = 0;
	$format = ' '.$format;
	$filename = $src;

	//if (!ispad()) return "©版权问题";

	if (substr($src, strlen($src)-4, 1)=='.') $src = substr($src, 0, strlen($src)-4);

	if($poster == '') {if (file_exists($src.'.jpg')) $poster = $src.'.jpg';}
	if($id == '') $id = 'html5video-' . $vid_cnt++;
	$output = '<!-- degradable html5 audio and video plugin --><div class="video_wrap '.$class.'">';

		$output .= '<video width="'.$width.'" height="'.$height.'" '.$options;
		if( $poster != '') $output .= ' poster="' . $poster . '"';
		$output .= ' id="' . $id . '" class="' . $class . '">';
		if (strpos($filename, 'mp4')) $output .= '<source src="'.$filename.'" type="video/mp4" />';
		if (strpos($filename, 'ogg')) $output .= '<source src="'.$filename.'" type="video/ogg" />';
		if (strpos($filename, 'm4a')) $output .= '<source src="'.$filename.'" type="video/mp4" />';
		$output .='</div>';

	return $output;
}
add_shortcode('video', 'video_shortcode');

?>