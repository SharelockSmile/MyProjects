<?php
?>
<html>
<head>
    <script type="text/javascript" src="jquery-3.1.0.js"></script>
    <script type="text/javascript">
        $(function(){
            /* $("#textNum1").onblur(function(){
                var num1=document.getElementById("textNum1").val();
                alert("1111");
                });
            $("#textNum2").blur(function(){
                }); */
            })
    </script>
</head>
<body>
    <form action="" method="post" name="myForm">
        <table align="center">
        <tr>
            <td width="240px">数字一：<input type="text" name="textNum1" id="textNum1"></td>
            <td width="50px">
                <select name="selOp">
                    <option>+</option>
                    <option>-</option>
                    <option>*</option>
                    <option>/</option>
                </select>
            </td>
            <td width="240px">数字二：<input type="text" name="textNum2" id="textNum2"></td>
            <td width="50px"><input type="submit" value="="></td>
            <td width="200px"><input type="text" name="textRes"></td>
        </tr>
        <tr>
            <td width="240px"></td>
            <td width="50px"></td>
            <td width="240px"></td>
            <td width="50px"></td>
            <td width="200px"></td>
        </tr>
        </table>
    </form>
</body>
</html>