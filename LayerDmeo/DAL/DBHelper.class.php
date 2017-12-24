<?php
class DBHelper
{
	//����������
	private $serverName;
	//�û���
	private $userName;
	//����
	private $passWord;
	//��
	private $dbName;
	//����
	private $link;

	/**
	 * DBHelper constructor.
	 * @param String $s  ��������
	 * @param String $u  �û���
	 * @param String $p  ����
	 * @param String $db ���ݿ���
	 */
	function __construct($s,$u,$p,$db)
	{
		$this->serverName=$s;
		$this->userName=$u;
		$this->passWord=$u;
		$this->dbName=$db;
		//echo "Hello DB";
	}

	/**
	 * ��������
	 *
	 */
	function connet_DB()
	{
		//$this->link=@mysqli_connect($this->serverName,$this->userName,$this->passWord,$this->dbName)or die("fault");
		 $this->link=@mysqli_connect($this->serverName,$this->userName,$this->passWord) or die("����ʧ��");
		 mysqli_select_db($this->link,$this->dbName) or  die("�Ҳ������ݿ�");
		 mysqli_query($this->link,"set names utf8");

	}
	//DML���ݲ�������,,,,,�з���ֵ�ĺ���

	/**
	 * ����ִ����ɾ�Ĳ����ķ���
	 * @param $sql Ҫִ�е�sql���
	 * @return bool �����ķ���ֵ
	 * ��ִ����ɾ�ĳɹ�������Ӱ�캯����0�򷵻�true,���򷵻�false,��ʾִ����ɾ��ʧ��
	 */
	function ExecuteDML($sql)
	{
		$res=mysqli_query($this->link,$sql) or die('���ݲ�������');
		if ($res)
		{
			$row=mysqli_affected_rows($this->link);
			/*if ($row)
			 {
			 return true;
			 }else
			 {
			 return false;
			}*/
			return $row>0?true:false;
		}else
		{
			return false;
		}
	}

	/**
	 * ִ�в�ѯ�ķ���
	 * @param string $sql Ҫִ�еĲ�ѯ��sql���
	 * @return array|bool
	 * ��ѯ�ɹ������ذ������в�ѯ������Ķ�ά����,��ѯʧ���򷵻�false
	 */
	function ExecuteDQL($sql)
	{
		$arrAll=array();
		$res=mysqli_query($this->link,$sql) or die('SQL����

        ');
		if($res)
		{
			while (($arr=mysqli_fetch_assoc($res))!=false)
			{
				//��ÿһ�α����õ�������ŵ�һ����ά������
				$arrAll[]=$arr;
			}
			return $arrAll;
			//�ͷ���Դ
			mysqli_free_result($res);
		}else
		{
			return false;
		}
	}

	/**
	 * �����������ͷ���Դ
	 */
	/*function __destruct()
	 {
	 // TODO: Implement __destruct() method.
	 mysqli_close($this->link);
	 }*/
}