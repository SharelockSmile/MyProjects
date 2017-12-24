<?php
include "header.php";
include "../DAL/ArticleService.php";
$AS=new ArticleService();

$zqId="";
$zqName="";
//var_dump($_GET);
if(isset($_GET['zqId']))
{
    $zqId=$_GET['zqId'];
}
if(isset($_GET['zqName']))
{
    $zqName=$_GET['zqName'];
}
?>
<link rel="stylesheet" type="text/css" href="../Public/CSS/article.css">
<div id="divContainer">
    <table id="tbArt">
        <tr id="">
            <td colspan="5">==【<?php echo $zqName;?>】专区==</td>
        </tr>
        <tr>
            <td>序号</td>
            <td>标题</td>
            <td>作者</td>
            <td>评论数/点击率</td>
            <td>发表时间</td>
        </tr>
        <!--<tr>-->
            <?php
            //根据专区编号查询专区中帖子
            //$res=$AS->getArticleInfoByZQId($zqId) or die("出错：）");
            $res=$AS->getArticleInfoByZQId($zqId);
            if($res)
            {
                //定义变量记录帖子数
                $i=0;
                foreach ($res as $row)
                {
                    $i++;
                    echo "<tr>";
                    echo "<td>{$i}</td>";
                    echo "<td><a href='ArticleDetail.php?aId={$row["articleId"]}&zqId={$zqId}'>{$row['title']}</a></td>";
                    echo "<td>{$row['author']}</td>";
                    //根据帖子编号查询帖子评论数
                    $comCounts=$AS->getCommentCountByAid($row["articleId"]);
                    $count=$comCounts==null?0:$comCounts[0]["commentCount"];
                    echo "<td>{$count}/{$row["clickCount"]}</td>";
                    echo "<td>{$row["publishTime"]}</td>";
                }
                echo "</tr>";
            }else
                {
                    echo "<tr><td colspan='5' style='color: #1A588D'>该专区暂无人发帖，跨来抢占沙发……</td></tr>";
                }

            ?>
        <!--</tr>-->
    </table>
</div>
<div>

</div>
<?php
include 'footer.php';
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/25
 * Time: 11:35
 */