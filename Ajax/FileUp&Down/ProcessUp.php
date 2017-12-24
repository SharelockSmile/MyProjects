<?php
print_r($_FILES);
//定义上传的格式
$allow=array("png","txt","docx","xlsx","rer","zip","jpg","doc","pptx","html","pdf");
//设置保存路径
$path="./Upload/";
//获取文件名称
$name=$_FILES["myFile"]["name"];
//得到文件后缀
$arr=explode(".",$name);
$lastname=array_pop($arr);
//echo $lastname;
if (!in_array($lastname,$allow))
{
    die("文件格式不正确!");
}
switch ($_FILES["myFile"]["error"])
{
    case 0 :
        //if (move_uploaded_file($_FILES["myFile"]["tmp_name"],$name))
        if (move_uploaded_file($_FILES["myFile"]["tmp_name"],$path.date("Ymdhis").rand(0, 10000).".".$lastname))
        {
            echo "上传成功";
        }else{
            echo "上传失败";
        }
        break;
    case 1 :
        die("文件超出配置文件最大限制");
        break;
    case 2:
        die("文件大小超出用户设定最大值");
        break;
    case 3:
        die("文件只被部分上传");
        break;
    default:
        die("未知错误");
        break;
}
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/20
 * Time: 21:00
 */