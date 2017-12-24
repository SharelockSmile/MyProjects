<?php

?>
<html>
   <head>
 <script type="text/javascript"
      src="js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript">
        $(function(){
        //  $("#txt1").select();
 $("#txt1").trigger("select");
     /*    //1.load()
//             $("#div1").load("1.php");
        	  //$("#div1").load("1.php #1-div2"); */

       //2.getJSON()
            $("#btn1").click(function(){
                //参数一：json文件路径
                //参数二：回调函数，参数data用来存储加载成功
                //之后返回的json数据（类似于在原生ajax使用eval("("+responseText+")"）
              $str="用户信息如下：<br/>";//存储返回到的数据的字符串格式
             $.getJSON("js/user.json",function(data){
                 $.each(data,function(){
                	 $str+="编号:"+this.uid+
                	 ",姓名:"+this.uname+"<hr/>";
                     });
                //将数据显示到div2中
                 $("#div2").html($str);
                 });
                }); 
/* //3.$.get()获取xml文件内容
            $("#btn2").click(function(){
               // responseXML
               var str="用户信息如下:<br/>";
                   $.get("Users.xml",function(data){
                      // alert(data);
                     var users=$(data).find("user");
                     $.each(users,function(){ 
                         str+="编号:"+$(this).find("uid").text()
                         +",姓名:"+$(this).find("uname").text()+"<br/>";
                         });
                    // alert(str);
                     $("#div2").html(str);
                   });
                }); */

  /*   //4.$.get()方法发送get请求
            $("#btn3").click(function(){
                var uid=$("#txtUid").val();
                var upwd=$("#txtUPwd").val();
                $.get("loginProcess.php",
                        {
                           "uid":uid,
                           "upwd":upwd
                        },
                        function(data){
                           // alert(data);
                            if(data==1){
                                alert("OK!");
                                }
                            else {
                            	alert("Fail!");
                                }

                    });
                });    */     
        /*     //5.$.post()方法发送post请求
            $("#btn4").click(function(){
                var uid=$("#txtUid").val();
                var upwd=$("#txtUPwd").val();
                $.post("loginProcess.php",
                        {
                           "uid":uid,
                           "upwd":upwd
                        },
                        function(data){
                          // alert(eval("("+data+")"));
                            if(data==1){
                                alert("OK!");
                                }
                            else {
                            	alert("Fail!");
                                } 

                    });
                });   */  
//6.$.ajax()
        /* $("#btn5").click(function(){
         // alert("000");
           var uid=$("#txtUid").val();
           var upwd=$("#txtUPwd").val();
             $.ajax(
                     {
                     url:"loginProcess.php",
                     type:"post",
                     data:{
                    	 "uid":uid,
                         "upwd":upwd
                         },
                     dataType:"json",
                     success:function(data){
                   // alert(data);
                           if(data.msg=="1"){
                               alert("OK");
                               }
                           else{
                        	   alert("Fail");
                               }
                         },
                    error:function(){
                        alert("请求失败！");
                      }
                      }
                     );
            
            }); */
                    
            });

      </script>
   </head>
   <script>
       
   </script>
   <body>
      <input type="text" id="txt1" value="xxxx"/>
      <div id="div1" style="width:400px;height:400px;background-color:blue;">
         这是index.php文件中的div1
      </div>
      <input type="button" value="getJSON()方法获取JSON文件" id="btn1"/>
      <div id="div2" style="border:solid 1px black; width:400px; height:200px;">
      
      </div>
       <input type="button" value="get()方法获取XML" id="btn2"/>
      <hr/>
      <form action="">
   账号:<input type="text" id="txtUid"/><br/>
    密码:<input type="password" id="txtUPwd"/><br/>
     <input type="button" id="btn3" value="get方式登录"/>
    <input type="button" id="btn4" value="post方法登录"/>
      <input type="button" id="btn5" value="$.ajax()方法登录"/>
   </form>
   </body>
</html>