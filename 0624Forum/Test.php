<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <!-- 引入编辑器样式的文件 -->
    <link href="UmEditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <!-- 引入jquery库文件 -->
    <script type="text/javascript" src="UmEditor/third-party/jquery.min.js"></script>
    <!-- 引入编辑器的配置文件 -->
    <script type="text/javascript" charset="utf-8" src="UmEditor/umeditor.config.js"></script>
    <!-- 引入编辑器源码文件 -->
    <script type="text/javascript" charset="utf-8" src="UmEditor/umeditor.min.js"></script>
    <!-- 引入插件语言包 -->
    <script type="text/javascript" src="UmEditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<form action="test2.php" method="post" >
    请在下面的编辑器中输入您的文章：
    <textarea class="article_tip" id="myEditor" style="width: 780px; height: 252px;" name="content"></textarea>
    <input type="submit" value="提交" />
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
</body>
</html>