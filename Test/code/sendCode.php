<?php
header("Content-type:text/html;charset=utf-8");
session_start();
$tel=$_GET['tel'];
function randomkeys($length){
	$pattern='1234567890'; 
	$key="";
	for($i=0;$i<$length;$i++){
		$key.=$pattern{mt_rand(0,9)};
	}
	return $key;
}
$y=randomkeys(4);
$_SESSION["y"]=$y;
$msg=urlencode("您好,您的验证码是:{$y},请尽快填写!【飞凡】");
function give_ms($msg,$tel){
	$res=file_get_contents("http://api.sms.cn/sms/?ac=send&uid=luolaoshi&pwd=7aab5dfaccc4a8e75fa37e6b033128d3&mobile={$tel}&content={$msg}");
	
}
give_ms($msg,$tel);
?>