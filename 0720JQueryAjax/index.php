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
                //����һ��json�ļ�·��
                //���������ص�����������data�����洢���سɹ�
                //֮�󷵻ص�json���ݣ���������ԭ��ajaxʹ��eval("("+responseText+")"��
              $str="�û���Ϣ���£�<br/>";//�洢���ص������ݵ��ַ�����ʽ
             $.getJSON("js/user.json",function(data){
                 $.each(data,function(){
                	 $str+="���:"+this.uid+
                	 ",����:"+this.uname+"<hr/>";
                     });
                //��������ʾ��div2��
                 $("#div2").html($str);
                 });
                }); 
/* //3.$.get()��ȡxml�ļ�����
            $("#btn2").click(function(){
               // responseXML
               var str="�û���Ϣ����:<br/>";
                   $.get("Users.xml",function(data){
                      // alert(data);
                     var users=$(data).find("user");
                     $.each(users,function(){ 
                         str+="���:"+$(this).find("uid").text()
                         +",����:"+$(this).find("uname").text()+"<br/>";
                         });
                    // alert(str);
                     $("#div2").html(str);
                   });
                }); */

  /*   //4.$.get()��������get����
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
        /*     //5.$.post()��������post����
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
                        alert("����ʧ�ܣ�");
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
         ����index.php�ļ��е�div1
      </div>
      <input type="button" value="getJSON()������ȡJSON�ļ�" id="btn1"/>
      <div id="div2" style="border:solid 1px black; width:400px; height:200px;">
      
      </div>
       <input type="button" value="get()������ȡXML" id="btn2"/>
      <hr/>
      <form action="">
   �˺�:<input type="text" id="txtUid"/><br/>
    ����:<input type="password" id="txtUPwd"/><br/>
     <input type="button" id="btn3" value="get��ʽ��¼"/>
    <input type="button" id="btn4" value="post������¼"/>
      <input type="button" id="btn5" value="$.ajax()������¼"/>
   </form>
   </body>
</html>