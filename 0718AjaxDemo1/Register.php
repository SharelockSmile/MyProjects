<?php
    
?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
   <head>
     <script type="text/javascript">
     //֧��AJAX�ĺ��Ķ���XMLHttpRequest
      //  ��һ���������������������Ӧ��AJAX�ĺ��Ķ���
       xmlhttp=null;//����һ���洢AJAX���Ķ����һ��ȫ�ֱ���
           function CreateXMLHttp(){
                 if(window.ActiveXObject){
                     //IEϵ�������
                	 xmlhttp=new  ActiveXObject("Microsoft.XMLHTTP");
                	// alert("IE");
                     }
                 else if(window.XMLHttpRequest){
                 //��IE�����
                	 xmlhttp=new XMLHttpRequest();
                	// alert("NOT��IE");
                     }
               }
           function SendRequest(){
               //��ȡ�û���
               var uname=document.fm1.txtUname.value;
               if(uname==""){
                   alert("���������û�����");
                   return;
                   }
            //��һ������������
               CreateXMLHttp();
               if(!xmlhttp){
                 alert("�������֧��AJAX");
                 return;
                   }  
                //�ڶ�����������
                //open��method,url,async��
                //����һmethod����ʾ������ʽget/post
                //������url�������ַ
                //������async����ʾ�����Ƿ�Ϊ�첽�ύ,Ĭ��Ϊfalse��
                //��ʾͬ��������Ϊtrue��ʾΪ�첽�ύ
               xmlhttp.open("get","ProcessUName.php?uname="+uname,true);
               //���������������״̬�ı�Ĺ�������Ҫִ�еĴ���
               //ajax�ڷ��������Ϊ0��1��2��3��4��5��״̬��
               //ֻ����������ϵ�ʱ��Ҳ����״̬����4��ʱ��ͻ���
               //�ſ��Ի�ȡ���Ĵ�����
              xmlhttp.onreadystatechange=function(){
                  //alert(xmlhttp.readyState);
                  //xmlhttp.status��ȡ�������״̬��
                  //xmlhttp.readyState��ȡ�����״̬
                  if(xmlhttp.status==200&&xmlhttp.readyState==4){
                      //���շ��������صĽ��
                      var res=xmlhttp.responseText;
                      //alert(res);
                      if(res=="1"){
                          
document.getElementById("spMsg").innerHTML="<font color='red'>�û�����ռ�ã�</font>";
                          }
                      else if(res=="0"){
  document.getElementById("spMsg").innerHTML="<font color='green'>�û������ã�</font>";
                          }
                      }
                 }
               //���Ĳ�����������
               xmlhttp.send(null);
               }
//            CreateXMLHttp();
     </script>
   </head>
  <body>
       <form name="fm1">
           �û���:<input type="text" name="txtUname" onblur="SendRequest()"/>
           <span id="spMsg"></span><br/>
     ���룺<input type="password" name="txtUpwd"/><br/>
  ���䣺<input type="text" name="txtUage"/><br/>
  <input type="submit"  value="ע��" name="btnReg"/>
       </form>
  </body>
</html>