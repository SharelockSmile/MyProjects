<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/19
 * Time: 10:39
 */
?>
<html>
<head>
    <script type="text/javascript">
        xmlhttp=null;
        function createHtml() {
            if (window.ActiveXObject)
            {
                try{
                    xmlhttp=new ActiveXObject(Microsoft.XMLHTTP);
                }catch (e)
                {
                    xmlhttp=new ActiveXObject(Msxml2.XMLHTTP);
                }//alert("1");
            }else if (window.XMLHttpRequest)
            {
                xmlhttp=new XMLHttpRequest();
            }
        }
        function sendRequest() {
            var uid=document.fm1.txtUname.value;
            var upwd=fm1.txtUpwd.value;
            createHtml();
            var PostUrl="xml_Process.php";
            xmlhttp.open("post",PostUrl,true);
            xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            //alert("111");
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.status==200&&xmlhttp.readyState==4){
                    //alert("2");
                    //var res=xmlhttp.responseXML.getElementsByTagName("meg")[0].firstChild().nodeValue;
                    var res=xmlhttp.responseXML.getElementsByTagName("msg")[0].firstChild.nodeValue;
                    //var res=xmlhttp.responseXML;
                    alert(res);
                    if(res==1){
                        alert("OK");
                    }
                    else{
                        alert("Fail");
                    }
                }
            }
            xmlhttp.send("uid="+uid+"&upwd="+upwd);
        }
    </script>
</head>
<body>
    <form name="fm1" >
        用户名:<input type="text" name="txtUname" />
        <span id="spMsg"></span><br/>
        密码：<input type="password" name="txtUpwd"/><br/>
        <input type="button"  value="登录" name="btnLogin" onclick="sendRequest()"/>
    </form>
</body>
</html>
