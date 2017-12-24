<?php

/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/25
 * Time: 23:34
 */
class User
{
    private $uId;
    private $uName;
    private $trueName;
    private $uPwd;
    private $uSex;
    private $birthDate;
    private $telNum;
    function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->$name=$value;
    }
    function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->$name;
    }
}