<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/11
 * Time: 15:16
 */?>
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
<form action="ProcessLogin.php" method="post">
    <table align="center">
        <tr>
            <td>帐号：</td>
            <td><input type="text" name="uId"></td>
        </tr>
        <tr>
            <td>密码：</td>
            <td><input type="password" name="uPwd"></td>
        </tr>
        <tr>
            <td colspan=2><input type="submit" value="登录"></td>
        </tr>
    </table>
</form>

</body>
</html>
