<!DOCTYPE html>
<?php
//不借助第三方变量交换两个数
    $x=3;
    $y=6;
    $x=$x^$y;
    $y=$x^$y;
    $x=$x^$y;
    echo $x."</br>".$y;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP处理表单2</title>

</head>
<body>
<form action="PlanarCode/welcome.php" method="post">
    名字: <input type="text" name="fname">
    年龄: <input type="text" name="age">
    <input type="submit" value="提交">
</form>
</body>
