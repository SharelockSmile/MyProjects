<?php
//��JSON�ַ�����ʽ����
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