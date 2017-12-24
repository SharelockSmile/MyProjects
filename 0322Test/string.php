<?php
$shopping="24,2@13,1@21,1";
$arrshop=explode("@", $shopping);
foreach ($arrshop as $shop)
{
	$arr=explode(",", $shop);
	$arrAll[]=$arr;
} 
$num="";
for($i=0;$i<count($arrAll);$i++)
{
	if($arrAll[$i][0]==13)
	{
		$num=$i;
		break;
	}
}
//$arrAll=array_merge(array_diff($arrAll,$arrAll[$num]));
unset($arrAll[$num]);
//重置索引
$arrAll=array_values($arrAll);
$arrAll=array_merge($arrAll);
/*  echo "<pre>";
var_dump($arrAll);
echo "</pre>"; */
//字符串重新拼接
 for($i=0;$i<count($arrAll);$i++)
{
	$shopping=implode(",", $arrAll[$i]);
	$all[]=$shopping;
} 
//array_push($all, $shop1);
$allShopping=implode("@", $all);

var_dump($allShopping);