<title>��ʾ��PHPʵ�ַ��������</title>
 <script type="text/javascript" src="jquery-3.1.0.js"></script>
 <style type="text/css">
 *{margin:0;padding:0;list-style-type:none;}
a,img{border:0;}
body{font:12px/180% Arial, Helvetica, sans-serif, "������";}
 .demo{width:300px; margin:60px auto 10px auto}
 @media only screen and (min-width: 420px) {
    .demo{width:500px; margin:60px auto 10px auto}
 }
 .demo p{height:62px; line-height:30px}
 .demo p label{width:100px; text-align:right}
 .input{width:140px; height:24px; line-height:14px; border:1px solid #d3d3d3}
button, .button {
  background-color: #f30;color: white;border: none;box-shadow: none;
  font-size: 17px;font-weight: 500;font-weight: 600;
  border-radius: 3px;padding: 15px 35px;margin: 26px 5px 0 0px;cursor: pointer; }
button:hover, .button:hover {background-color: #f00; }
#result{width:360px; margin:10px auto}
 #result p{line-height:30px}
 #result p span{margin:4px; color:#f30}
 </style>
 </head>
 <body>
 <div class="demo">
    <button>����10��������ܽ��20Ԫ</button>
 </div>
 <div id="result"></div>
 <script type="text/javascript">
$(function(){
    $("button").click(function(){
        $.ajax({
            type: 'POST',
            url: 'redBag.php',
            dataType: 'json',
            beforeSend: function(){
                $("#result").html('���ڷ�����');
            },
            success: function(json){
                if(json.msg==1){
                    var str = '';
                    var res = json.res;
                    $.each(res,function(index,array){ 
                        str += '<p>��<span>'+array['i']+'</span>����������<span>'+array['money']+'</span>Ԫ�����<span>'+array['total']+'Ԫ</span></p>';
                    });
                    $("#result").html(str);
                }else{
                    $("#result").html('���ݳ���');
                }
            }
        });
    });
 });
 </script>
 
  </body>
 </html>