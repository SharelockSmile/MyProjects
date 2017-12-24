<?php
class Page
{
	private $totalRows;
	private $totalPages;
	private $url;
	private $pageSize;
	private $currentPage;
	private $prePage;
	private $nextPage;

	/**
	 * Page constructor.��ʼ����ҳ��ز���
	 * @param int $totalRows  ������
	 * @param number $pageSize   ÿҳ��С��Ĭ��ֵΪ5
	 * @param number $currentPage  ��ǰҳ��Ĭ��Ϊ1
	 * @param string $url ҳ��
	 */
	function __construct($totalRows,$url,$pageSize=5,$currentPage=1)
	{
		$this->totalRows=$totalRows;
		$this->currentPage=$currentPage;
		$this->pageSize=$pageSize;
		$this->totalPages=ceil($totalRows/$pageSize);
		$this->url=$url;
		$this->prePage=$this->currentPage-1;
		$this->nextPage=$this->currentPage+1;
	}

	/**
	 * @return number ��ȡ��ҳ��
	 */
	function getTotalPages()
	{
		//$this->totalPages=ceil($this->totalRows/$this->pageSize);
		return $this->totalPages;
	}

	/**
	 *
	 */
	function getCurrentPage()
	{
		if(isset($_GET['page']))
		{
			if($_GET['page']<=1)
			{
				$this->currentPage=1;
				$this->prePage=1;
				$this->nextPage=2;
			}
			elseif ($_GET['page']>=$this->totalPages)
			{
				$this->currentPage=$this->totalPages;
				$this->prePage=$this->currentPage-1;
				$this->nextPage=$this->totalPages;
			}
			else
			{
				$this->currentPage=$_GET['page'];
				$this->prePage=$this->currentPage-1;
				$this->nextPage=$this->currentPage+1;
			}
		}
		return $this->currentPage;
	}

	function showPageContent()
	{
		echo "<div style='width: 800px;height: 40px;border: 1px solid oldlace ;margin: auto;text-align: center'>";
		echo "<a href='{$this->url}?page=1'>��ҳ</a>&nbsp;&nbsp;";
		echo "<a href='{$this->url}?page={$this->prePage}'>��һҳ</a>&nbsp;&nbsp;";
		echo "��ǰ�ǵڡ�{$this->currentPage}��ҳ���ܹ���{$this->totalPages}��ҳ";
		echo "<a href='{$this->url}?page={$this->nextPage}'>&nbsp;&nbsp;��һҳ</a>";
		echo "<a href='{$this->url}?page={$this->totalPages}'>&nbsp;&nbsp;ĩҳ</a>";
		echo "</div>";
	}

}