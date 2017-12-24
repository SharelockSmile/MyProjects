<?php
    
?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
   <head>
     <script type="text/javascript">
     //支持AJAX的核心对象：XMLHttpRequest
      //  第一步：根据浏览器来创建对应的AJAX的核心对象
       xmlhttp=null;//定义一个存储AJAX核心对象的一个全局变量
           function CreateXMLHttp(){
                 if(window.ActiveXObject){
                     //IE系列浏览器
                	 xmlhttp=new  ActiveXObject("Microsoft.XMLHTTP");
                	// alert("IE");
                     }
                 else if(window.XMLHttpRequest){
                 //非IE浏览器
                	 xmlhttp=new XMLHttpRequest();
                	// alert("NOT　IE");
                     }
               }
           function SendRequest(){
               //获取用户名
               var uname=document.fm1.txtUname.value;
               if(uname==""){
                   alert("请先输入用户名！");
                   return;
                   }
            //第一步：创建对象
               CreateXMLHttp();
               if(!xmlhttp){
                 alert("浏览器不支持AJAX");
                 return;
                   }  
                //第二步：打开请求
                //open（method,url,async）
                //参数一method：表示的请求方式get/post
                //参数二url：请求地址
                //参数三async：表示的是是否为异步提交,默认为false，
                //表示同步，设置为true表示为异步提交
               xmlhttp.open("get","ProcessUName.php?uname="+uname,true);
               //第三步：监测请求状态改变的过程中需要执行的代码
               //ajax在发送请求分为0，1，2，3，4共5个状态码
               //只能在请求完毕的时候也就是状态码是4的时候客户端
               //才可以获取最后的处理结果
              xmlhttp.onreadystatechange=function(){
                  //alert(xmlhttp.readyState);
                  //xmlhttp.status获取浏览器的状态码
                  //xmlhttp.readyState获取请求的状态
                  if(xmlhttp.status==200&&xmlhttp.readyState==4){
                      //接收服务器返回的结果
                      var res=xmlhttp.responseText;
                      //alert(res);
                      if(res=="1"){
                          
document.getElementById("spMsg").innerHTML="<font color='red'>用户名已占用！</font>";
                          }
                      else if(res=="0"){
  document.getElementById("spMsg").innerHTML="<font color='green'>用户名可用！</font>";
                          }
                      }
                 }
               //第四步：发送请求
               xmlhttp.send(null);
               }
//            CreateXMLHttp();
     </script>
   </head>
  <body>
       <form name="fm1">
           用户名:<input type="text" name="txtUname" onblur="SendRequest()"/>
           <span id="spMsg"></span><br/>
     密码：<input type="password" name="txtUpwd"/><br/>
  年龄：<input type="text" name="txtUage"/><br/>
  <input type="submit"  value="注册" name="btnReg"/>
       </form>
  </body>
</html>