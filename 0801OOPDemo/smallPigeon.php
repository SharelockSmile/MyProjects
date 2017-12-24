<?php
include 'Pigeon.php';
$ww=100;
class smallPigeon extends Pigeon{
	private $height;
	public function setWeight($ww)
	{
		$this->weight=$ww;
	}
}

