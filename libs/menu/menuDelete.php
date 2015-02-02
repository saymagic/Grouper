<?php

include_once('../utils.php');
header('Content-Type: text/html; charset=UTF-8');
$ACC_TOKEN=$utils->getAccessToken();

$MENU_URL="https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".$ACC_TOKEN;

$cu = curl_init();
curl_setopt($cu, CURLOPT_URL, $MENU_URL);
curl_setopt($cu, CURLOPT_RETURNTRANSFER, 1);
$info = curl_exec($cu);
$res = json_decode($info);
curl_close($cu);

if($res->errcode == "0"){
    echo "菜单删除成功";
}else{
    echo "菜单删除失败";
}

?>