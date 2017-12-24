<?php
//直接定义，无参函数
/* function fn1()
{
	echo "1111";
	echo "<br/>";
}
fn1(); */
//带参数的函数
$a=12;
$b=23;

/* function fn2($x,$y)
{
	$s=$x*$y;
	echo $s;
	echo "<br/>";
}
fn2($a, $b); */
//含可选参数的函数（可选参数必须置于最后）
/* function fn3($x,$y,$z=20)
{
	$s=$x*$y+$z;
	echo $s;
	echo "<br/>";
}
fn3($a, $b); */
//值传递和地址传递(值传递不会影响外部变量的值，地址传递会影响外部传入函数的变量的值)
$c=10;
function fn4($d)
{
	$d=$d+10;
	echo "内部的变量D：".$d;
}
fn4($c);
echo "外部的D：".$c;
echo "<br/>";
$d=100;
function fn5(&$c)
{
	$c=$c*10;
	echo "内部的变量C：".$c;
}
echo fn5($d);
echo "外部的D：".$d;

/* //回调函数   (特别提醒，取余数用%)
//首先定义取余函数
function mod($n,$i)
{
	return $n%$i==0;
}
//定义在整除函数中并且整除函数含有两个参数
function exact($fn,$m)
{
	//参数$m又作为参数传入所调的函数$fn()中
	for ($i=1;$i<100;$i++)
	{
		if($fn($i,$m))
		{
			echo $i."&nbsp;&nbsp;";
		}
	}
}
//将取余函数作为参数在整除函数中调用
exact("mod", 4); */

