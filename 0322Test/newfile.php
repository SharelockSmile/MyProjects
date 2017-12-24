<?php
//数组定义
//直接赋值
$arr[0]=1;
$arr[1]=2;
$arr[2]=3;
echo "<pre>";
var_dump($arr);
echo "</pre>";
//
$arr1=array(4,4,5,6);
echo "<pre>";
print_r($arr1);
echo "</pre>";
/* //关联数组
$arr2=array("a"=>"que","b"=>"we","c"=>"are");
echo "<pre>";
var_dump($arr2);
echo "</pre>";
$arr3["x"]="you";
$arr3["y"]="soon";
$arr3["z"]="not";
echo "<pre>";
print_r($arr3);
echo "</pre>"; */

/* //二维数组
$arr4=array(array("q","d","r"),array(5,9,4));
echo "<pre>";
var_dump($arr4);
echo "</pre>";
$arr5[0][0]="f";
$arr5[0][1]="g";
$arr5[0][2]="p";
$arr5[1][0]=6;
$arr5[1][1]=8;
$arr5[1][2]=2;
echo "<pre>";
print_r($arr5);
echo "</pre>";  */

//用count统计数组的元素个数
$arr6=array("id"=>array("1002","1003","1004"),
		"name"=>array("慕寒","银临"),
		"age"=>"16"
);
echo count($arr6);
echo "<br/>";


/* //运算符的优先级
$i=true;
$j=false;
$k=false;
//&&和||   (&&>>||)
var_dump($i||$j&&$k);
//!和||   (!>>||)
var_dump(!$k||$j);
//!和&&   (!>>&&)
var_dump(!$j&&$k);
//and和||   (||>>and)
var_dump($i||$j and $k);
//xor和or  (xor>>or)
var_dump($i xor $k or $i);
//and和xor  (and>>xor)
var_dump($i and $j xor $k);

//综上!>>&&>>||>>and>>xor>>or */
//for 循环
for($i=0;$i<9;$i++)
{
	for ($j=0;$j<$i;$j++)
	{
		echo "&nbsp;";
	}
	for ($j=$i;$j<9-$i;$j++)
	{
		echo "*";
	}echo "<br/>";
}
for($i=9;$i>0;$i--)
{
	for($j=9;$j>$i;$j--)
	{
		echo "&nbsp;";
	}
	for ($j=$i;$j>$i;$j--)
	{
		echo "*";
	}
}
?>
<html>
   <head></head>
   <body>
   </body>
</html>