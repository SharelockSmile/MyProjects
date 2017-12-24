<?php if (!defined('THINK_PATH')) exit();?><ul>
<?php if(is_array($alist)): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): ++$i;$mod = ($i % 2 )?><li><a href="<?php echo U('Article/'.$row['id'].'-'.$row['itemid']);?>"><?php echo ($row['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>