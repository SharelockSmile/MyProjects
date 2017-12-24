<?php

/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/17
 * Time: 14:22
 */
include "DBHelper.php";
class CommentService
{
    private $db;
    function __construct()
    {
        $this->db=new DBHelper("localhost","root","root","forum");
        $this->db->connet_DB();
    }
    function addComment($com)
    {
        $sql="INSERT INTO commentinfo (articleId,common,commoner,zqId) VALUES ($com->ArtId,'$com->common','$com->commentator',$com->zqId)";
        $res=$this->db->ExecuteDML($sql);
        return $res;
    }
}