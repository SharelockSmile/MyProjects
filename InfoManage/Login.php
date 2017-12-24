<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/18
 * Time: 16:34
 */
//header("Location:Index.php?success=3");
?>
<html>
<head>
    <style type="text/css">
        table tr th
        {
            text-align: center;
        }
    </style>
</head>
<body>
    <table align="center">
        <tr>
            <td>用户名：</td>
            <td><input type="text" name="uname"></td>
        </tr>
        <tr>
            <td>密码：</td>
            <td><input type="password" name="uPwd"></td>
        </tr>
        <tr>
            <td colspan=2><input type="submit" value="登录"></td>
        </tr>
    </table>
</body>
</html>
