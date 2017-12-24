<?php
include "DBHelper.php";
$db=new DBHelper("localhost","root","root","CityCasc");
$db->connet_DB();
$n=$_GET["n"];
//$n=2;
if ($n==1)
{
    $sql="select pid,pname from Province";
    $res=$db->ExecuteDQL($sql);

    $json="[";
    foreach ($res as $pro)
    {
        $json.="{\"pid\":{$pro["pid"]},\"pname\":\"{$pro["pname"]}\"},";
    }
    $json=rtrim($json,",");
    $json.="]";
}
else if($n==2)
{
    $pid=$_GET['pid'];
    $sql="select cid,cname from City WHERE pid={$pid}";
    //如果是请求省份的数据：
    //$sql="select cid,cname from City WHERE pid=3";
    $res=$db->ExecuteDQL($sql);
    $json="[";
    foreach ($res as $city)
    {
        $json.="{\"cid\":{$city["cid"]},\"cname\":\"{$city["cname"]}\"},";
    }
    $json=rtrim($json,",");
    $json.="]";
}
else if ($n==3)
{
    $cid=$_GET["cid"];
    $sql="select coid,county from County WHERE cid={$cid}";
    $res=$db->ExecuteDQL($sql);
    $json="[";
    foreach ($res as $county)
    {
        $json.="{\"coid\":{$county["coid"]},\"county\":\"{$county["county"]}\"},";
    }
    $json=rtrim($json,",");
    $json.="]";
}
echo $json;
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/20
 * Time: 9:19
 */