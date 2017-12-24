<?php
?>

<html>

   <head>
      <script type="text/javascript">
       /*   person=new Object();
         person.id=10000;
         person.name="张三";
         alert(person.id+"--"+person.name); */
      /*    p1={"id":10000,"name":"张三"};
         alert(p1.id+"--"+p1.name); */
       /*   manyPersons=[
						{"id":10000,"name":"张三"},
						{"id":10001,"name":"李四"},
						{"id":10002,"name":"王五"}
                      ];
         alert(manyPersons[2].name); */
       /*   manyClassInfo=
             {
                 "firstClass":[
        						{"id":"1-10000","name":"张三"},
        						{"id":"1-10001","name":"李四"},
        						{"id":"1-10002","name":"王五"}
                              ],
                  "secondClass":
	                    	 [
		  						{"id":"2-10000","name":"张三"},
		  						{"id":"2-10001","name":"李四"},
		  						{"id":"2-10002","name":["王五","王六"]}
	                        ]
               };
        // alert(manyClassInfo.secondClass[0].id);
         alert(manyClassInfo.secondClass[2].name[1]); */
      //   alert(eval("3+4"));
         jsonStr="{\"id\":10000}";
        // 将JSON字符串转化为JSON对象
       /*  //1.方法1：eval("(json字符串)")
        jsonObj=eval("("+jsonStr+")");
        alert(jsonObj.id); */
        //2.JSON.parse()
        //对于IE浏览器不太兼容
     // jsonObj1= JSON.parse(jsonStr);
       // alert(jsonObj1);
      </script>
   </head>
   <body>
   </body>
</html>