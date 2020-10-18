<?php
/**
* Plugin Name: git code snippet
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
		), $atts );
	$str = '<script>
document.write("<link rel="stylesheet" href="https://github.githubassets.com/assets/gist-embed-00e78e58c090554178aab653e8643d5e.css">")
document.write("<div id=\"gist105948221\" class=\"gist\">\n    <div class=\"gist-file\">\n      <div class=\"gist-data\">\n        <div class=\"js-gist-file-update-container js-task-list-container file-box\">\n  <div id=\"file-hello-java\" class=\"file my-2\">\n    \n\n  <div itemprop=\"text\" class=\"Box-body p-0 blob-wrapper data type-java  \">\n      \n<table class=\"highlight tab-size js-file-line-container\" data-tab-size=\"8\" data-paste-markdown-skip>\n      <tr>\n        <td id=\"file-hello-java-L1\" class=\"blob-num js-line-number\" data-line-number=\"1\"><\/td>\n        <td id=\"file-hello-java-LC1\" class=\"blob-code blob-code-inner js-file-line\"><span class=\"pl-k\">class<\/span> <span class=\"pl-en\">Hello<\/span>{<\/td>\n      <\/tr>\n      <tr>\n        <td id=\"file-hello-java-L2\" class=\"blob-num js-line-number\" data-line-number=\"2\"><\/td>\n        <td id=\"file-hello-java-LC2\" class=\"blob-code blob-code-inner js-file-line\">	<span class=\"pl-k\">public<\/span> <span class=\"pl-k\">static<\/span> <span class=\"pl-k\">void<\/span> <span class=\"pl-en\">main<\/span>(<span class=\"pl-k\">String<\/span>[] <span class=\"pl-v\">args<\/span>){<\/td>\n      <\/tr>\n      <tr>\n        <td id=\"file-hello-java-L3\" class=\"blob-num js-line-number\" data-line-number=\"3\"><\/td>\n        <td id=\"file-hello-java-LC3\" class=\"blob-code blob-code-inner js-file-line\">		<span class=\"pl-smi\">System<\/span><span class=\"pl-k\">.<\/span>out<span class=\"pl-k\">.<\/span>println(<span class=\"pl-s\"><span class=\"pl-pds\">&quot;<\/span>Hello, world.<span class=\"pl-pds\">&quot;<\/span><\/span>); <\/td>\n      <\/tr>\n      <tr>\n        <td id=\"file-hello-java-L4\" class=\"blob-num js-line-number\" data-line-number=\"4\"><\/td>\n        <td id=\"file-hello-java-LC4\" class=\"blob-code blob-code-inner js-file-line\">	}<\/td>\n      <\/tr>\n      <tr>\n        <td id=\"file-hello-java-L5\" class=\"blob-num js-line-number\" data-line-number=\"5\"><\/td>\n        <td id=\"file-hello-java-LC5\" class=\"blob-code blob-code-inner js-file-line\">}<\/td>\n      <\/tr>\n<\/table>\n\n\n  <\/div>\n\n  <\/div>\n<\/div>\n\n      <\/div>\n      <div class=\"gist-meta\">\n        <a href=\"https://raw.githubusercontent.com/'.$a['author'].'/'.$a['repo'].'/'.$a['branch'].'/'.$a['locat'].'" style=\"float:right\">view raw<\/a>\n        <a href=\"https://github.com/'.$a['author'].'/'.$a['repo'].'/blob/'.$a['branch'].'/'.$a['loc'].'">'.$a['loc'].'<\/a>\n        hosted with &#10084; by <a href=\"https://github.com\">GitHub<\/a>\n      <\/div>\n    <\/div>\n<\/div>\n")
</script>';
return $str;
}

