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
                border: solid 2px indigo;
                text-align: center;
            }
        </style>
    </head>
    <body>
       <h1 align="center">信息管理</h1>
            <table align="center">
                <tr>
                    <th>帐号</th>
                    <th>昵称</th>
                    <th>年龄</th>
                    <th>性别</th>
                    <th>民族</th>
                    <th>爱好</th>
                    <th>添加</th>
                    <th>详情</th>
                    <th>删除</th>
                </tr>
                <?php
                    //加@不会报错
                    $link=@mysqli_connect("localhost","root","root","countryinfo") or die("找不到数据库");
                    $sql="SELECT pno,pname,pAge,pSex,nnum,hobbies FROM nation,personinfo WHERE nation.nid=personinfo.nnum";
                    mysqli_query($link,"set names utf8");
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
                       echo "<td>{$arr["nnum"]}</td>";
                       echo "<td>{$arr["hobbies"]}</td>";*/
                       foreach ($arr as $col)
                       {
                           echo "<td>$col</td>";
                       }
                       echo "<td><a href='#'>添加</a></td>";
                       echo "<td><a href='#'>详情</a></td>";
                       echo "<td><a href='#'>删除</a></td>";
                       echo "</tr>";
                   }

                ?>
            </table>

    </body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/13
 * Time: 16:48
 */