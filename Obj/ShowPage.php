<?php
function __autoload($className)
{
    require $className.'.php';
}
$db=new DBHelper("localhost",'root',"root","countryinfo");
$db->connet_DB();
$sql="select count(pno) totalRows from personinfo";
$res=$db->ExecuteDQL($sql);
//print_r($res);
$totalRows=$res[0]['totalRows'];
$pageSize=4;
/*$sql="select pno,pname,pAge,pSex,nnum,hobbies from personinfo";*/
$pages=new Page($totalRows,"ShowPage.php",$pageSize);
/**
 * 现调用求总页数的方法
 * 求当前页
 */
$pages->getTotalPages();
$currentPage=$pages->getCurrentPage();
$lim=($currentPage-1)*$pageSize;
//echo $lim;
$sqlA="SELECT pno,pname,pAge,pSex,nname,hobbies FROM nation,personinfo WHERE nation.nid=personinfo.nnum ORDER BY(pno) ASC LIMIT {$lim},{$pageSize}";
$res=$db->ExecuteDQL($sqlA);
echo "<table align='center' style='width: 800px;height: 200px;text-align: center;border: 1px solid #8b1289;'>
             <tr><th>编号</th>
                 <th>姓名</th>
                 <th>年龄</th>
                 <th>性别</th>
                 <th>民族</th>
                 <th>爱好</th>
             </tr>";
if ($res)
{
    foreach ($res as $row)
    {
        echo "<tr>";
        foreach ($row as $col)
        {
            echo "<td>$col</td>";
        }
        echo "</tr>";
    }

}
$pages->showPageContent();

/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/3
 * Time: 16:20
 */