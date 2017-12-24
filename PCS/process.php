<?php
$link=mysql_connect("localhost","root","root");
var_dump($link);
mysql_select_db("studentinfo");
//$sql="SELECT *FROM myuser WHERE userId=10000 AND userPwd=MD5('123')";

$sql="INSERT INTO Myuser VALUES (10003,MD5(123456),18,'女')";
$res=mysql_query($sql);
if(!$res)
{
	echo "数据查询失败";
}
else 
{
	echo "数据查询成功";
}