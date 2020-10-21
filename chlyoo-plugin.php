<?php
/*
* Plugin Name: git-code-snippet
* Plugin URI: http://github.com/chlyoo/wp-git-code-snippet.git
* Description: Tool to embed github source code into a post.
* Version: 1.0
* Author: Changhyun Lyoo
* Author URI: http://blog.lostring.site
* License: GPL2
*/
if ( ! defined( 'ABSPATH' ) ) exit; 
add_action( 'admin_enqueue_scripts', 'gsnip_plugin_script' );
function gsnip_plugin_script(){
	wp_enqueue_script( 'jquery' );
	wp_register_script('git-code-snippet', plugin_dir_url(__FILE__) . 'js/script.js',  array('jquery'),'1.0.0', true);
	wp_enqueue_script('git-code-snippet');	
}

add_action( 'admin_footer','run_snipit');
function run_snipit(){
	global $pagenow;
	if (( $pagenow == 'post.php' ) || (get_post_type() == 'post')) {
	echo '<body onload="javascript:snipit();"></body>';
	}
}

add_shortcode('gsnip','show_git_snippet');
function show_git_snippet($atts, $content=null){
	if (empty($atts)) return;
	if (( $pagenow == 'post.php' ) || (get_post_type() == 'post')) {
		$a = shortcode_atts( array(
			'author'=>'chlyoo',
			'repo'=>'jstudy',
			'branch'=>'master',
			'loc'=>'',
		), $atts );
		$instance = uniqid();
		wp_register_script('git-code-snippet', plugin_dir_url(__FILE__) . 'js/script.js',  array('jquery'),'1.0.0', true);
		wp_enqueue_script('git-code-snippet');	
		wp_localize_script('git-code-snippet', 'instance' . $instance , $a );
		echo  '<script id="gsnip-'. $instance .'" class="gsnip-anchor" data-instance="' . $instance .'"></script>';
		return '<span>'.$content.'</span>';
	}
}