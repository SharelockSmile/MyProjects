<?php if (!defined('THINK_PATH')) exit();?><div class="listz fl">
    <div class="avn fl">
      <div class="avn1 fl glk">
        <p>您当前位置&raquo;<a href="__APP__">首页</a>&raquo;<a href="<?php echo U('Section/'.$article['sid'].'-'.$_GET['itemid']);?>"><?php echo ($article['stitle']); ?></a>&raquo;<a href="<?php echo U('Category/'.$article['cid'].'-'.$_GET['itemid']);?>"><?php echo ($article['ctitle']); ?></a>&raquo;<?php echo ($article['atitle']); ?></p>
      </div>
      <div class="avn2 fl">
        <h1><?php echo ($article['atitle']); ?></h1>
      </div>
      <div class="avn3 fl"> <span>来源:17Joys</span> <span>时间:<?php echo ($article['created']); ?></span> <span>编辑:<?php echo ($article['name']); ?></span> <span>人气:<?php echo ($article['hits']); ?>次</span> </div>
      <div class="avn4 fl">
        <?php echo ($article['introtext']); ?>
      </div>
      <div class="avn5 fl">
        <p class="fl">上一篇:<?php if(!empty($prev_art['atitle'])): ?><a href="<?php echo U('Article/'.$prev_art['aid'].'-'.$_GET['itemid']);?>"><?php echo ($prev_art['atitle']); ?></a><?php else: ?>没有了<?php endif; ?></p>
        <p class="fr">下一篇:<?php if(!empty($next_art['atitle'])): ?><a href="<?php echo U('Article/'.$next_art['aid'].'-'.$_GET['itemid']);?>"><?php echo ($next_art['atitle']); ?></a><?php else: ?>没有了<?php endif; ?></p>
      </div>
      <div class="avn6 fl">
      	<?php if(is_array($foot)): $k = 0; $__LIST__ = $foot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): ++$k;$mod = ($k % 2 )?><div class="avn61 <?php echo $k%2==1?"fl":"fr"; ?>">
          <div class="avn611 fl">
            <p><?php echo ($row['title']); ?></p>
            <span>更多&raquo;</span> </div>
          <div class="avn612 fl glk">
            <?php echo W($row['module'],$row);?>
          </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
    </div>
  </div>