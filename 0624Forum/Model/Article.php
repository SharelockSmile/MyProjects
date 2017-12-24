<?php

/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/25
 * Time: 23:29
 */
class Article
{
    private $ArtId;
    private $title;
    private $zqId;
    private $content;
    private $author;
    private $publicDate;
    private $cilckCount;
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