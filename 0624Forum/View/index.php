<?php
include "header.php";
include "../DAL/ZQSevices.php";
$ZQS=new ZQSevices();
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/24
 * Time: 18:13
 */?>
        <link type="text/css" rel="stylesheet" href="../Public/CSS/index.css">
        <div id="divContainer">
            <form>
                <table id="tbZq">
                    <tr id="tr1">
                        <td colspan="3"></td>
                    </tr>
                    <?php
                        $res=$ZQS->getZQInfo();
                        if ($res)
                        {
                            foreach ($res as $row)
                            {
                                echo "<tr><td>";
                                echo "<img src='{$row["zqlogo"]}'>";
                                echo "</td><td>";
                                echo "<span class='sp1'><a href='Articles.php?zqId={$row["zqId"]}&zqName={$row["zqName"]}'>【{$row["zqName"]}】专区</a></span>";
                                echo "<span class='sp2'>版主【{$row["zqHost"]}】</span><td>";
                                //求专区当前发帖数
                                $num=$ZQS->getArticlesByzqId($row["zqId"]);
                                //判断是否有帖
                                $num=$num==true?$num[0]["num"]:0;
                                echo "<span class='sp1'>创建日期：{$row["createTime"]}</span>";
                                echo "<span class='sp2'>帖子总数：{$num}</span></td>";
                                echo "</td></tr>";
                            }
                        }
                    ?>
                </table>
            </form>
        </div>

<?php
include "footer.php";
?>