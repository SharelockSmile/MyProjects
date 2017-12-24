<?php
$link=@mysqli_connect("localhost","root","root","countryinfo") or die("找不到数据库");
mysqli_query($link,"set names utf8");
/*if(isset($_GET['page'])&&$_GET['page']>1)
{
    echo "{$_GET['page']}";
}
if(isset($_GET['page'])&&$_GET['page']<$totalPage)
{
    echo "";
}*/
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/18
 * Time: 17:50
 */?>
<html>
<head>
    <style type="text/css">
        table
        {
            width: 900px;
            border-collapse:collapse;
        }
        table tr th,table tr td
        {
            border: solid 2px darkolivegreen;
            text-align: center;
        }
        #divPage
        {
            width: 400px;
            height: 50px;
            margin: 20px auto;
            text-align: center;
            line-height: 50px;
        }
    </style>
    <script type="text/javascript">
        function deleteFn() {
            return confirm("是否要删除该用户?");
        }
            document.getElementById("divPage").innerHTML="<a href='SelectByPage.php?page=1'>首页</a>";
    </script>
</head>
<body>
    <h1 align="center">信息管理处</h1>
    <table align="center">
        <tr>
            <th>帐号</th>
            <th>用户名</th>
            <th>年龄</th>
            <th>性别</th>
            <th>民族</th>
            <th>爱好</th>
            <th>新增</th>
            <th>修改</th>
            <th>删除</th>
        </tr>
        <?php
            //定义些相关变量
            $totalRow="";    //总条数
            $totalPage="";    //总页数
            $currentPage=1;    //起始页
            $starIndex=0;    //每一页起始索引
            $pageRow=3;    //每一页显示条数
        //求总条数
        $sql="SELECT COUNT(pno)AS nums FROM personinfo";
        $res=mysqli_query($link,$sql);
        $num=mysqli_num_rows($res);
        if($num==1)
        {
            $arr=mysqli_fetch_array($res);
            //var_dump($arr);
            $totalRow=$arr['nums'];
            $totalPage=ceil($totalRow/$pageRow);
            //ceil()向上取整类型仍是float
            //var_dump($totalPge);
        }
        //根据行数求页数
        else
            {
                echo "";
            }
            //求当前页
        if(isset($_GET['page']))
        {
            $currentPage=$_GET['page'];
            if($_GET['page']<1)
            {
                header("Location:SelectByPage.php?page=1");
            }
            elseif ($_GET['page']>$totalPage)
            {
                header("Location:SelectByPage.php?page={$totalPage}");
            }
        }
        //求当前页索引
        $starIndex=($currentPage-1)*$pageRow;
        $sql="SELECT pno,pname,pAge,pSex,nname,hobbies FROM personinfo,nation WHERE nation.nid=personinfo.nnum ORDER BY(pno) ASC LIMIT {$starIndex},{$pageRow}";
        $res=mysqli_query($link,$sql) or die("数据有误");
        while (($arr=mysqli_fetch_assoc($res))!=false)
        {
            //var_dump($arr);
            echo "<tr>";
            foreach ($arr as $col)
            {
                echo "<td>$col</td>";
            }
            echo "<td><a href='Register.php'>添加</a></td>";
            echo "<td><a href='Alert.php?pid={$arr['pno']}'>修改</a></td>";
            echo "<td><a href='Delete.php?pid={$arr['pno']}&del=2&page=$currentPage' onclick='return deleteFn()'>删除</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <div id="divPage">

        <a href="SelectByPage.php?page=1">首页</a>
        <a href="SelectByPage.php?page=<?php echo $currentPage-1;?>">上一页</a>

        <?php echo "当前是第【{$currentPage}】页,共【{$totalPage}】页"?>
        <a href="SelectByPage.php?page=<?php echo $currentPage+1;?>">下一页</a>
        <a href="SelectByPage.php?page=<?php echo $totalPage;?>">尾页</a>
    </div>
</body>
</html>
