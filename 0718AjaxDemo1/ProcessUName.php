<?php
//接收用户名
$uname=$_GET["uname"];
if($uname=="luo"){
	echo "1";//如果说用户输入的“luo”，那么服务器会返回一个“1”
}
else{
	
	echo "0";//如果说用户输入的不是“luo”，那么服务器会返回一个“0”
}
?>