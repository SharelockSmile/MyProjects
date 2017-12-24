<?php
//一般帐号不允许修改
$uId=$_POST['userId'];
$uName=$_POST['userName'];
//年龄可以不填写
$uAge=$_POST['userAge'];
if($uAge==""){
    $uAge="null";
}
$uSex=$_POST['userSex'];
$uNation=$_POST['selNation'];
echo $uNation;
//先判断是否有爱好
if(isset($_POST['chkBobbies']))
{
    $arrHob=$_POST['chkBobbies'];
    $hob=implode(",",$arrHob);
}
else
    {
        $hob="";
    }
$link=@mysqli_connect("localhost","root","root","countryinfo") or die("数据库连接失败");
mysqli_select_db($link,"personinfo");
mysqli_query($link,"set names utf8");
//$sql="UPDATE personinfo SET pSex={$uSex}, WHERE pno=1003";
$sql="UPDATE personinfo SET pname='{$uName}',pAge={$uAge},pSex='{$uSex}',nnum={$uNation},hobbies='{$hob}' WHERE pno={$uId}";
$res=mysqli_query($link,$sql) or die("数据有误");
//判断受影响行数(此次连接的受影响行数)
$row=mysqli_affected_rows($link);
//如果行数不为假，则判断执行成功
if($row)
{
    header("Location:index.php?success=1");
    //echo "success";
}
else
    {
       header("Location:Alert.php?fault=1&pid={$uId}");
        //echo "fault";
    }
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/18
 * Time: 14:52
 */
?>

