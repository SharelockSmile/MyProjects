<?php if (!defined('THINK_PATH')) exit();?>  <div class="ia fl">
    <div class="iaz fl">
      <div class="ia1 fl">
        <div class="ia1sw"></div>
        <div class="ia1sw1">
          <!-- slider -->
          <div class="sliderwrapper" id="slider">
            <div class="contentdiv" style="display: block; opacity: 1; visibility: visible;"><a href="http://www.17joys.com"><img id="adpic" alt="Sample1" src="../Public/swfimg/image1.jpg"/></a></div>
            <div class="contentdiv" style="display: none; opacity: 1; visibility: visible;"><a href="http://www.17joys.com"><img alt="Sample2" src="../Public/swfimg/image2.jpg"/></a></div>
            <div class="contentdiv" style="display: none; opacity: 1; visibility: visible;"><a href="http://www.17joys.com"><img alt="Sample3" src="../Public/swfimg/image3.jpg"/></a></div>
            <div class="contentdiv" style="display: none; opacity: 1; visibility: visible;"><a href="http://www.17joys.com"><img alt="Sample4" src="../Public/swfimg/image4.jpg"/></a></div>
            <div class="contentdiv" style="display: none; opacity: 1; visibility: visible;"><a href="http://www.17joys.com"><img alt="Sample5" src="../Public/swfimg/image5.jpg"/></a></div>
          </div>
          <!-- -->
          <div class="pagination" id="paginate-slider"><a class="toc selected" href="http://www.17joys.com" rel="1">1</a> <a class="toc anotherclass" href="http://www.17joys.com" rel="2">2</a> <a class="toc" href="http://www.17joys.com" rel="3">3</a> <a class="toc" href="http://www.17joys.com" rel="4">4</a> <a class="toc" href="http://www.17joys.com" rel="5">5</a> </div>
          <!-- -->
          <script type="text/javascript">
featuredcontentslider.init({
id: "slider",
contentsource: ["inline", ""],
revealtype: "mouseover",
enablefade: [true, 0.2],
autorotate: [true, 3000],
onChange: function(previndex, curindex){}})

</script>
          <!-- slider -->
        </div>
      </div>
      <div class="ia2 fl">
        <h2>热门TAG&raquo;</h2>
        <div class="ia21 fl"> <a href="#" class="hong">php教程</a> <a href="#" class="hei">php下载</a> <a href="#" class="dhei">php的文件上传</a> <a href="#" class="xhei">php视频教程</a> <a href="#" class="hong">PHP服务器</a> <a href="#" class="lv">搭建LAMP服务器</a> <a href="#" class="dhei">PHP数据库抽象层</a> <a href="#" class="lv">PHP应用全集</a> <a href="#" class="hong">PHP的开发工具</a> <a href="#" class="xhei">AJAX</a> <a href="#" class="hong">17joys</a> </div>
      </div>
    </div>
    <div class="iay fr">
    <?php if(is_array($atop)): $k = 0; $__LIST__ = $atop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): ++$k;$mod = ($k % 2 )?><?php if(($k)  ==  "1"): ?><div class="iay1 fl">
        <h1><a href="<?php echo U('Article/'.$article['id']);?>"><?php echo ($article['title']); ?></a></h1>
        <p><?php echo ($article['title_alias']); ?></p>
      </div>
      <div class="iay2 fl glk">
        <ul>
    <?php else: ?>
          <li><a href="<?php echo U('Article/'.$article['id']);?>"><?php echo ($article['title']); ?></a></li><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    
    <div class="iaq1 fl mt5">
      <div class="iaq11 fl">
        <p><?php echo ($ctitle[0]); ?></p>
      </div>
      <div class="iaq12 fl glk">
        <ul>
        <?php if(is_array($a0)): $i = 0; $__LIST__ = $a0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo U('Article/'.$article['id']);?>"><?php echo ($article['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <div class="iaq1 fl mt5">
      <div class="iaq11 fl">
        <p><?php echo ($ctitle[1]); ?></p>
      </div>
      <div class="iaq12 fl glk">
        <ul>
        <?php if(is_array($a1)): $i = 0; $__LIST__ = $a1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo U('Article/'.$article['id']);?>"><?php echo ($article['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
   
    <div class="iaq1 fl mt5">
      <div class="iaq11 fl">
        <p><?php echo ($ctitle[2]); ?></p>
      </div>
      <div class="iaq12 fl glk">
        <ul>
        <?php if(is_array($a2)): $i = 0; $__LIST__ = $a2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo U('Article/'.$article['id']);?>"><?php echo ($article['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <div class="iaq1 fl mt5">
      <div class="iaq11 fl">
        <p><?php echo ($ctitle[3]); ?></p>
      </div>
      <div class="iaq12 fl glk">
        <ul>
        <?php if(is_array($a3)): $i = 0; $__LIST__ = $a3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo U('Article/'.$article['id']);?>"><?php echo ($article['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    
    <div class="iaq1 fl mt5">
      <div class="iaq11 fl">
        <p><?php echo ($ctitle[4]); ?></p>
      </div>
      <div class="iaq12 fl glk">
        <ul>
        <?php if(is_array($a4)): $i = 0; $__LIST__ = $a4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo U('Article/'.$article['id']);?>"><?php echo ($article['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
  </div>