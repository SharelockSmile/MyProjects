<?php
$uname=$_POST['userName'];
$upwd=$_POST['userPwd'];
$uage=$_POST['userAge'];
$usex=$_POST['userSex'];
$nid=$_POST['selNation'];
$hob=$_POST['chkBobbies'];
$hobbies=implode(",",$hob);
function __autoload($className)
{
    require $className.'.php';
}
//$link=@mysqli_connect("localhost","root","root","countryinfo") or die("找不到数据库");
$sql='';
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

$db=new DBHelper("localhost",'root',"root","countryinfo");
$db->connet_DB();



$res=$db->ExecuteDML($sql);
if ($res)
{
    echo "success";
}else
    {
        echo "fault";
    }
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/1
 * Time: 21:20
 */