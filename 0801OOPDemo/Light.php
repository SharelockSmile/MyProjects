<?php
include 'Electricity.php';
class Light implements Electricity{
	//ʵ�ֽӿڱ���ʵ�ֽӿ��������ķ���
	function Open()
	{
		echo "�򿪵��";
	}
	function Close()
	{
		echo "�رյ��";
	}
}

class Door implements Electricity,Electritor
{
	//һ�������ʵ�ֶ���ӿ�
	function Open()
	{
		echo "����";
	}
	function Close()
	{
		echo "����";
	}
	function On()
	{
		echo "���Ŵ�";
	}
	function Off()
	{
		echo "���Ź���";
	}
}

