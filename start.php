<?php 

elgg_register_event_handler('init', 'system', 'atho_init');

function get_site_allmembers()
{

	global  $USER_SITE_NAMES,$CONFIG;
	$firends = array();
	$ALL_MEMBER_NAMES_KEY = 'site_all_member_names';
	if(is_memcache_available())
	{
		$r_cache = new ElggMemcache();
		$firends = $r_cache->get($ALL_MEMBER_NAMES_KEY);
		if(!empty($firends))
		{
			$firends = unserialize($firends);
			return $firends;
		}
	}
	
	$sql = "SELECT u.username from elgg_users_entity u";
	$rs = get_data($sql);
	foreach ($rs as $value)
	{
		$firends [] = $value->username;
	}
	if(is_memcache_available())
	{
		$w_cache = new ElggMemcache();
		$w_cache->set($ALL_MEMBER_NAMES_KEY, serialize($firends));
	}
	return $firends;
	
}

function atho_init()
{

  elgg_get_plugins_path();
  //atwho @功能实现
  elgg_register_css("atwho.css","mod/poshytip/vendor/atwho/jquery.atwho.css");
  elgg_load_css("atwho.css");
  elgg_register_js('atwho.main.jquery.js',"mod/atwho/vendor/atwho/jquery.atwho.js");
  elgg_register_js('atwho.caret.jquery.js',"mod/atwho/vendor/atwho/jquery.caret.js");
  elgg_load_js("atwho.caret.jquery.js");
  elgg_load_js("atwho.main.jquery.js");
  
   $atwho_js=elgg_get_simplecache_url('js','atwho');
   elgg_register_simplecache_view('js/atwho');
   elgg_register_js("elgg.atwho",$atwho_js);
   elgg_load_js('elgg.atwho');
   
   
}


?>