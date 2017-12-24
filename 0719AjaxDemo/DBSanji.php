<?php
?>
<html>
   <head>
       <script type="text/javascript">
     xmlHttp=null;
       function CreateXML(){
           if(window.ActiveXObject){
                    try{
//                         alert("1");
                    	xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                    catch(e){
                       /*  alert("2");
                        alert(e.message); */
                    	xmlHttp=new ActiveXObject("msxml2.XMLHTTP");
                        }
               }
           else if(window.XMLHttpRequest){
        	   xmlHttp=new XMLHttpRequest();
               }
           }
//请求省份的数据
         function SendProvince(){
             CreateXML();
             var getpurl="DBProcess.php?n=1";
             xmlHttp.open("get",getpurl,true);
            xmlHttp.onreadystatechange=processProvince;
             xmlHttp.send(null);
          }
         function processProvince(){
           if(xmlHttp.status==200&&xmlHttp.readyState==4){
                var res=xmlHttp.responseXML;
               // alert(res);
                //获取省份的下拉框
                var selP=fm1.selProvince;
                //获取xml中的p节点
                var ps=res.getElementsByTagName("p");
               // alert(ps.length);
                for(var i=0;i<ps.length;i++){
         var op=document.createElement("option");
       op.value=ps[i].getElementsByTagName("id")[0].firstChild.nodeValue;
       op.innerText=ps[i].getElementsByTagName("name")[0].firstChild.nodeValue;;
          selP.appendChild(op);
                    }
               }
             }
        
        //请求市的数据
         function SendCity(){
             CreateXML();
             var pid=fm1.selProvince.value;
             //alert(pid);
             if(pid=="0"){
                 alert("请重新选择省份！");
                 return;
                 }
             var getcurl="DBProcess.php?pid="+pid+"&n=2";
             xmlHttp.open("get",getcurl,true);
            xmlHttp.onreadystatechange=processCity;
             xmlHttp.send(null);
          }
         function processCity(){
             if(xmlHttp.status==200&&xmlHttp.readyState==4){
                  var res=xmlHttp.responseXML;
            alert(res);
                  var selCity=fm1.selCity;
                  var cs=res.getElementsByTagName("c");
                   //清空城市和县区的下拉框
                   selCity.innerHTML="";
                   var selCounty=fm1.selCounty;
                   selCounty.innerHTML="";
                   //分别给城市和县区下拉框重新添加第一项
                     var opFirst=document.createElement("option");
                     opFirst.value="0";
                     opFirst.innerText="--请选择城市--";
                     selCity.appendChild(opFirst);
                     var opFirst1=document.createElement("option");
                     opFirst1.value="0";
                     opFirst1.innerText="--请选择县/区--";
                     selCounty.appendChild(opFirst1);
                     for(var i=0;i<cs.length;i++){
                	 /*  var op=document.createElement("option");
                      op.value=cs[i].getElementsByTagName("cid")[0].firstChild.nodeValue;
                      op.innerText=cs[i].getElementsByTagName("cname")[0].firstChild.nodeValue;
                      selCity.appendChild(op); */
                      selCity.options[i+1] =new Option(cs[i].getElementsByTagName("cname")[0].firstChild.nodeValue,
                              cs[i].getElementsByTagName("cid")[0].firstChild.nodeValue); 
                        
                      }
                 }
               }
     </script>
   </head>
  <body onload="SendProvince()">
     <form action="" name="fm1">
            请选择省：<select name="selProvince" onchange="SendCity()">
          <option value="0">--请选择省份--</option>
          </select>
              请选择市：<select name="selCity">
          <option value="0">--请选择市--</option>
          </select>
                请选择县/区：<select name="selCounty">
          <option value="0">--请选择县/区--</option>
          </select>
     </form>
  </body>
</html>