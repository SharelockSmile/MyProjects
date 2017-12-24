<?php

$uname=$_POST['userName'];
$upwd=$_POST['userPwd'];
$uage=$_POST['userAge'];
$usex=$_POST['userSex'];
$nid=$_POST['selNation'];
$hob=$_POST['chkBobbies'];
//implode将数组转化为字符串
$hobbies=implode(",",$hob);

$link=@mysqli_connect("localhost","root","root","countryinfo") or die("找不到数据库");
mysqli_query($link,"set names utf8");
$check="SELECT * FROM personinfo WHERE pname='{$uname}'";
$result=mysqli_query($link,$check)or die("SQL语法错误");
$number=mysqli_num_rows($result);
if ($number==1)
{
    echo "该用户名已存在";
    header("Location:Register.php?fault=1");
}
else {
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        header("location");
    } else {
        // echo "注册成功";
        if ($uage == "") {
            $sql = "INSERT INTO personinfo (pname,pwd,pAge,pSex,nnum,hobbies) VALUES('{$uname}',MD5('{$upwd}'),NULL ,{$usex},{$nid},'{$hobbies}')";
        } else if ($usex == "0") {
            $sql = "INSERT INTO personinfo (pname,pwd,pAge,pSex,nnum,hobbies) VALUES('{$uname}',MD5('{$upwd}'),{$uage},NULL ,{$nid},'{$hobbies}')";
        } else if ($hobbies == "") {
            $sql = "INSERT INTO personinfo (pname,pwd,pAge,pSex,nnum,hobbies) VALUES('{$uname}',MD5('{$upwd}'),{$uage},{$usex},{$nid},null)";
        } else if ($uage == "" && $usex == "0") {
            $sql = "INSERT INTO personinfo (pname,pwd,pAge,pSex,nnum,hobbies) VALUES('{$uname}',MD5('{$upwd}'),NULL ,NULL ,{$nid} ,'{$hobbies}')";
        } else if ($usex == "0" && $hobbies == "") {
            $sql = "INSERT INTO personinfo (pname,pwd,pAge,pSex,nnum,hobbies) VALUES('{$uname}',MD5('{$upwd}'),{$uage},NULL,{$nid},NULL)";
        } else if ($uage == "" && $hobbies == "") {
            $sql = "INSERT INTO personinfo (pname,pwd,pAge,pSex,nnum,hobbies) VALUES('{$uname}',MD5('{$upwd}'),NULL,{$usex},{$nid},null)";
        } else if ($uage == "" && $usex == "0" && $hobbies == "") {
            $sql = "INSERT INTO personinfo (pname,pwd,pAge,pSex,nnum,hobbies) VALUES('{$uname}',MD5('{$upwd}'),NULL,NULL,{$nid},NULL)";
        } else {
            $sql = "INSERT INTO personinfo (pname,pwd,pAge,pSex,nnum,hobbies) VALUES('{$uname}',MD5('{$upwd}'),{$uage},{$usex},{$nid},'{$hobbies}')";
        }

        $res = mysqli_query($link, $sql);
        if ($res) {
            //echo "注册成功，是否立即登录";
            //浏览器跳转
            echo "<div>注册成功,立即登录,如果你的浏览器没有自动跳转,<a href='Login.php'>请点击这里</a></div>";
            echo "<script>
setTimeout(function() {window.location.href='Login.php';
},3000)
</script>";
        } else {
            echo "falut";
        }
    }

}
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/14
 * Time: 9:24
 */
