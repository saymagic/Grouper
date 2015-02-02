<?php

include_once('../utils.php');
header('Content-Type: text/html; charset=UTF-8');
$ACC_TOKEN=$utils->getAccessToken();

$data='{
		 "button":[
		 {
			   "name":"日常",
			   "sub_button":[
				{
				   "type":"click",
				   "name":"长沙天气",
				   "key":"btn_csweather"
				},
				{
				   "type":"click",
				   "name":"每日英语",
				   "key":"btn_english"
				},
				{
				   "type":"click",
				   "name":"笑话",
				   "key":"btn_joke"
				}]
		  },
		  {
			   "name":"大王",
			   "sub_button":[
				{
				   "type":"view",
				   "name":"爱情计时",
				   "url":"http://love.saymagic.cn"
				},
				{
				   "type":"view",
				   "name":"博客",
				   "url":"http://blog.saymagic.cn"
				}]
		   }]
       }';

$MENU_URL="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$ACC_TOKEN;

$ch = curl_init($MENU_URL);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data)));
$info = curl_exec($ch);
$menu = json_decode($info);
print_r($info);		//创建成功返回：{"errcode":0,"errmsg":"ok"}

if($menu->errcode == "0"){
	echo "菜单创建成功";
}else{
	echo "菜单创建失败";
}

?>