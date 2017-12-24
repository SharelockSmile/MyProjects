<html>
<head>
    <style type="text/css">
        #div_1
        {
            width: 400px;
            height: 300px;
            background-color: #6A8FA1;
        }
        #div_2
        {
            width: 400px;
            height: 300px;
        }
    </style>
    <script type="text/javascript" src="../JS/jquery-3.1.0.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#btn1").click(function(){
                $("#div_1").load("121.php");
                $("#div_2").load("121.php .dc1")
            });
            $("#btn2").click(function(){
                $str="";
                $.getJSON("User.json",function(data){
                    $.each(data,function(){
                        $str+="姓名:"+this.uname+",年龄:"+this.age+"<hr/>";
                    })
                    $("#div_2").html($str);
                })
            });
            $("#btn3").click(function(){
                $.get("User.xml",function(value){
                    //alert(value);
                    var str="";
                    var users=$(value).find("user");
                    $.each(users,function(){
                        str+="Name:"+$(this).find("uname").text()
                            +"             Age:"+$(this).find("age").text()+"<hr/>";
                    });
                    $("#div_2").html(str);
                })
            });
        })
    </script>
</head>
<body>
    <input type="button" id="btn1" value="load事件">
    <div id="div_1">我们在路上前行</div>
    <div id="div_2"></div>
    <input type="button" id="btn2" value="全局函数getJSON()">
    <input type="button" id="btn3" value="get()函数">
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/20
 * Time: 14:50
 */
?>

