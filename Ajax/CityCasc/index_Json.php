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
        function sendProvince() {
            createXML();
            var url="DBProcess.php?n=1";
            xmlhttp.open("get",url,true);
            xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange=function () {
                if (xmlhttp.status==200&&xmlhttp.readyState==4)
                {
                    var res=eval("("+xmlhttp.responseText+")");
                   /* alert(res[0].pid);
                    alert(res[0].pname);*/
                    var selP=document.myForm.selProvince;
                    for (var i=0;i<res.length;i++)
                    {
                        var op=document.createElement("option");
                        op.value=res[i].pid;
                        op.innerText=res[i].pname;
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
            var curl="DBProcess.php?pid="+pid+"&n=2";
            xmlhttp.open("get",curl,true);
            xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange=function () {
                if (xmlhttp.status==200&&xmlhttp.readyState==4)
                {
                    var res=xmlhttp.responseText;
                    var city=JSON.parse(res);
                    //var city=eval("("+xmlhttp.responseText+")");
                    var selCity=document.myForm.selCity;
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
                    for (var i=0;i<city.length;i++)
                    {
                        selCity.options[i+1]=new Option(city[i].cname,city[i].cid);
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
             alert("请选择省份");
             return;
             }
            var courl="DBProcess.php?cid="+cid+"&n=3";
            xmlhttp.open("get",courl,true);
           xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange=processCounty;
            xmlhttp.send(null);
        }
        function processCounty() {
            if (xmlhttp.status==200&&xmlhttp.readyState==4)
            {
                var county=eval("("+xmlhttp.responseText+")");
                var selCounty=document.myForm.selCounty;
                //清空市/县列表
                 selCounty.innerHTML="";
                 //给下拉框添加第一项
                 var CountyFirst=document.createElement("option");
                 CountyFirst.value=0;
                 CountyFirst.innerText="---请选择区/县---";
                 selCounty.appendChild(CountyFirst);
                for (var i=0;i<county.length;i++)
                {
                    selCounty.options[i+1]=new Option(county[i].county,county[i].coid);
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
 * Date: 2017/7/20
 * Time: 10:58
 */?>