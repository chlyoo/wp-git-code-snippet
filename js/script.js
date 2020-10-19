<script type='text/javascript'>
jQuery.get("https://raw.githubusercontent.com/chlyoo/jstudy/master/Hello.java", 
	function(data){
		block = wp.blocks.createBlock('codemirror-blocks/code-block');
		block.attributes.mode= "clike";
		block.attributes.mime= "text/x-java";
		block.attributes.fileName=php_vars['loc'];
		block.attributes.content=[data];
		wp.data.dispatch( 'core/block-editor' ).insertBlocks(block);
	});
</script>
