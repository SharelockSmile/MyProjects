<?php

// +----------------------------------------------------------------------
// | thinkphp + extjs cms  
// +----------------------------------------------------------------------
// | Copyright (c) 2010 http://www.17joys.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 马明 <alex0018@126.com>
// +----------------------------------------------------------------------
//
class MenuAction extends Action {

    function ListAll() {

        $keyword = $_POST['searchstring'];

        if (!empty($keyword)) {
            $where['name'] = array('like', '%' . $keyword . '%');
            $_SESSION['keyword'] = $where;
        } else {
            if (empty($keyword)) {
                unset($_SESSION['keyword']);
            } else if (!empty($_SESSION['keyword'])) {
                $where = $_SESSION['keyword'];
            }
        }
        $limit = $_POST['limit'];
        $start = $_POST['start'];
        $limits = $start . "," . $limit;
        $role = new MenuModel();
        $count = $role->where($where)->count();
        $result = $role->order('id')->where($where)
                        ->limit($limits)->select();
        if ($result) {

            $result = json_encode($result);
            echo '{"totalCount":' . $count . ',"data":' . $result . '}';
        } else {
            echo '{"totalCount":' . $count . ',"data":[{"id":"0","name":"<font color=red><b>暂无记录</b></font>"}]}';
        }
    }

    function Add() {
        $name = $_POST['title'];
        $menu = new MenuModel();

        $data = $menu->create();
        if ($data = $menu->create()) {
            if (false !== $menu->add()) {
                echo '{"success":true}';
            } else {
                echo '{"success":false}';
            }
        } else {
            echo '{"success":false}';
        }
    }

    function Save() {
        $menu = new MenuModel();
        if ($data = $menu->create()) {
            if (!empty($data['id'])) {
                if (false !== $menu->save()) {
                    echo '{"success":true}';
                } else {
                    echo '{"success":false}';
                }
            } else {
                echo '{"success":false}';
            }
        } else {
            echo '{"success":false}';
        }
    }

    function Remove() {
        $did = $_POST['deleteIds'];
        if (!empty($did)) {
            $user = new MenuModel();

            if (false !== $user->where('id in(' . $did . ')')->delete()) {

                echo "{'success':true}";
            } else {

                 echo "{'success':true}";
            }
        } else {
             echo "{'success':true}";
        }
    }

}

?>