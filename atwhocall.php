//<script>
<?php 

?>

elgg.provide('elgg.atwhocall');

function updateCallback(){
	return 'ok';
}

elgg.atwho.init=function(){
   
}

elgg.register_hook_handler('init', 'system', elgg.atwho.init);
//</script>


