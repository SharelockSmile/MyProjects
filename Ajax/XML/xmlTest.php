<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/18
 * Time: 17:07
 */?>
<html>
<head>
    <script type="text/javascript">
        xmlDoc=null;
        if(window.ActiveXObject)
        {
            xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
            //xmlDoc.async="false";
            xmlDoc.load("User.xml");
        }
        else if (window.XMLHttpRequest){
            xmlDoc=new XMLHttpRequest();
            //xmlDoc.async="false";
            xmlDoc.load("User.xml");
        }
        //alert(xmlDoc);
       var user=xmlDOM.getElementsByTagName("user");
        alert(users.length);
    </script>
</head>
<body></body>
</html>
