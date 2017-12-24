<?php
$pid=$_GET['pid'];
$link=@mysqli_connect("localhost","root","root","countryinfo") or die("找不到数据库");
mysqli_query($link,"set names utf8");
$sql="DELETE FROM personinfo WHERE pno={$pid}";
$res=mysqli_query($link,$sql);
$row=mysqli_affected_rows($link);
if($row==1)
{
    if($_GET['del']==1)
    {
        header("Location:Index.php?success=3");
    }
    elseif($_GET['del']==2)
    {
        //echo "success";
        header("Location:SelectByPage.php?page={$_GET['page']}");
    }
}
else
    {
        if($_GET['del']==1)
        {
            header("Location:Index.php?fault=2");
        }

    }

/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/18
 * Time: 16:50
 */