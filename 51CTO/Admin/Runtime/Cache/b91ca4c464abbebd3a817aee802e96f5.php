<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>17JOYS管理后台 - 提示信息</title>
<link href="../Public/images/skin.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #EEF2FB;
}
-->
</style>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="../Public/images/mail_leftbg.gif"><img src="../Public/images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="../Public/images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt">提示信息</div></td>
      </tr>
    </table></td>
    <td width="16" valign="top" background="../Public/images/mail_rightbg.gif"><img src="../Public/images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td valign="middle" background="../Public/images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9">
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" valign="top">&nbsp;</td>
        <td>&nbsp;</td>
        <td valign="top">&nbsp;</td>
      </tr>
      <tr>
        <th><?php echo ($msgTitle); ?></th>  
      </tr>
      <tr>   
        <td style="color:blue"><?php echo ($message); ?></td>
        <td style="color:red"><?php echo ($error); ?></td>
      </tr>
      <tr>
        <td>系统将在 
        <span style="color:blue;font-weight:bold">
        <?php echo ($waitSecond); ?></span>秒后自动跳转，如果不想等待,直接点击 
        <a href="<?php echo ($jumpUrl); ?>">
        <span style="color:blue;font-weight:bold">这里</span>
        </a>关闭
        <script type="text/JavaScript">
			function redirect(url) {
				window.location.replace(url);
			}
			window.setTimeout("redirect('<?php echo ($jumpUrl); ?>')",<?php echo ($waitSecond); ?>000);
		</script>
        </td>
      </tr>
    </table>
    </td>
    <td background="../Public/images/mail_rightbg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom" background="../Public/images/mail_leftbg.gif"><img src="../Public/images/buttom_left2.gif" width="17" height="17" /></td>
    <td background="../Public/images/buttom_bgs.gif"><img src="../Public/images/buttom_bgs.gif" width="17" height="17"></td>
    <td valign="bottom" background="../Public/images/mail_rightbg.gif"><img src="../Public/images/buttom_right2.gif" width="16" height="17" /></td>
  </tr>
</table>
</body>