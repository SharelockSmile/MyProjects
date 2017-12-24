<?php
    include "header.php";
    include "../DAL/ArticleService.php";
    $ArtService=new ArticleService();
    $aId="";
    $zqId="";
    if(isset($_GET["aId"])&&isset($_GET["zqId"]))
    {
        $aId=$_GET["aId"];
        $zqId=$_GET["zqId"];
    }
    $res=$ArtService->getArticleInfoByArtId($aId) or die("出错：）");
    //var_dump($res);
?>
<link rel="stylesheet" type="text/css" href="../Public/CSS/ArtDetail.css">
<style type="text/css">


</style>

<div id="divContainer">
    <table id="tbArtDet">
        <tr align="center" height="50px">
            <td><h1><?php echo $res[0]["title"]?></h1></td>
        </tr>
        <tr height="50px">
            <td>
                <span>作者：<?php echo $res[0]["author"];?></span>
                <span style="float: right">发表时间：<?php echo $res[0]["publishTime"];?></span>
            </td>
        </tr>
        <tr>
            <td><span style="word-break: break-all;word-wrap: break-word;">
                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $res[0]["content"];?>
                </span></td>
        </tr>
        <tr><td>
                <?php echo "<a href='#' style='font-size: 24px;'>♡</a>";?>
            </td></tr>
    </table>
    <div id="sendComment">
        <h2 style="color: #1A588D">发表评论</h2>
        <!-- 引入编辑器样式的文件 -->
        <link href="../UmEditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
        <!-- 引入jquery库文件 -->
        <script type="text/javascript" src="../UmEditor/third-party/jquery.min.js"></script>
        <!-- 引入编辑器的配置文件 -->
        <script type="text/javascript" charset="utf-8" src="../UmEditor/umeditor.config.js"></script>
        <!-- 引入编辑器源码文件 -->
        <script type="text/javascript" charset="utf-8" src="../UmEditor/umeditor.min.js"></script>
        <!-- 引入插件语言包 -->
        <script type="text/javascript" src="../UmEditor/lang/zh-cn/zh-cn.js"></script>


        <form  action="../Process/ProcessCom.php" method="post" name="comForm">
            <input type="hidden" name="hidArtId" value="<?php echo $aId; ?>">
            <input type="hidden" name="hidZqId" value="<?php echo $zqId; ?>">
            <textarea class="article_tip" id="myEditor" style="width: 780px; height: 252px;" name="content">矜持点赞也可以，知音难觅聊一句……</textarea>
            <input type="submit" value="发布" />

        </form>
        <script type="text/javascript">
            //实例化编辑器，设置显示的工具栏
            $opt={toolbar:[
                'undo redo | bold italic underline strikethrough | forecolor backcolor |',
                'insertorderedlist insertunorderedlist | link unlink ' ,
                '| justifyleft justifycenter justifyright justifyjustify |paragraph fontfamily fontsize',
                ' | fullscreen'
            ]};
            var um = UM.getEditor('myEditor',$opt);

        </script>
        <!--勾搭评论别害羞，聊骚要做第一人……-->
    </div>
    <div id="viewComment">
        <h2 style="color: #1A588D">查看评论</h2>
        <?php
            //获取评论
        //var_dump($res);
        //$res=$ArtService->getCommentsByArtId($aId) or die("出错：）");
        $res=$ArtService->getCommentsByArtId($aId);
        if($res){
            echo "<ul>";
            foreach ($res as $row)
            {
                //var_dump($res);
                echo "<li><hr color='#aaa'></li>";
                echo "<li><span>{$row["commoner"]}：{$row["common"]}</span><span style='float: right'>{$row['commenttime']}</span></li>";
                echo "<li><a href='#'>赞一下</a></li>";
            }
            echo "</ul>";
        }else
            {
                echo "<ul>暂无评论</ul>";
            }

        ?>
    </div>
</div>
<?php
include "footer.php";
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/27
 * Time: 15:25
 */