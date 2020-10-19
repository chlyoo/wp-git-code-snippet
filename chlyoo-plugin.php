<?php
/**
* Plugin Name: git-code-snippet
* Plugin URI: http://github.com/chlyoo/wp-git-code-snippet.git
* Description: Tool to embed github source code into a post.
* Version: 0.1.0
* Author: Changhyun Lyoo
* Author URI: http://blog.lostring.site
* License: GPL2
*/


add_shortcode('gitcode','show_git_snippet');

function show_git_snippet($atts){
	$a = shortcode_atts( array(
		'author'=>'chlyoo',
		'repo'=>'jstudy',
		'branch'=>'master',
		'loc'=>'',
		'no'=>1,
	), $atts );
	wp_register_script('git-code-snippet', plugin_dir_path( __FILE__ ) . 'js/script.js', array('jQuery'), 0.1.0, false );

	wp_localize_script('git-code-snippet','php_vars',$a);
	$str ='<script>' . "document.write('<link rel=" . '"stylesheet" href="https://github.githubassets.com/assets/gist-embed-00e78e58c090554178aab653e8643d5e.css">' . "')" .
	"document.write('".'<div id=\"gist105948221\" class=\"gist\">\n <div class=\"gist-file\">\n <div class=\"gist-data\">\n <div class=\"js-gist-file-update-container js-task-list-container file-box\">\n <div id=\"file-hello-java\" class=\"file my-2\">\n\n\n <div itemprop=\"text\" class=\"Box-body p-0 blob-wrapper data type-java  \">\n      \n<\/div>\n\n  <\/div>\n<\/div>\n\n      <\/div>\n      <div class=\"gist-meta\">\n<a href=\"https://raw.githubusercontent.com/'
	.$a["author"].'/'.$a["repo"].'/'.$a["branch"].'/'.$a["locat"].'" style=\"float:right\">view raw<\/a>\n        <a href=\"https://github.com/'.$a["author"].'/'.$a["repo"].'/blob/'.$a["branch"].'/'.$a["loc"].'">'.$a["loc"].'<\/a>\n hosted with &#10084; by <a href=\"https://github.com\">GitHub<\/a>\n <\/div>\n <\/div>\n<\/div>\n'."'".")
	</script>";
	return $str;
}


