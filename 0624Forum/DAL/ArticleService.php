<?php
include "DBHelper.php";
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/25
 * Time: 11:35
 */
class ArticleService
{
    //
    private $db;
    function __construct()
    {
        $this->db=new DBHelper("localhost","root","root","forum");
        $this->db->connet_DB();
    }
    //
    function  getArticleInfoByZQId($zqId)
    {
        $sql="SELECT articleId,title,author,publishTime,clickCount FROM dis_articles WHERE zqId={$zqId}";
        $res=$this->db->ExecuteDQL($sql);
        return $res;
    }
    //获取评论总数
    function getCommentCountByAid($ArtId)
    {
        $sql="SELECT COUNT(*) as commentCount FROM commentinfo WHERE articleId={$ArtId}";
        $res=$this->db->ExecuteDQL($sql);
        return $res;
    }
    //根据帖子编号查询帖子详情
    function getArticleInfoByArtId($ArtId)
    {
        $sql="select title,content,author,publishTime from dis_articles where articleId={$ArtId}";
        $res=$this->db->ExecuteDQL($sql);
        return $res;
    }
    //获取帖子的评论
    function getCommentsByArtId($ArtId)
    {
        $sql="select commoner,common,commenttime from commentinfo where articleId={$ArtId}";
        $res=$this->db->ExecuteDQL($sql);
        return $res;
    }
}