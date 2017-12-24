<?php
abstract class Bird {
	//抽象类中既可以有抽象方法也可以有非抽象方法
	abstract function Move();
	function Eating()
	{
		echo "鸟进食";
	}
}

