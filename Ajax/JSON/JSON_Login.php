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
        Jsonhttp=null;
        function CreatXMLHTTP() {
            if (window.ActiveXObject) {
                Jsonhttp = new ActiveXObject("Microsoft.XMLHTTP");
               // alert("IE");
            }
            else if (window.XMLHttpRequest) {
                Jsonhttp = new XMLHttpRequest();
            }
        }
        //JSON.parse()
        function sendResqust() {
            //获取用户名
            var name=document.myForm.txtName.value;
            var pwd=document.myForm.upwd.value;
            if (name=="")
            {
                alert("请输入用户名");
            }else {
                CreatXMLHTTP();
                if (!Jsonhttp)
                {
                    alert("浏览器不支持Ajax");
                    return;
                }
                //打开请求
                var PostUrl="JSON_pro.php";
                Jsonhttp.open("post",PostUrl,true);
                Jsonhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                Jsonhttp.onreadystatechange=function () {
                    if (Jsonhttp.status==200&&Jsonhttp.readyState==4)
                    {
                        alert("2");
                        //接受服务器返回的状态
                       var res=eval("("+Jsonhttp.responseText+")");
                        alert(res);
                        if (res.msg==1)
                        {
                            alert("Join");
                        }
                        else {
                            alert("Reject");
                        }
                    }
                }
                Jsonhttp.send("uid="+name+"&upwd="+pwd);
            }
        }

    </script>
</head>
<body>
    <form name="myForm">
        用户名：<input type="text" name="txtName"><br>
        密码：<input type="password" name="upwd"><br>
        <input type="submit" value="登录" onclick="sendResqust()">
    </form>
</body>
</html>
