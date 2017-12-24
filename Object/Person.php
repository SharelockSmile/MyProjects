<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/20
 * Time: 17:41
 */

namespace Object;

//创建一个类
class Person
{
    function __construct()
    {
        echo "构造方法";
    }

    private $Id;
    private $Name;
    private $Age;
    private $Sex;
    //魔术方法，为类中的变量设值
    function __set($key, $value)
    {
        // TODO: Implement __set() method.
        $this->$key=$value;
    }
    function __get($key)
    {
        // TODO: Implement __get() method.
        return $this->$key;
    }

    //用来在类外检测对象身上是否包含某个私有的属性，若存在且有值返回true，存在没有值或不存在都返回false
    //当在类外使用isset(私有属性)就会自动调用过来
    function __isset($key)
    {
        return isset($this->$key);
    }

    //删除变量并返回结果
    function __unset($key)
    {
        unset($this->$key);
    }

    function Eat(){}
    function Sleep(){}
    function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo "析构方法";
    }
}
?>