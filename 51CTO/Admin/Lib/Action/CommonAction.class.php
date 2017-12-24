<?php
class CommonAction extends Action{
	function _initialize(){
		header('Content_Type:text/html;charset=utf-8');
                $this->redirect('Index/index');
                if(C('USER_AUTH_ON')&&!in_array(MODULE_NAME,explode(',', C('NOT_AUTH_MODEL')))){
                    import('ORG.Util.RBAC');
                    if(!RBAC::AccessDecision()){
                       
                        if(!$_SESSION[C('USER_AUTH_KEY')]){
                              if(!$_SESSION[C('USER_AUTH_KEY')]){
					$this->assign('jumpUrl',__APP__.'/Public/login');
					$this->error('对不起，你没有登录！请重新登录');
				}
                        }
//                        $this->error('对不起，您没有操作权限');
                    }
                }
	}
}
?>