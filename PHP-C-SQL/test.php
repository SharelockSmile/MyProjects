<?php
/*$link=mysqli_connect("localhost","root","root","studentinfo");
if(!$link)
{
    echo "数据库连接失败！"+"<br/>";
}
else
    {
        echo "数据库连接成功！<br/>";
    }
   //mysqli_select_db("$link","studentinfo");
//$sql="SELECT *FROM myuser WHERE userId=10000 AND userPwd=MD5('123')";
//$sql="INSERT INTO Myuser VALUES (10003,MD5('123456'),18,'女')";
$sql="SELECT userId,userAge,userSex FROM myuser";
mysqli_query($link,"SET NAMES UTF8");
$res=mysqli_query($link,$sql);
if(!$res)
{
    echo "数据插入失败！";
}
else
    {
        echo "数据插入成功!";
    }*/

/*$link=@mysqli_connect("localhost","root","root","countryinfo") or die("找不到数据库");
$sql="SELECT nid,nname FROM nation";
mysqli_query($link,"set names utf8");
$res=mysqli_query($link,$sql);
while (($arr=mysqli_fetch_array($res))!=false)
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}*/
/*$sql="select * from myuser";
$res=mysqli_query($link,$sql);
mysqli_fetch_array($res);*/
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/6
 * Time: 17:11
 */?>
<html>
<head></head>
<body>
    <table>
        <tr>
            <td>籍贯</td>
            <td>
                <select>
                    <?php
                    $link=@mysqli_connect("localhost","root","root","countryinfo") or die("找不到数据库");
                    $sql="SELECT nid,nname FROM nation";
                    mysqli_query($link,"set names utf8");
                    $res=mysqli_query($link,$sql);
                    while (($arr=mysqli_fetch_array($res))!=false)
                    {
                        echo "<option value='{$arr['nid']}'>";
                        echo "{$arr['nname']}";
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>爱好</td>
            <td>
                <!--复选框命名必须加[]-->
                <input type="checkbox" name="chkBobbies[]" value="绘画">绘画
                <input type="checkbox" name="chkBobbies[]" value="音乐">音乐
                <input type="checkbox" name="chkBobbies[]" value="篮球">篮球
            </td>
        </tr>
    </table>
</body>
</html>