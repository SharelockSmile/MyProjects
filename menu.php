<?php
$conn=mysqli_connect("localhost","root","123456")or die("数据库连接失败！");
mysqli_select_db($conn,"mytest")or die("数据库不存在！");
mysqli_query($conn,"set names utf8");
function get_str($id = 0) {
    global $conn;
    global $str;
    $sql = "SELECT id,category FROM menu WHERE parentId={$id};";
    $result = mysqli_query($conn,$sql);//查询子类的分类
    $str .= '<ul>';
    while (($row = mysqli_fetch_array($result))!=false) { //循环记录集
        $str .= "<li>"  . $row['category'] . "</li>"; //构建字符串
        get_str($row['id']); //调用get_str()，将记录集中的id参数传入函数中，继续查询下级
    }
    $str .= '</ul>';
    return $str;
}
echo get_str(0);
?>