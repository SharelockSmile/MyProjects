<?php
class Person
{
    /*function __construct()
    {
        echo "构造方法";
    }*/

    /*public $Id;
    var $name;
    var $age;*/
    private  $Id;
    private $Name;
    private $Age;
    function setId($v)
    {
        $this->Id=$v;
    }
    function getId()
    {
        return $this->Id;
    }

    function setName($name)
    {
        $this->Name=$name;
    }
    function getName()
    {
        return $this->Name;
    }

    function setAge($age)
    {
        $this->Age=$age;
    }
    function getAge()
    {
        return $this->Age;
    }

    function Eat(){}
    function Sleep(){}
   /* function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo "析构方法";
    }*/
}
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/30
 * Time: 10:10
 */