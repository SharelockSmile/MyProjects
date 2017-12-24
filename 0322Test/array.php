<style>
table tr td
{
text-align:center;
}
</style>
<?php
header("Content-Type:text/html;charset=utf-8");


$arr=array("10000","Mike","16");
/*//用for遍历，一般为数字索引
 for($i=0;$i<count($arr);$i++)
{
	echo $arr[$i]."<br/>";
} */
/* //用foreach遍历
foreach ($arr as $b)
{
	echo $b."<br/>";
} 
foreach ($arr as $b=>$v)
{
	echo $b."===>".$v."<br/>";
} */

/* //二维数组
$a=array(
		array("id"=>"10000","name"=>"Mike","age"=>"16"),
		array("id"=>"10001","name"=>"Jam","age"=>"14"),
		array("id"=>"10002","name"=>"Sun","age"=>"17"),
		array("id"=>"10003","name"=>"Tinffy","age"=>"15")
);
$b=array(
		array("10000","Mike","16"),
		array("10001","Jam","14"),
		array("10002","Sun","17"),
		array("10003","Tinffy","15")
);
echo "<table border='1px' width='300px' text-align='center'>";
//二维数组的foreach遍历
 foreach ($a as $b)
{
	echo "<tr>";
	foreach ($b as $c=>$v)
	{
		echo "<td>{$v}</td>";
	} 
} 
//二维数组的for遍历
 for($i=0;$i<count($b);$i++)
{
	echo "<tr>";
	for($j=0;$j<count($b[$i]);$j++)
	{
		echo "<td>{$b[$i][$j]}</td>";
	}
	echo "</tr>";
} 
echo "</table>"; */

/* //三维数组
$third=array(
		array(
				array(
						"id"=>"10001",
						"name"=>"Nike",
						"age"=>"18"
		),
				array(
						"id"=>"10002",
						"name"=>"Peter",
						"age"=>"19"
				)
),
		array(
				array(
						"id"=>"20001",
						"name"=>"Paul",
						"age"=>"19"
		),
				array(
						"id"=>"20002",
						"name"=>"Sun",
						"age"=>"17"
                 )
),
		array(
				array("id"=>"30001","name"=>"Jack","age"=>"16"),
				array("id"=>"30002","name"=>"Rose","age"=>"18")
		),
);
//foreach()遍历
foreach ($third as $th)
{
	echo "<table border='1px' width='200px'>";
	foreach ($th as $clas)
	{
		echo "<tr>";
		foreach ($clas as $stu)
		{
			echo "<td>";
			echo $stu;
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	echo "<br/>";
} */


/* //九九乘法表
ECHO "<TABLE BORDER='1PX' WIDTH='600PX'>";
for ($i=1;$i<=9;$i++)
{
	echo "<tr>";
	for ($j=1;$j<=$i;$j++)
	{
		echo "<td>{$i}*{$j}=".$i*$j."</td>";
	}
	echo "</tr>";
}
echo "</table>";  */

//each和list
/*$acc=array("10001","Jam","14");
//each函数，返回数组中当前元素的键值对，并向后移动数组到下一个位置
 $d0=each($acc);
echo "<pre>";
print_r($d0);
echo "</pre>";
$d1=each($acc);
echo "<pre>";
print_r($d1);
echo "</pre>";
$d2=each($acc);
echo "<pre>";
print_r($d2);
echo "</pre>"; */
/* //list()不属于真正的函数，list()用一步操作给一组变量进行赋值
list($a1,$a2,$a3)=$acc;
echo $a1;
echo "<br/>";
echo $a2;
echo "<br/>";
echo $a3; */

/* $contact=array("id"=>"30001","name"=>"Jack","age"=>"16");
//each()和list()的结合
list($id,$val)=each($contact);
echo $id."====>".$val;
echo "<br/>";
list($name,$val)=each($contact);
echo $name."====>".$val;
echo "<br/>";
list($age,$val)=each($contact);
echo $age."====>".$val; */
/* //each()、list()、while()的结合   while每次循环中each()将当前数组元素的键赋给list()中的第一个参数，并将当前数组元素的值赋给list()中的第二个参数，并且each()会将指针移向下一个,直到数组结尾each()返回false
while (list($key,$value)=each($contact))
{
	echo $key."======>".$value;
	echo "<br/>";
} */

//explode()函数讲字符串转换成数组
$str="时装、休闲、职业装";
$strs=explode("、",$str);
echo "<pre>";
print_r($strs);
echo "</pre>";
//explode()的应用

