<?php
class MyUser
{
	private $uid;
	private $uname;
	private $upwd;
	private $uage;
	private $usex;
	private $nid;
	private $hob;
	function __set($key,$value)
	{
		$this->$key=$value;
	}
	function __get($key)
	{
		return $this->$key;
	}
}