<?php

class ModulesAction extends Action {

    function ListAll() {
        $limit = $_POST['limit'];
        $start = $_POST['start'];
        $searchstring = $_POST['searchstring'];
        $condition = array();
        if (!is_null($searchstring) && $searchstring != '')
            $condition['username'] = array('like', '%' . $searchstring . '%');

        $limits = $start . "," . $limit;

        $user = new ModulesModel();

        $count = $user->select();
        $result = $user->select();
        $role = new Model('Role');
        $list = $role->getField('id,name');

        if ($result) {
            $role = new Model('Role');
            $list = $role->getField('id,name');
            foreach ($result as &$v) {
                if ($v['aaccess'] == 0) {
                    $v['aaccess'] = '公开';
                } else {
                    $v['aaccess'] = $list[$v['aaccess']];
                }
            }
            $result = json_encode($result);
            echo '{"totalCount":' . $count . ',"data":' . $result . '}';
        } else {
            echo '{"totalCount":' . $count . ',"data":[{"id":"0","name":"<font color=red><b>暂无记录</b></font>"}]}';
        }
    }

    function Save() {
        $menu = new ModulesModel();
        $data['module'] = $_POST['title'];
        $data['title'] = $_POST['title'];
        $data['showtitle'] = $_POST['showtitle'];
        $data['published'] = $_POST['published'];

        $data['position'] = $_POST['position'];
        $data['module'] = $_POST['fenlei'];
        $data['params'] = $_POST['menuname'] . '/n' . $_POST['style'];
        ;
        $data['access'] = $_POST['access'];

        if (false !== $menu->data($data)->save()) {
            $menuid=$menu->getLastInsID();
				$modmenu=new Model('ModulesMenu');
				$modmenu->modulesid=$menuid;
				if(empty($_POST['menuid'])){
					$modmenu->menuid=0;
					$modmenu->add();
				}else{
                                        $menuid=explode(',',$_POST['menuid']);
					foreach ($_POST['menuid'] as $v){
						$modmenu->menuid=$v;
						$modmenu->add();
					}
				}
            echo '{"success":true}';
        } else {
            echo '{"success":false}';
        }
    }

    function MenuName() {

        $role = new MenuModel();
      
        $result = $role->field('id,title')->select();
        if ($result) {

            $result = json_encode($result);
            echo $result;
        } else {
            echo "{'success':false}";
        }
    }

    function Add() {
        $menu = new ModulesModel();
        $data['module'] = $_POST['title'];
        $data['title'] = $_POST['title'];
        $data['showtitle'] = $_POST['showtitle'];
        $data['published'] = $_POST['published'];

        $data['position'] = $_POST['position'];
        $data['module'] = $_POST['fenlei'];
        $data['params'] = $_POST['menuname'] . '/n' . $_POST['style'];
        ;
        $data['access'] = $_POST['access'];

        if (false !== $menu->data($data)->add()) {
            $menuid=$menu->getLastInsID();
				$modmenu=new Model('ModulesMenu');
				$modmenu->modulesid=$menuid;
				if(empty($_POST['menuid'])){
					$modmenu->menuid=0;
					$modmenu->add();
				}else{
                                        $menuid=explode(',',$_POST['menuid']);
					foreach ($_POST['menuid'] as $v){
						$modmenu->menuid=$v;
						$modmenu->add();
					}
				}
            echo '{"success":true}';
        } else {
            echo '{"success":false}';
        }
    }

    function modules() {
        $mod = C('MODULES');
        $this->assign('mod', $mod);
        $this->display();
    }

}

?>