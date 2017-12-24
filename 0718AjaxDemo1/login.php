<?php
?>
<html>
  <head>
     <script type="text/javascript">
     xmlHttp=null;
       function CreateXML(){
           if(window.ActiveXObject){
                    try{
//                         alert("1");
                    	xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                    catch(e){
                       /*  alert("2");
                        alert(e.message); */
                    	xmlHttp=new ActiveXObject("msxml2.XMLHTTP");
                        }
               }
           else if(window.XMLHttpRequest){
        	   xmlHttp=new XMLHttpRequest();
               }
           }
//        CreateXML();

         function SendLoginRequest(){
                //准备数据
             var uid=fm1.txtUname.value;
             var upwd=fm1.txtUpwd.value;
             CreateXML();
             var getUrl="processLogin.php?uid="+uid+"&upwd="+upwd;
             xmlHttp.open("get",getUrl,true);
             xmlHttp.onreadystatechange=ProcessLogin;
             xmlHttp.send(null);
             }

         function ProcessLogin(){

             if(xmlHttp.status==200&&xmlHttp.readyState==4){
                    var res=xmlHttp.responseText;
                 //   alert(res);
                    if(res=="1"){
                        alert("登录成功！");
                        location.href="index.php";

                        }
                    else if(res=="0"){
                    	   alert("登录失败！");
                       
        
                        }
                 }
             
             }
    //   alert(xmlHttp);
       
     </script>
  </head>
   <body>
       <form name="fm1" >
           用户名:<input type="text" name="txtUname" onblur="SendRequest()"/>
           <span id="spMsg"></span><br/>
     密码：<input type="password" name="txtUpwd"/><br/>
  <input type="button"  value="登录" name="btnLogin" onclick="SendLoginRequest()"/>
       </form>
  </body>
</html>