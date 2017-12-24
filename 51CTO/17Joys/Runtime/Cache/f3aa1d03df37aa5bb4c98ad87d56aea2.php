<?php if (!defined('THINK_PATH')) exit();?>  <div class="listz fl">
    <div class="listz1 fl glk">
      <p>您当前的位置&raquo;<a href="__APP__">首页</a>&raquo;<a href="<?php echo U('Section/'.$section['id'].'-'.$_GET['itemid']);?>"><?php echo ($section['title']); ?></a>&raquo;<?php echo ($category['title']); ?></p>
    </div>
    <?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): ++$i;$mod = ($i % 2 )?><div class="listbox fl">
      <div class="listbox1 fl">
        <h1><a href="<?php echo U('Article/'.$row['id'].'-'.$_GET['itemid']);?>"><?php echo ($row['title']); ?></a></h1>
        <span><?php echo ($row['created']); ?></span> </div>
      <div class="listbox2 fl">
        <p><?php echo ($row['title_alias']); ?></p>
      </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="listfen fl">
      <div class="listfen1 fl"><?php echo ($show); ?></div>
    </div>
  </div>