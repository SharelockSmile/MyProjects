<?php
include 'Bird.php';
include 'Electricity.php';
class Pigeon extends Bird implements Electricity,Electritor{
	//���̳ж�ʵ��
	public $name;
	protected $weight;
	function Move()
	{
		echo "Fly,Fly....";
	}
	function Open()
	{
		echo "�ſ����";
	}
	function Close()
	{
		echo "������";
	}
	function On()
	{
		echo "�ſ���";
	}
	function Off()
	{
		echo "������";
	}
}

