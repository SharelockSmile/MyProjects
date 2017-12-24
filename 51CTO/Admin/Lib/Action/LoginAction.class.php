<?php
class LoginAction extends Action
{
	//用户名密码验证
	function Login()
	{
		if(!isset($_SESSION['user']))
			$this->display();
		else
			$this->redirect('index','Index');
	}
	
	function CheckLogin()
	{
		$Username = trim ( $_POST ["user"] );
		$Password = trim ( $_POST ["pass"] );
		$Verify = trim ( $_POST ["chknumber"] );
		if(!isset($Username)||!strlen($Username))
		{
			$response = "{errors:[{id:'user', msg:'用户名必须'}]}";
		}
		elseif(!isset($Password)||!strlen($Password))
		{
			$response = "{errors:[{id:'pass', msg:'密码必须'}]}";
		}
		elseif(!isset($Verify)||!strlen($Verify))
		{
			$response = "{errors:[{id:'chknumber', msg:'验证码必须'}]}" ;
		}
		elseif(strcasecmp($Verify , $_SESSION['SafeCode']))
		{
			$response = "{errors:[{id:'chknumber', msg:'验证码错误'}]}" ;	
		}
		else
		{
			if($Username != 'lxzl')
			{
				$response = "{errors:[{id:'user', msg:'用户不存在'}]}";
			}
			elseif($Password != 'lxzl')
			{
				$response = "{errors:[{id:'pass', msg:'密码错误'}]}";
			}
			else
			{
				Session::set('user',$Username);
				$response = "{'success':true}";	
			}
		}
		echo $response;
	}
	
	function LoginOut()
	{
		Session::destroy();	
	}
}
?>