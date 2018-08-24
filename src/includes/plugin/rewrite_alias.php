<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2015 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 07 Mar 2015 03:43:56 GMT
 */

if (! defined('NV_MAINFILE')) {
    die('Stop!!!');
}
$link_true = true;
$get_url = $_SERVER['REQUEST_URI'];
$array_url = explode('/',$get_url);
if($global_config['lang_multi'] == 1){

	$alias_mod = str_replace('/','',$array_url[2]);
}else{
	$alias_mod = str_replace('/','',$array_url[1]);
}

$alias_mod = str_replace('.html','',$alias_mod);
//print_r($array_url);die;
$page = 1;
/* if(!empty($array_url[2]))
{

	$string = str_replace('.html','',$array_url[2]);
	if (substr($string, 0, 5) == 'page-') 
	{
		$page = intval(substr($array_url[2], 5));
	}
	
	$alias_mod = str_replace('/','',$array_url[1]);
	$alias_mod = str_replace('.html','',$alias_mod);
	
}
else
{
	$alias_mod = str_replace('/','',end($array_url));
	$alias_mod = str_replace('.html','',$alias_mod);

} */
//print_r($alias_mod);die;
$array_alias = $db->query(" SELECT * FROM " . NV_PREFIXLANG . "_alias_rows WHERE alias like '". $alias_mod ."'")->fetch();
		
if($array_alias['id'])
{
	$_GET[NV_NAME_VARIABLE] = $array_alias['module'];
	$_GET[NV_OP_VARIABLE] = $array_alias['op'];
	
	if($array_alias['id_alias'] > 0)
	$id = $array_alias['id_alias'];
	
	if($array_alias['catid_alias'] > 0)
	{
		if(!empty($array_url[3])){
			$_GET[NV_OP_VARIABLE] =  $array_alias['alias'].'/'.$array_url[3];
			$alias_url = $array_alias['alias'].'/'.$array_url[3];
		}else{
			$_GET[NV_OP_VARIABLE] =  $alias_mod;
			$alias_url = $array_alias['alias'];
		}
		
		$catid = $array_alias['catid_alias'];
	}
	
	
	
	$alias = $array_alias['alias'];
	
	$link_true = false;
}
//print_r($alias_url );die;
 //print_r(NV_NAME_VARIABLE);die;
 /* 
// XỬ LÝ ĐIỀU HƯỚNG LINK
	
	$get_url = $_SERVER['REQUEST_URI'];
	$array_url = explode('/',$get_url);
	
	$alias_mod = str_replace('/','',$array_url[1]);
	$alias_mod = str_replace('.html','',$alias_mod);
	$page = 1;
	if(!empty($array_url[2]))
	{
	
		$string = str_replace('.html','',$array_url[2]);
		if (substr($string, 0, 5) == 'page-') 
		{
			$page = intval(substr($array_url[2], 5));
		}
		
	}
	
	// XỬ LÝ URL MODULE
	$link_true = true;
	if (!isset($site_mods[$module_name]) and !empty($alias_mod))
	{
		//print_r($alias_mod);die;
		
		// LẤY MODULE, OP, ID, CATID CỦA ALIAS 
		$array_alias = $db->query(" SELECT * FROM " . NV_PREFIXLANG . "_alias_rows WHERE alias like '". $alias_mod ."'")->fetch();
		
		if($array_alias['id'])
		{
			$module_name = $array_alias['module'];
			$op = $array_alias['op'];
			
			if($array_alias['id_alias'] > 0)
			$id = $array_alias['id_alias'];
			
			if($array_alias['catid_alias'] > 0)
			$catid = $array_alias['catid_alias'];
			
			$alias_url = $array_alias['alias'];
			$alias = $array_alias['alias'];
			
			$link_true = false;
			
		}
		else
		{
			nv_redirect_location(NV_BASE_SITEURL);
		}
		
		
	}
	
	//print_r($array_alias);die;
	// KẾT THÚC XỬ LÝ URL MODULE */
