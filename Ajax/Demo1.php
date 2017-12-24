<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/18
 * Time: 11:45
 */?>
<html>
<head>
    <script>
        xmlhttp=null;
        function CreatXMLHTTP() {
            if (window.ActiveXObject) {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
               // alert("IE");
            }
            else if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
                //alert("NOT IE");
            }
        }
        //JSON.parse()
        function sendResqust() {
            //alert();
            //获取用户名
            var name=document.myForm.txtName.value;
            //alert(name);
            if (name=="")
            {
                alert("请输入用户名");
            }else {
                CreatXMLHTTP();
                if (!xmlhttp)
                {
                    alert("浏览器不支持Ajax");
                    return;
                }
                //打开请求
                xmlhttp.open("get","process.php?uname="+name,true);
               // xmlhttp.setRequestHeader("Content-Type","application.x-www-form-urlencoded");
                //检测请求状态码
                //这是一个匿名函数
                xmlhttp.onreadystatechange=function () {
                    // xmlhttp.status获取浏览器状态码
                    // xmlhttp.readyState获取请求状态码
                    if (xmlhttp.status==200&&xmlhttp.readyState==4)
                    {
                        //接受服务器返回的状态
                        var res=xmlhttp.responseText;
                        alert(res);
                        if (res=="reject") {
                            document.getElementById("spMeg").innerHTML = "用户已存在";
                        }
                        else if (res=="join"){
                            document.getElementById("spMeg").innerHTML="用户名可用";
                        }
                    }
                }
                xmlhttp.send(null);
            }
        }

    </script>
</head>
<body>
    <form name="myForm">
        用户名：<input type="text" name="txtName" onblur="sendResqust()"><span id="spMeg"></span><br>
        密码：<input type="password" name="upwd"><br>
        <!--<input type="submit" value="注册">-->
        <!--<a href="javascript:document.myForm.submit()"></a>-->
    </form>
</body>
</html>
