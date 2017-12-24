<?php

/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/25
 * Time: 23:34
 */
class Comment
{
    private $comId;
    private $ArtId;
    private $common;
    private $commentator;
    private $comDate;
    private $zqId;
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