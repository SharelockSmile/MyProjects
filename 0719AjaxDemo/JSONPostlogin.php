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
             var PostUrl="JSONPostProcessLogin.php";
             xmlHttp.open("post",PostUrl,true);
             xmlHttp.setRequestHeader("Content-Type",
                     "application/x-www-form-urlencoded");
             //alert("111");
              xmlHttp.onreadystatechange=function(){
                  //alert("1");
                 if(xmlHttp.status==200&&xmlHttp.readyState==4){
                	 //JSON字符串装换为JSON对象
                  var res=eval("("+xmlHttp.responseText+")");
                //  alert(res);
                       if(res.msg==1){
                          alert("OK");
                          }
                      else{
                    	  alert("Fail");
                          }
                     }
                 }
              xmlHttp.send("uid="+uid+"&upwd="+upwd);
          }
        
     </script>
  </head>
   <body>
       <form name="fm1" >
           用户名:<input type="text" name="txtUname" />
           <span id="spMsg"></span><br/>
     密码：<input type="password" name="txtUpwd"/><br/>
  <input type="button"  value="登录" name="btnLogin" onclick="SendLoginRequest()"/>
       </form>
  </body>
</html>