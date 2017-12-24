<?php
class Product_classAction extends Action
{
	protected $Product_class_Model;

	public function __construct($Product_class_Model)
	{
		$this -> Product_class_Model = $this -> Model();
	}

	function ListAll()
	{
	  	$limit = $_POST['limit'] ;
	  	$start = $_POST['start'] ;
		$searchstring = $_POST['searchstring'];
		$condition = array() ;
		if(!is_null($searchstring)&&$searchstring != '')
			$condition['name'] = array('like' , '%'.$searchstring.'%') ;
		$limits = $start . "," . $limit;
		$count = $this -> Product_class_Model ->where($condition)->count();
		$result = $this -> Product_class_Model -> findAll($condition , '*' , 'id DESC' , $limits);
		if($result)
		{
			$result = json_encode($result);
			echo '{"totalCount":'.$count.',"data":'.$result.'}' ;
		}
		else
		{
			echo '{"totalCount":'.$count.',"data":[{"id":"0","name":"<font color=red><b>暂无记录</b></font>"}]}' ;
		}
	}
	
	function ListAllForCombo()
	{
		$result = $this -> Product_class_Model -> findAll('' , '*' , 'id DESC');
		if($result)
		{
			$result = json_encode($result);
			echo $result;
		}
		else
		{
			echo "{'success':false}" ;	
		}
	}

	function Save()
	{
		$name = $_POST['name'];
		$id = $_POST['id'];
		$count = $this -> CheckName($name);
		if($count)
		{
			echo '{"success":false}';
			return;
		}
		$condition = array();
		$condition['id'] = array('eqf' , $id);
		$data = array();
		$data['name'] = $name;
		if($this -> Product_class_Model -> save($data , $condition))
			echo '{"success":true}' ;
		else
			echo '{"success":false}';
	}

	function Add()
	{
		$name = $_POST['name'];
		$count = $this -> CheckName($name);
		if($count)
		{
			echo '{"success":false}';
			return;
		}
		$data = array() ;
		$data['name'] = $name ;
		if($this -> Product_class_Model -> add($data))
			echo '{"success":true}' ;
		else
			echo '{"success":false}';
	}

	function Remove()
	{
		$id = $_POST['deleteIds'];
		$condition = array();
		$condition['id'] = array('eqf' , $id);
		$Product = A('Product');
		$num = $Product -> Link($id,'class');
		if($num)
		{
			echo '{"success":false,"num":'.$num.'}';
			return;
		}
		if($this -> Product_class_Model -> delete($condition))
			echo '{"success":true}' ;
		else
			echo '{"success":false}';
	}

	function CheckName($name)
	{
		$condition = array();
		$condition['name'] = $name;
		$count = $this -> Product_class_Model -> count($condition);
		return $count;
	}

	function GetNameById($id)
	{
		$list = $this -> Model() -> find(array("id" => $id),'name');
		return $list['name'];
	}

	function Model()
	{
		return D("Product_class");
	}
	
	function __destruct()
	{
	    unset($Product_class_Model);
	}
}
?>