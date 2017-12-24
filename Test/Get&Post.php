<?php
//php发送get、post请求的6种方法
//1、用file_get_contents以get方式获取内容
$url='PlanarCode/JY.txt';
$html=file_get_contents($url);
echo $html."<br>";

//2、用fopen打开URL,以get方式获取内容
$fp=fopen($url,'r');
stream_get_meta_data($fp);
$result=" ";
while (!feof($fp))
{
    $result.=fgetc($fp);
}
echo "url body :$result<br/>";
fclose($fp);

//3、用file_get_contents以post方式获取内容
$data = array("foo"=>"bar");
$data = http_build_query($data);

$opts = array ("http" => array (
"method" => "POST",
"header"=> "Content-type: application/x-www-form-urlencodedrn" .
"Content-Length: ". strlen($data) . "rn",
'content'=> $data
)
);

$context = stream_context_create($opts);
$html = file_get_contents('PlanarCode/JY.txt', false, $context);

echo $html."<br/>";

/*//4、用fsockopen函数打开URL，以get方式获取完整数据，包括header和body，需要打开php.ini中的allow_url_fopen
function get_url ($url,$cookie=false)
{
    $url = parse_url($url);
    $query = $url[path].'?'.$url[query];
    echo "Query:".$query;
$fp = fsockopen( $url[host], $url[port]?$url[port]:80 , $errno, $errstr, 30);
$cookien="";$result="";
if (!$fp) {
    return false;
} else {
    $request = "GET $query ALG.html";
    $request .= "Host: $url[host]rn";
    $request .= "Connection: Closern";
    if($cookie) $request.="Cookie:$cookien";
$request.="rn";
fwrite($fp,$request);
while(!@feof($fp)) {
    $result .= @fgets($fp, 1024);
}
fclose($fp);
return $result;
}
}
//获取url的html部分，去掉header
function GetUrlHTML($url,$cookie=false)
{
    $rowdata = get_url($url,$cookie);
    if($rowdata)
    {
        $body= stristr($rowdata,"rnrn");
        $body=substr($body,4,strlen($body));
        return $body;
    }
    return false;
}

//5、用fsockopen函数打开URL，以post方式获取完整数据
function HTTP_Post($URL,$data,$cookie, $referrer="")
{
$request="";$referern="";$cookien="";$result="";
// parsing the given URL
$URL_Info=parse_url($URL);

// Building referrer
if($referrer=="") // if not given use this script as referrer
$referrer=”111″;

// making string from $data
foreach($data as $key=>$value)
    $values[]="$key=".urlencode($value);
$data_string=implode("&",$values);

// Find out which port is needed – if not given use standard (=80)
if(!isset($URL_Info["port"]))
    $URL_Info["port"]=80;

// building POST-request:
$request.="POST".$URL_Info["path"]."HTTP/1.1n";
$request.="Host: ".$URL_Info["host"]."n";
$request.="Referer: $referern";
$request.="Content-type: application/x-www-form-urlencodedn";
$request.="Content-length: ".strlen($data_string)."n";
$request.="Connection: closen";

$request.="Cookie:  $cookien";

$request.="n";
$request.=$data_string."n";

$fp = fsockopen($URL_Info["host"],$URL_Info["port"]);
fputs($fp, $request);
while(!feof($fp)) {
    $result .= fgets($fp, 1024);
}
fclose($fp);

return $result;*/


//6、使用curl库，php.ini中的curl开启
$ch=curl_init();
$timeout=5;
curl_setopt($ch,CURLOPT_URL,"PlanarCode/JY.txt");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
$file_contents=curl_exec($ch);
curl_close($ch);
echo $file_contents;