<?php
class IndexAction extends Action
{
//	 function _initialize()
//    {
//       if(!isset($_SESSION['user'])) {
//		//	$this->redirect('login','Login');
//        }
//        parent::_initialize();
//    }
	//调用首页模板并显示
    public function index()
    {
		$this->assign('title','THINKPHP +EXTJS CMS');
		$this->display();
    }
	//根据传递过来的node来判断所要展开的管理目录
	function Expand()
	{
		$node = $_POST["node"];	
		$Tree_Model = D("Tree");
		$sql =  'select id , title as text , layoutpath , jspath , icon , iconcls from joys_tree where type = "'.$node.'"';
		$Tree = $Tree_Model -> query($sql);
		//为每行数据添加leaf=true
		foreach ($Tree as $key => $value)
		{
			$Tree[$key]["leaf"] = true;
		}
		$result = json_encode($Tree);
		echo $result;
	}
	
	function ExpandAccount()
	{
		echo '11';	
	}
}
?>