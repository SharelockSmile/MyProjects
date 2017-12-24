<?php
?>
<html>
   <head>
      <script type="text/javascript">
     //方法一：IE内置XML解析器
//      alert("1111");
 var xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
 alert(xmlDoc);
xmlDoc.async="false";
xmlDoc.load("Users.xml");
//alert(xmlDoc);
 var users= xmlDoc.getElementsByTagName("user");
   alert(users.length);
 alert(users[1].getElementsByTagName("id")[0].childNodes[0].nodeValue);
   //alert(users[1].getElementsByTagName("id")[0].firstChild.nodeValue);
      </script>
   </head>
   <body>
      
   </body>
</html>