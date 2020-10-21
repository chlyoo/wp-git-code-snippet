function snipit(){

	var arr =[];
	jQuery.each(jQuery('.gsnip-anchor').get(), function(index, item){ 
		var instance = jQuery('.gsnip-anchor')[index].dataset['instance'];
		var varContainer = eval("instance" + instance);        
		arr.push(JSON.stringify(varContainer));
	});
	var set = new Set(arr);
	for ( let item of Array.from(set) ) {
		genSnip(JSON.parse(item));
	};
	block_queue.forEach(item=> {
		wp.data.dispatch( 'core/block-editor' ).insertBlock(item[0], item[1]);
	}
	);
}

var block_queue = [];
var count = 0;
function genSnip(vars){
	// var vars = {author: "chlyoo", repo: "jstudy", branch: "master", loc: "Hello.java"}; //임시코드
	var block_map = [];
	var gsnip_map = [];
	jQuery.each(wp.data.select('core/block-editor').getBlocks(),
		function(index,item){
			if (item.attributes.content.includes('gsnip')){
				gsnip_map.push(index);
			} 
			block_map[index] = item;
		}
		);
	gsnip_map.forEach(index=>{
		var codedata ;
		jQuery.get("https://raw.githubusercontent.com/"+vars['author']+'/'+vars['repo']+'/'+vars['branch']+'/'+vars['loc'], function(data){
			if (block_map[index].attributes.content.includes(vars['author']&&vars['repo']&&vars['branch']&&vars['loc'])){

				codedata = data; 
				if(index < 2){
					block_queue.push([codeBlock(codedata,vars),index+count]);
					block_queue.push([bottomBlock(vars),index+count+1]);
					count = count+2;
				}	
				else if (block_map[index-2] != "undefined"){
					if (block_map[index-2].attributes.content == codedata){
					}
					else{
						block_queue.push([codeBlock(codedata,vars),index+count]);
						block_queue.push([bottomBlock(vars),index+count+1]);
						count = count+2;
					}						
				}	  		
			}//if closed					
			}//jquery function closed	
			);		//jquery closed
		}//foreach function closed
	);								//foreach closed
}
function codeBlock(code,vars){

	let block = wp.blocks.createBlock('codemirror-blocks/code-block');
	block.attributes.mode= "clike";
	block.attributes.mime= "text/x-java";
	block.attributes.fileName=vars['loc'];
	block.attributes.content=code;
	return block;

}

function bottomBlock(vars){

	let longString = '<link rel="stylesheet" href="https://github.githubassets.com/assets/gist-embed-00e78e58c090554178aab653e8643d5e.css">'+'<div id=\"gist105948221\" class=\"gist\">\n    <div class=\"gist-file\">\n      <div class=\"gist-data\">\n        <div class=\"js-gist-file-update-container js-task-list-container file-box\">\n  <div id=\"file-'+vars['loc']+'\" class=\"file my-2\">\n    \n\n  <div itemprop=\"text\" class=\"Box-body p-0 blob-wrapper data type-java  \">\n      \n\n\n\n  <\/div>\n\n  <\/div>\n<\/div>\n\n      <\/div>\n      <div class=\"gist-meta\">\n        <a href=\"https://raw.githubusercontent.com/'+vars['author']+'/'+vars['repo']+'/'+vars['branch']+'/'+vars['loc']+'\" style=\"float:right\">view raw<\/a>\n        <a href=\"https://github.com/'+vars['author']+'/'+vars['repo']+'/blob/' + vars['branch']+'/'+vars['loc'] + '\">' + vars["loc"] + '<\/a>\n hosted with &#10084; by <a href=\"https://github.com\">GitHub<\/a>\n      <\/div>\n    <\/div>\n<\/div>\n';
	var block = wp.blocks.createBlock('core/html', {content:longString});
	return block;

}