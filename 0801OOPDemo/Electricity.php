<?php
interface Electricity {
	//���ܰ�������
	function Open();
	function Close();
}

interface Electritor extends Electricity{
	function On();
	function Off();
}

