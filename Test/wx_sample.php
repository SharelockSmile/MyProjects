<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();
$wechatObj->responseMsg();
//测试token是否能取到
echo $wechatObj->getAccessToken();
//$wechatObj->cteateMenu();
class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				if(!empty( $keyword ))
                {
              		$msgType = "text";
                	$contentStr = "Welcome to wechat world!";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

    //获取TOKEN
    public function getAccessToken()
    {
        $appID="wxc8a6e1401b1cfed5";
        $secret="60b2928f92073a1f9099f61ff2d2a56b";
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appID}&secret={$secret}";
        //使用CURL去请求
        //初始化curl
        $curl=curl_init();
        //设置参数（设置请求地址）
        curl_setopt($curl,CURLOPT_URL,$url);
        //禁止自动显示请求结果
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        //跳过SSL安全证书验证
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        //执行并返回结果
        $res=curl_exec($curl);
        //异常处理，判断错误号
        if (curl_errno($curl))
        {
            //打印失败信息
            var_dump(curl_error($curl));
        }
        //关闭句柄
        curl_close($curl);
        //打印结果
        /*    //var_dump($res);
            var_dump($res["access_token"]);*/
        //将JSON对象转换为json字符串（true表示是否以关联数组返回）
        $arr=json_decode($res,true);
        //var_dump($arr["access_token"]);
        //返回token
        return $arr["access_token"];

    }

}

?>