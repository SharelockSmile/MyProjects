<?php
//以JSON字符串格式返回
$uid=$_POST["uid"];
$upwd=$_POST["upwd"];
$json="";
if($uid==10000&&$upwd=="123"){
	
	$json="{\"msg\":1}";
}
else {
	$json="{\"msg\":0}";
}
echo $json;
?>