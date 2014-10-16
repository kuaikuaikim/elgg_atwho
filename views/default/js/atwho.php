//<script>
<?php 
global $AT_WHOS;
//$friends = get_user_fireind_names(elgg_get_logged_in_user_guid());
$friends = get_site_allmembers();
$atwho = array_merge($friends,$AT_WHOS);

?>

elgg.provide('elgg.atwho');
var friends = <?php echo json_encode($atwho)?>;

elgg.atwho.init=function(){
	         $inputor = $(".elgg-input-plaintext").atWho("@",{
                 // data: names,
                 tpl: "<li data-value='${name}' style='z-index:99999'>${name}</li>",
                 'data': friends,
             });
	
    
}

elgg.register_hook_handler('init', 'system', elgg.atwho.init);
//</script>


