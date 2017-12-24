<html>
<head>
    <style type="text/css">
        #div_2
        {
            width:200px;
            height:200px;
            background_color:#6A8FA1;
        }
    </style>
    <script type="text/javascript" src="JS/jquery-3.1.0.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#txt1").trigger("select");
            $("#btn1").click(function(){
                $str="";
                $.getJSON("JS/users1.json",function(value){
                    $.each(value,function(){
                    	$str+="编号:"+this.uid+",姓名:"+this.uname+"<hr/>";
                        })
                        $("#div_2").html($str);
                    })
                });
            })
    </script>
</head>
<body>
    <input type="text" id="txt1" value="aaa">
    <div id="div_2">我们在路上前行</div>
    <input type="button" id="btn1" value="全局函数getJSON()">
</body>
</html>
<?php ?>