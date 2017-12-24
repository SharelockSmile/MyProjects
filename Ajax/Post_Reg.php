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
                try {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }catch (e){
                    xmlhttp=new ActiveXObject("MSxml2.XMLHTTP");
                }
                //alert("IE");
            }
            else if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
               // alert("NOT IE");
            }
        }
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
                var url="Post_pro.php";
                xmlhttp.open("post",url,true);
                xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                //检测请求状态码
               xmlhttp.onreadystatechange=chuli;
                xmlhttp.send("uname="+name);
               function chuli() {
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
            }
        }
    </script>
</head>
<body>
    <form name="myForm">
        用户名：<input type="text" name="txtName" onblur="sendResqust()"><span id="spMeg"></span><br>
        密码：<input type="password" name="upwd"><br>
        <input type="submit" value="注册">
    </form>
</body>
</html>
