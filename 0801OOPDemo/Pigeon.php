<?php
include 'Bird.php';
include 'Electricity.php';
class Pigeon extends Bird implements Electricity,Electritor{
	//单继承多实现
	public $name;
	protected $weight;
	function Move()
	{
		echo "Fly,Fly....";
	}
	function Open()
	{
		echo "张开翅膀";
	}
	function Close()
	{
		echo "收起翅膀";
	}
	function On()
	{
		echo "张开嘴";
	}
	function Off()
	{
		echo "闭上嘴";
	}
}

