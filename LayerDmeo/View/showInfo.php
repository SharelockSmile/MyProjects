<?php
include '../DAL/MyUserServer.class.php';
include '../Util/Page.class.php';
$mus=new MyUserServer();
//��ȡ������
$res=$mus->GetTotalRow();
$totalRows=$res[0]["totalRows"];
$pageSize=4;
$currentPage=1;
$page=new Page($totalRows, "showInfo.php",$pageSize,$currentPage);
$page->getTotalPages();
$currentPage=$page->getCurrentPage();
$startIndex=($currentPage-1)*$pageSize;
//��ѯ��ʼ
$res1=$mus->GetUserInfo($startIndex,$pageSize);
