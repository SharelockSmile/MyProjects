<html>
<head>
    <script>
        funstion upload()
        {
            <?php
                print_r($_FILES);
            ?>
        }
    </script>
</head>
<body>
    <form action="ProcessUp.php" method="post" enctype="multipart/form-data">
        请选择上传文件：
        <input type="file" name="myFile">
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
        <input type="submit" value="确认上传" >
    </form>
</body>
</html>
<?php
//print_r($_FILES);
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/20
 * Time: 20:51
 */