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
                //׼������
             var uid=fm1.txtUname.value;
             var upwd=fm1.txtUpwd.value;
             CreateXML();
             var PostUrl="PostProcessLogin.php";
             xmlHttp.open("post",PostUrl,true);
             xmlHttp.setRequestHeader("Content-Type",
                     "application/x-www-form-urlencoded");
              xmlHttp.onreadystatechange=function(){
                 if(xmlHttp.status==200&&xmlHttp.readyState==4){
                        var res=xmlHttp.responseText;
                     //   alert(res);
                        if(res=="1"){
                            alert("��¼�ɹ���");
                            location.href="index.php";
                            }
                        else if(res=="0"){
                        	   alert("��¼ʧ�ܣ�");
                            }
                     }
                 }
              xmlHttp.send("uid="+uid+"&upwd="+upwd);
             }
      
     </script>
  </head>
   <body>
       <form name="fm1" >
           �û���:<input type="text" name="txtUname" onblur="SendRequest()"/>
           <span id="spMsg"></span><br/>
     ���룺<input type="password" name="txtUpwd"/><br/>
  <input type="button"  value="��¼" name="btnLogin" onclick="SendLoginRequest()"/>
       </form>
  </body>
</html>