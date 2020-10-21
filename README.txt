=== Brilliant Developer ===
Contributor: chlyoo
License: GNU Public License V2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Dependency ==
CodeMirror1.1 plugin required

== Description ==
This plugin provides the shortcode for gitcode embeding in a post.

Shortcode:
	[gsnip author='gitid' repo='repository name' branch='branch name' loc='location of file']
		shows git code and hyperlink to it's raw and github repo

How to use:
	put git code and goto console and run snipit();	

Ex) 
1. Write a shortcode and arguments,value on editor [gnip author='chlyoo' repo='wp-git-code-snippet' branch='main' loc='README.txt']
2. Press f12 to open developer tool and goto console tab.
3. Type snipit(); and press enter
4. Done

== Installation ==
Install like any other plugin. Unzip into wp-content/plugins/
