<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/17
 * Time: 14:17
 */
session_start();
include "../Model/Comment.php";
include "../DAL/CommentService.php";
if (isset($_SESSION["user"]))
{
    $com=new Comment();
    $com->ArtId=$_POST["hidArtId"];
    $com->zqId=$_POST["hidZqId"];
    $com->common=$_POST["content"];
    $com->commentator=$_SESSION["user"];
    $comSev=new CommentService();
    $res=$comSev->addComment($com);
    if($res)
    {
        //发表成功
        echo "<script type='text/javascript'>
              alert ('评论成功');
              location.href='../View/ArticleDetail.php?aId={$_POST["hidArtId"]}&zqId={$_POST["hidZqId"]}';
</script>";
    }else{
        echo "<script type='text/javascript'>
              alert ('评论失败');
              location.href='../View/ArticleDetail.php?aId={$_POST["hidArtId"]}&zqId={$_POST["hidZqId"]}';
</script>";
    }
}else{
    echo "<script type='text/javascript'>
          alert ('请先登录');
          history.back();
</script>";
}