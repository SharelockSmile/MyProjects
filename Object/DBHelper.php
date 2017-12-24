<?php

/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/30
 * Time: 15:13
 */
class DBHelper
{
    //服务器名称
    private $serverName;
    //用户名
    private $userName;
    //密码
    private $passWord;
    //表
    private $dbName;
    //连接
    private $link;

    /**
     * DBHelper constructor.
     * @param String $s  连接方式
     * @param String $u  连接用户名
     * @param String $p  连接密码
     * @param String $db 要连接的数据库
     */
    function __construct($s,$u,$p,$db)
    {
        $this->serverName=$s;
        $this->userName=$u;
        $this->passWord=$u;
        $this->dbName=$db;
    }

    function connet_DB()
    {
        $this->link=mysqli_connect($this->serverName,$this->userName,$this->passWord) or die("连接失败");
        mysqli_select_db($this->dbName) or  die("找不到数据库");
        mysqli_query($this->link,"set names utf8");
    }
    //DML数据操纵语言,,,,,用于执行增删改操作的方法，有返回值的函数
    function ExecuteDML($sql)
    {
        $res=mysqli_query($this->link,$sql);
        if ($res)
        {
            $row=mysqli_affected_rows($this->link);
            if ($row)
            {
                return true;
            }
        }else
            {
                return false;
            }
    }
    //执行查询语句

    /**
     * @param $sql 数据库连接语言
     * @return array|bool
     */
    function ExecuteDQL($sql)
    {
        $this->connet_DB();
        $arrAll=array();
        $res=mysqli_query($this->link,$sql);
        if($res)
        {
            while (($arr=mysqli_fetch_assoc($res))!=false)
            {
                //把每一次遍历拿到的数组放到一个二维数组中
                $arrAll[]=$arr;
            }
            return $arrAll;
            //释放资源
            mysqli_free_result($res);
        }else
            {
                return false;
            }
    }
    function __destruct()
    {
        // TODO: Implement __destruct() method.
        mysqli_close($this->link);
    }
}