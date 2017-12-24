<?php
interface Electricity {
	//不能包含变量
	function Open();
	function Close();
}

interface Electritor extends Electricity{
	function On();
	function Off();
}

