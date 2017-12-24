<?php

/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/3
 * Time: 16:22
 */
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
     * Page constructor.初始化分页相关参数
     * @param int $totalRows  总行数
     * @param number $pageSize   每页大小，默认值为5
     * @param number $currentPage  当前页，默认为1
     * @param number $url 页面
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
     * @return number 获取总页数
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
        echo "<a href='{$this->url}?page=1'>首页</a>&nbsp;&nbsp;";
        echo "<a href='{$this->url}?page={$this->prePage}'>上一页</a>&nbsp;&nbsp;";
        echo "当前是第【{$this->currentPage}】页，总共【{$this->totalPages}】页";
        echo "<a href='{$this->url}?page={$this->nextPage}'>&nbsp;&nbsp;下一页</a>";
        echo "<a href='{$this->url}?page={$this->totalPages}'>&nbsp;&nbsp;末页</a>";
        echo "</div>";
    }

}