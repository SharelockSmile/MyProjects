<?php
include "DBHelper.php";
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/24
 * Time: 18:16
 */
class ZQSevices
{
    private $db;
    function __construct()
    {
        $this->db=new DBHelper("localhost","root","root","forum");
        $this->db->connet_DB();
    }
    //获取专区信息
    function getZQInfo()
    {
        $sql="select zqId,zqName,zqHost,zqlogo, createTime from dis_zq";
        $res=$this->db->ExecuteDQL($sql);
        return $res;
    }
    //获取专区发帖总数
    function getArticlesByzqId($zqId)
    {
        $sql="select count(*) as num from dis_articles WHERE zqid={$zqId}";
        $res=$this->db->ExecuteDQL($sql);
        return $res;
    }
}