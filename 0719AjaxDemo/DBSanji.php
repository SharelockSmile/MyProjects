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
//����ʡ�ݵ�����
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
                //��ȡʡ�ݵ�������
                var selP=fm1.selProvince;
                //��ȡxml�е�p�ڵ�
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
        
        //�����е�����
         function SendCity(){
             CreateXML();
             var pid=fm1.selProvince.value;
             //alert(pid);
             if(pid=="0"){
                 alert("������ѡ��ʡ�ݣ�");
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
                   //��ճ��к�������������
                   selCity.innerHTML="";
                   var selCounty=fm1.selCounty;
                   selCounty.innerHTML="";
                   //�ֱ�����к�����������������ӵ�һ��
                     var opFirst=document.createElement("option");
                     opFirst.value="0";
                     opFirst.innerText="--��ѡ�����--";
                     selCity.appendChild(opFirst);
                     var opFirst1=document.createElement("option");
                     opFirst1.value="0";
                     opFirst1.innerText="--��ѡ����/��--";
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
            ��ѡ��ʡ��<select name="selProvince" onchange="SendCity()">
          <option value="0">--��ѡ��ʡ��--</option>
          </select>
              ��ѡ���У�<select name="selCity">
          <option value="0">--��ѡ����--</option>
          </select>
                ��ѡ����/����<select name="selCounty">
          <option value="0">--��ѡ����/��--</option>
          </select>
     </form>
  </body>
</html>