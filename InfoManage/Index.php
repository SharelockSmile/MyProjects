<?php
$link=@mysqli_connect("localhost","root","root","countryinfo") or die("找不到数据库");
mysqli_query($link,"set names utf8");
if(isset($_GET['success']))
{
    if($_GET['success']==2)
    {
        //修改成功跳转而来
    }
    else if ($_GET['success']==2)
    {
        //删除成功跳转而来
    }
    else if ($_GET['success']==3)
    {
        //从登陆界面登陆而来
    }
}
else if(isset($_GET['fault']))
{
    if($_GET['fault']==1)
    {
        //修改失败跳转而来
    }
    else if($_GET['fault']==2)
    {
        //删除失败而来
        echo "<script type='text/javascript'>
alert('删除失败');
</script>";
    }
}
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/14
 * Time: 12:58
 */?>
<html>
<head>
    <style type="text/css">
        table
        {
            width: 900px;
            border-collapse: collapse;
        }
        table tr th,table tr td
        {
            border: solid 2px burlywood;
            text-align: center;
        }
    </style>
    <script type="text/javascript">
        function delet() {
            return confirm("确认要删除此用户？");
        }
    </script>
</head>
<body>
<h1 align="center">人员信息管理</h1>
<table align="center">
    <tr>
        <th>帐号</th>
        <th>昵称</th>
        <th>年龄</th>
        <th>性别</th>
        <th>民族</th>
        <th>爱好</th>
        <th>修改</th>
        <th>详情</th>
        <th>删除</th>
    </tr>
    <?php
    //加@不会报错

    $sql="SELECT pno,pname,pAge,pSex,nname,hobbies FROM nation,personinfo WHERE nation.nid=personinfo.nnum ORDER BY(pno) ASC";

    $res=mysqli_query($link,$sql) or die("SQL语法错误");

    ;
    //$arr=mysqli_fetch_row     数字索引
    //$arr=mysqli_fetch_assoc   关联索引
    //$arr=mysqli_fetch_array    数字索引加关联索引
    //注：$arr=mysqli_fetch_assoc($res)一定要写在while里面，不能单独在外面写
    while (($arr=mysqli_fetch_assoc($res))!=false)
    {
        /*echo "<pre>";
        var_dump($arr);
        echo "</pre>";*/
        echo "<tr>";

        /*echo "<td>{$arr["pno"]}</td>";
        echo "<td>{$arr["pname"]}</td>";
        echo "<td>{$arr["pAge"]}</td>";
        echo "<td>{$arr["pSex"]}</td>";
        echo "<td>{$arr["nname"]}</td>";
        echo "<td>{$arr["hobbies"]}</td>";*/
        foreach ($arr as $col)
        {
            echo "<td>$col</td>";
        }
        echo "<td><a href='Alert.php?pid={$arr['pno']}'>修改</a></td>";
        echo "<td><a href='#'>详情</a></td>";
        echo "<td><a href='Delete.php?pid={$arr['pno']}&del=1' onclick='return delet()'>删除</a></td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
