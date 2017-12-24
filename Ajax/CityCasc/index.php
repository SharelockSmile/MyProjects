<html>
<head>
    <script type="text/javascript">
        xmlthhp=null;
        function createXML() {
            if (window.ActiveXObject)
            {
                try {
                    xmlhttp=new ActiveXObject(Microsoft.XMLHTTP);
                }catch (e)
                {
                    xmlhttp=new  ActiveXObject(msxml2.XMLHTTP);
                }
            }else if (window.XMLHttpRequest)
            {
                xmlhttp=new XMLHttpRequest();
            }
        }
        //createXML();
        function sendProvince() {
            createXML();
            var url="Process.php?n=1";
            xmlhttp.open("get",url,true);
            xmlhttp.onreadystatechange=function () {
                if (xmlhttp.status==200&&xmlhttp.readyState==4)
                {
                    //var res=xmlhttp.responseText;
                    var res=xmlhttp.responseXML;
                   //alert(res);
                    var selP=document.myForm.selProvince;
                    var ps=res.getElementsByTagName("p");
                    for (var i=0;i<ps.length;i++)
                    {
                        var op=document.createElement("option");
                        op.value=ps[i].getElementsByTagName("pid")[0].firstChild.nodeValue;
                        op.innerText=ps[i].getElementsByTagName("pname")[0].firstChild.nodeValue;
                        selP.appendChild(op);
                    }
                }
            }
            xmlhttp.send(null);
        }
        function sendCity() {
            createXML();
            var pid=document.myForm.selProvince.value;
            if (pid==0)
            {
                alert("请选择省份");
                return;
            }
            var curl="Process.php?pid="+pid+"&n=2";
            xmlhttp.open("get",curl,true);
            xmlhttp.onreadystatechange=function () {
                if (xmlhttp.status==200&&xmlhttp.readyState==4)
                {
                    var res=xmlhttp.responseXML;
                    var selCity=document.myForm.selCity;
                    var cs=res.getElementsByTagName("c");
                    //清空城市列表
                    selCity.innerHTML="";
                    var selCounty=document.myForm.selCounty;
                    selCounty.innerHTML="";
                    //分别给下拉框添加第一项
                    selCity.options[0]=new Option("---请选择所属城市---",0);
                    var CountyFirst=document.createElement("option");
                    CountyFirst.value=0;
                    CountyFirst.innerText="---请选择区/县---";
                    selCounty.appendChild(CountyFirst);
                    for (var i=0;i<cs.length;i++)
                    {
                        var key=cs[i].getElementsByTagName("cname")[0].firstChild.nodeValue;
                        var val=cs[i].getElementsByTagName("cid")[0].firstChild.nodeValue;
                        selCity.options[i+1]=new Option(key,val);
                    }
                }
            }
            xmlhttp.send(null);
        }
      function sendCounty() {
            createXML();
            var cid =document.myForm.selCity.value;
            if (cid==0)
            {
                alert("请选择县区");
                return;
            }
            var courl="Process.php?cid="+cid+"&n=3";
            xmlhttp.open("get",courl,true);
            xmlhttp.onreadystatechange=processCounty;
            xmlhttp.send(null);
        }
       function processCounty() {
            if (xmlhttp.status==200&&xmlhttp.readyState==4)
            {
                var res=xmlhttp.responseXML;
                var selCounty=document.myForm.selCounty;
                var county=res.getElementsByTagName("co");
                //清空市/县列表
                selCounty.innerHTML="";
                //给下拉框添加第一项
                var CountyFirst=document.createElement("option");
                CountyFirst.value=0;
                CountyFirst.innerText="---请选择区/县---";
                selCounty.appendChild(CountyFirst);
                for (var i=0;i<county.length;i++)
                {
                    var key=county[i].getElementsByTagName("county")[0].firstChild.nodeValue;
                    var val=county[i].getElementsByTagName("coid")[0].firstChild.nodeValue;
                    selCounty.options[i+1]=new Option(key,val);
                }
            }
        }
    </script>
</head>
<body onload="sendProvince()">
    <form name="myForm">
        所在省：<select name="selProvince" onchange="sendCity()">
            <option value="0">---请选择省份---</option>
        </select>
        所属市：<select name="selCity" onchange="sendCounty()">
            <option value="0">---请选择所属城市---</option>
        </select>
        区/县：<select name="selCounty">
            <option value="0">---请选择区/县---</option>
        </select>
    </form>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/19
 * Time: 15:45
 */
?>

