<?php

/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/11
 * Time: 14:42
 */
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