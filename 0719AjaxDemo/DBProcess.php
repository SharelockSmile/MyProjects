<?php
//JSON:
//   [
  //   {"id":1,"name":"陕西省"},
 //    {"id":1,"name":"山西省"}
//   ]

     //1.读取数据库中省份的信息
header("Content-Type:text/xml;charset=gbk");
$xml="<?xml version=\"1.0\" encoding=\"gbk\"?>"; 
$link=mysql_connect("localhost","root","root") or die("数据库连接失败！");
mysql_select_db("CityCasc") or die("找不到指定的数据库！");
mysql_query("set names gbk");
//获取表示参数
$n=$_GET["n"];
if($n=="1"){
	//如果是请求省份的数据：
$sql="select pid,pname from Province";
$res=mysql_query($sql) or die("sql执行失败！");
//echo $res;
$xml.="<province>";
while ( ($arr=mysql_fetch_assoc($res))!=false){
	$xml.="<p><id>{$arr["pid"]}</id><name>{$arr["pname"]}</name></p>";
}
$xml.="</province>";
}
else if($n=="2"){
	$pid=$_GET["pid"];
	//如果是通过省份请求城市：
	$sql="select cid,cname from city where pid={$pid}";
	$res=mysql_query($sql) or die("sql执行失败！");
	$xml.="<city>";
	while ( ($arr=mysql_fetch_assoc($res))!=false){
		$xml.="<c><cid>{$arr["cid"]}</cid><cname>{$arr["cname"]}</cname></c>";
	}
	$xml.="</city>";
	
} 
/* else if(){
	//如果是通过城市请求县区的：

} */
echo $xml;


?>