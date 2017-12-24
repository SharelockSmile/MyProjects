<?php
/* $uid=$_GET["uid"];
$upwd=$_GET["upwd"]; */
$uid=$_POST["uid"];
$upwd=$_POST["upwd"];
if($uid=="10000"&&$upwd=="123"){
	//echo "1";
	echo "{\"msg\":1}";
}
else{
	//echo "0";
	echo "{\"msg\":0}";
}
?>