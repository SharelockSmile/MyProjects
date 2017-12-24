<?php
?>
<html>
<head>
    <script type="text/javascript">
        function changetime(){
            //var ary=Array("Mon.","Tues.","Wed.","Thur.","Fri.","Sat.","Sun.");
            var ary=Array("Monday","Tuesday","Wednesday","Thursday","Firday","Saturday","Sunday")
            var timeHtml=document.getElementById("CurrentTime");
            var date=new Date();
            timeHtml.innerHTML=date.toLocaleString()+"   "+ary[date.getDay()];
            }
        window.onload=function()
        {
        	changetime();
            setInterval(changetime,1000);}
    </script>
</head>
<body>
    <table>
       <tr>
           <td>当前时间</td>
           <td id="CurrentTime"></td>
       </tr>
    </table>
</body>
</html>