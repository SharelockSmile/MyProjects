<?php
include 'DBHelper.php';
$db=new DBHelper("localhost", "root", "root", "db_database24");
$db->connet_DB();

/* $shopping="24,2@13,1@21,1"; */
$sqlUser="SELECT shopping FROM tb_user WHERE id=1";
$shopping=$db->ExecuteDQL($sqlUser);
$shopStr=$shopping[0]["shopping"];
//标记购物车是否为空
$isExist="";
if ($shopStr)
{
	$isExist=1;
	$info=explode("@",$shopStr);
	foreach ($info as $arr)
	{
		$goods=explode(",",$arr);
		$shopInfo[]=$goods;
		$gid=$shopInfo[0][0];
	}
	$sqlGoods="select name,v_price,m_price,fold from tb_commo
	where id in({$shopInfo[0]})";
}
/*if($shopStr){
	$isExist=1;//购物车表示有商品
	$goodInfoArr=explode('@', $shopStr);
	foreach ($goodInfoArr as $everyGood){
		$arr=explode(',', $everyGood);
		$gids.=$arr[0].",";//组装所有商品的编号
		$numArr[]=$arr[1];//组装所有商品的数量
	}
	$gids=substr($gids, 0,strlen($gids)-1);
	echo $gids;
	 $sqlGoods="select name,v_price,m_price,fold from tb_commo
	where id in({$gids})"; 
}*/
echo "<pre>";
var_dump($shopInfo);
echo "</pre>";