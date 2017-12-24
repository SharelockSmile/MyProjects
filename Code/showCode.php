<?php
header("Content-Type:text/html;charset=utf-8");

?>
<html>
<head>
    <script type="text/javascript">
        function ingTrans() {
            //alert(document.getElementById("imgChange").src);
            //加上?id="+(Math.random()*1000000)是为了欺骗浏览器，然他重新请求一次
            document.getElementById("imgChange").src="creatCode.php?id="+(Math.random()*1000000);
        }
    </script>
</head>
<body>
<form name="myForm" method="get" action="checkCode.php">
    请输入验证码：<input type="text" name="textCode" id="txtCode">
    <img src="creatCode.php" id="imgChange">
    <a href="#" onclick="ingTrans()">看不清楚，换一张</a><br>
    <input type="submit" value="登录"/>
</form>
</body>
</html>