<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "lin");
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();
$wechatObj->responseMsg();

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
              	//获取开发者ID（发送方）
                $fromUsername = $postObj->FromUserName;
                //发给谁（微信平台的ID）
                $toUsername = $postObj->ToUserName;
                //发送消息关键字（开发者发给平台的内容）
                $keyword = trim($postObj->Content);
                //发送的时间
                $time = time();
                //获取开发者给平台发送消息的格式
                $noteType=$postObj->MsgType;
                //统一转换(如果是文本，类型为text，若是图片，则类型为image)
                $newNoteType=strtolower($noteType);
                //回复文本消息模板
                $textTpl = "<xml>
									<ToUserName><![CDATA[%s]]></ToUserName>
									<FromUserName><![CDATA[%s]]></FromUserName>
									<CreateTime>%s</CreateTime>
									<MsgType><![CDATA[%s]]></MsgType>
									<Content><![CDATA[%s]]></Content>
									<FuncFlag>0</FuncFlag>
									</xml>";  
								//恢复图文消息的模板
								$twTpl="<xml>
									<ToUserName><![CDATA[%s]]></ToUserName>
									<FromUserName><![CDATA[%s]]></FromUserName>
									<CreateTime>%s</CreateTime>
									<MsgType><![CDATA[%s]]></MsgType>
									<ArticleCount>1</ArticleCount>
									<Articles>
									<item>
									<Title><![CDATA[%s]]></Title> 
									<Description><![CDATA[%s]]></Description>
									<PicUrl><![CDATA[%s]]></PicUrl>
									<Url><![CDATA[%s]]></Url>
									</item>
									</Articles>
									</xml>";
				$hfmsgType="text";  //回复类型
				$url="http://www.tuling123.com/openapi/api?key=6c9c737ee58445e593e67361c9767557&info=欢迎一起进入花无涯的世界";
				//定义url链接操作
				//模拟发送http中的个头请求
				$str=file_get_contents($url);
				//格式化json字符串为对象或数组
				$json=json_decode($str);
				$contentStr=$json->text;//回复内容
				//格式化字符串
				$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $hfmsgType, $contentStr);
      echo $resultStr;
				//判断是否为关注或取消关注
				if($newNoteType=="event")
				{
					//判断是否为首次关注
					if($postObj->Event=="subscribe")
					{
						$backMsgType="text";
						$contentStr="欢迎和我一起走进花无涯的世界";
						$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $backMsgType, $contentStr);
						echo $resultStr;
					}
				}
				if($newNoteType=="text")
				{
					if(!empty( $keyword ))
					{
						if($keyword=="tw")
						{
							$count=1;
							$title="看世界";
							$desp="渗透测试人Python大集合";
							$picurl="http://119.29.143.119/timg.jpg";
							$url="http://mp.weixin.qq.com/s/BIKGy_R8BkKFbXhNECPI3Q"
						}
					}
					$resultStr = sprintf($twTpl, $fromUsername, $toUsername, $time, $backMsgType, $count,$title,$desp,$picurl,$url);
				}
			/*	//判断开发者以什么格式发给平台，若是文本格式，则平台将以文本格式返回 
				if($newNoteType=="text")
				{
					if(!empty( $keyword ))
                {
                	//发送消息类型
              		$msgType = "text";
              		//设置平台回复消息类型
              		$backMsgType="text";
              		//回复的内容
                	//$contentStr = "Welcome to wechat world!";
                	switch($keyword)
                	{
                		case "视频":
	                		$contentStr="链接：http://pan.baidu.com/s/1nuLIve5 密码：57q7";
	                		break;
	                	case "音乐":
		                	$contentStr="暂时还没有哦，耐心等待";
		                	break;
	                	default :
	                		$contentStr="更多功能，敬请期待";
		                	break;
                	}
                	//设定平台回复类型
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $backMsgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }
				}*/
				//接收图片消息
				if($newNoteType=="image")
				{
					$backMsgType="text";
					$contentStr = "你发的是图片";
					//设定平台回复类型
        	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $backMsgType, $contentStr);
        	echo $resultStr;
				}
				if(!empty( $keyword ))
                /*{
                	//发送消息类型
              		$msgType = "text";
              		//回复的内容
                	$contentStr = "Welcome to wechat world!";
                	//设定平台回复类型
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }*/
               
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
}

?>