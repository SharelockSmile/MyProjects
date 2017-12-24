<?php

/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/3
 * Time: 14:09
 */
class People
{
    private $Id;
    private $Name;
    private $Age;
    private static $Sex;
    private static $nation;

    static function walk()
    {
        echo "这是一个静态的走";
    }
    //非静态函数里面可以调用静态成员
    function test1()
    {
        $this->Id=1000;
        People::$Sex='女';
        self::$nation="回族";
        //echo $this->Id."---->".$this->nation.'<br/>';     //静态变量不能用this访问
        echo $this->Id.'---->'.People::$nation.'---->'.self::$Sex."<br/>";
    }
    //静态函数里面不能调用非静态成员
    static function test2()
    {
        //self::test1();    //报错
        self::walk();
    }
}