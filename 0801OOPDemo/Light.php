<?php
include 'Electricity.php';
class Light implements Electricity{
	//实现接口必须实现接口中声明的方法
	function Open()
	{
		echo "打开电灯";
	}
	function Close()
	{
		echo "关闭电灯";
	}
}

class Door implements Electricity,Electritor
{
	//一个类可以实现多个接口
	function Open()
	{
		echo "开门";
	}
	function Close()
	{
		echo "关门";
	}
	function On()
	{
		echo "把门打开";
	}
	function Off()
	{
		echo "把门关上";
	}
}

