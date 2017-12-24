<?php if (!defined('THINK_PATH')) exit();?><div class="iy1 fl">
      <div class="iy11 fl">
        <p><?php echo ($title); ?></p>
        <span><a class="bai" href="#">更多</a>&raquo;</span> 
      </div>
      <div class="iy12 fl glk">
        <ul>
        <?php if(is_array($milist)): $i = 0; $__LIST__ = $milist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): ++$i;$mod = ($i % 2 )?><li style="margin-left:<?php echo ($row['marginnum']); ?>px">
          <?php if($row['signnum']>1){
      			echo "|--";
      		} ?>
          	<a href="<?php echo U(parseLink($row['link'],$row['id']));?>"><?php echo ($row['name']); ?></a>
          </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
     </div>
</div>