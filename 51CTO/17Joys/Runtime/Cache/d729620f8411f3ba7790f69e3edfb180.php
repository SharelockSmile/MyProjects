<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo (C("sitename")); ?></title>
<meta name="keywords" content="<?php echo (C("metakeys")); ?>" />
<meta name="description" content="<?php echo (C("metadesc")); ?>" />
<meta name="generator" content="17Joys! 1.0 - Open Source Content Management" />
<link href="../Public/css/main.css" rel="stylesheet" type="text/css" />
<link href="../Public/css/style.css" rel="stylesheet" type="text/css" />
<link href="../Public/css/lava_lamp_demo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../Public/js/huan.js"></script>
<script src="../Public/js/jquery-1.2.6.pack.js" type="text/javascript"></script>
<script src="../Public/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="../Public/js/jquery.lavalamp.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../Public/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
 <link rel="stylesheet" type="text/css" href="../Public/js/fancybox/jquery.fancybox-1.3.4.css" media="screen">
<script type="text/javascript">
$(function(){
$("#menu-top").lavaLamp({
fx: "backout", //缓动类型
speed: 433 
});
$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
});
</script>
</head>
<body>
    
<div class="zhengti">
  <!-- top -->
  <div class="top fl">
    <div class="toplogo fl">
      <h1><a href=" " target="_blank"> </a></h1>
    </div>
    <div class="top1 fl">
      <div class="top1_1 fl">
        <input name="keyword" type="text" id="keyword" class="kw1" value=""/>
        <select name="searchtype" id="searchtype" class="kw3" style='width:120px'>
          <option value="titlekeyword">内容搜索</option>
          <option value="title">主题搜索</option>
        </select>
        <input name="imageField" type="submit" class="kw2" value="" />
      </div>
    </div>
      <div style="">登录</div>
  </div>
  <!-- top -->
  <div></div>
  <!-- nav -->
  <div class="nav fl">
    
    <div class="nav fl">
		
        <?php if(is_array($top)): $i = 0; $__LIST__ = $top;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): ++$i;$mod = ($i % 2 )?><?php echo W($row['module'],$row);?><?php endforeach; endif; else: echo "" ;endif; ?>
		 
    </div>
    
    
  </div>
  <!-- nav -->
  <div></div>
  <!-- tops<div class="tops fl">
    
 
  </div> -->
  
  <!-- tops -->
  <div></div>
   <!-- ad -->
 
  <!-- ad -->
  <div></div>
  <!-- ia -->
  <!-- layout::$content::0 -->
  <!-- ia -->
  <div></div>
  <!-- iy -->
  <div class="iy fr">
  
    <?php if(is_array($right)): $i = 0; $__LIST__ = $right;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): ++$i;$mod = ($i % 2 )?><?php echo W($row['module'],$row);?>
                
		<div style="height:10px;">&nbsp;</div><?php endforeach; endif; else: echo "" ;endif; ?>
	
  </div>
  <!-- iy -->
  <div></div>
  <!-- dibu -->
  <div class="adb fl mt5">
    <div class="adb1 fl"></div>
    <div class="adb2 fl">
      <div class="adb21 fl">
        <p>友情链接 Links</p>
      </div>
      <div class="adb22 fl glk">
        <p><a href="http://t.qq.com/lingmouyunjiong">我的微博</a></p>
        <p><a href="我们的技术群">7391390</a></p>
        
      </div>
    </div>
    <div class="adb3 fl"></div>
  </div>
  <!-- dibu -->
  <div></div>
  <!-- foot -->
  <div class="foot fl mt5">
     
      </div>
  <!-- foot -->
</div>
</body>
</html>