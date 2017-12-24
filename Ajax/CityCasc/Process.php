<?php
header("Content-Type:text/xml;charset=UTF-8");
$xml="<?xml version=\"1.0\" encoding=\"UTF-8\"?>";

$link=mysqli_connect("localhost","root","root","CityCasc") or die("数据库连接失败");
mysqli_query($link,"set names utf8");

$n=$_GET["n"];
if ($n==1)
{
    //查询省份
    $sql="select pid,pname from Province";
    $res=mysqli_query($link,$sql) or die("执行失败");
    //var_dump(mysqli_fetch_assoc($res));
   $xml.="<province>";
   while (($arr=mysqli_fetch_assoc($res))!=false)
    {
        $xml.="<p><pid>{$arr["pid"]}</pid><pname>{$arr["pname"]}</pname></p>";
    }
    $xml.="</province>";
}

else if($n==2)
{
    $pid=$_GET['pid'];
    //如果是请求省份的数据：
    $sql="select cid,cname from City WHERE pid={$pid}";
    $res=mysqli_query($link,$sql) or die("sql执行失败！");
//echo $res;
    $xml.="<city>";
    while ( ($arr=mysqli_fetch_assoc($res))!=false){
        $xml.="<c><cid>{$arr["cid"]}</cid><cname>{$arr["cname"]}</cname></c>";
    }
    $xml.="</city>";
}
else if ($n==3)
{
    $cid=$_GET['cid'];
    $sql="select coid,county from County WHERE cid={$cid}";
    //$sql="select coid,county from County WHERE cid=20";
    $res=mysqli_query($link,$sql) or die("sql执行失败！");
    $xml.="<county>";
    while ( ($arr=mysqli_fetch_assoc($res))!=false){
        $xml.="<co><coid>{$arr["coid"]}</coid><county>{$arr["county"]}</county></co>";
    }
    $xml.="</county>";
}
echo $xml;