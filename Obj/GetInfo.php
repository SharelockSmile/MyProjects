<?php
function __autoload($className)
{
    require $className.'.php';
}

/*$db=new DBHelper('loacalhost','root','root','countryinfo');
$db->connet_DB();*/
$db=new DBHelper("localhost",'root',"root","countryinfo");
$db->connet_DB();
//$sql="select pno,pname,pAge,pSex,nnum,hobbies from personinfo";
$sql="SELECT pno,pname,pAge,pSex,nname,hobbies FROM nation,personinfo WHERE nation.nid=personinfo.nnum ORDER BY(pno) ASC";
$res=$db->ExecuteDQL($sql);
echo "<table align='center'><tr><th >编号</th>
                 <th>姓名</th>
                 <th>年龄</th>
                 <th>性别</th>
                 <th>民族编号</th>
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
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/3
 * Time: 15:34
 */