<?php
/*$fileName="Upload/306246.jpg";
header("Content-Type:image/jpeg");
header("Content-Disposition:attachment;filename={$fileName}");
header("Content-Length:".filesize($fileName));
readfile($fileName);*/
header("Content-Type:text/html;charset=utf-8");
$file_name="Hu&Cat.jpg";
//用以解决中文不能显示
$file_name=iconv("utf-8","gb2312","$file_name");
$file_sub_path=$_SERVER['DOCUMENT_ROOT']."/phpTest/Ajax/FileUp&Down/Upload/";
$file_path=$file_sub_path.$file_name;
//判断所给文件是否存在
echo $file_path;
if (!file_exists($file_path))
{
    echo "没有该文件";
    return;
}
$fp=fopen($file_path,"r");
$file_size=filesize($file_path);
//所需头文件
//得知服务端返回的文件格式
header("Content-Type:application/octet-stream");
//返回的文件大小是按照字节进行计算的
Header("Accept-Ranges:bytes");
//返回文件的大小
header("Accept-Length:".$file_size);
//返回文件的名称
header("Content-Disposition:attachment;filename=".$file_name);
$buffer=1024;
$file_count=0;
//向浏览器返回数据
while (!feof($fp)&&$file_count<$file_size)
{
    $file_con=fread($fp,$buffer);
    $file_count+=$buffer;
    echo $file_con;
}
//释放缓冲区
fclose($fp);
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/20
 * Time: 21:38
 */