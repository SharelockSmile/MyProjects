<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryAction
 *
 * @author laoyin
 */
class CategoryAction extends Action {

    function ListALl() {

        $limit = $_POST['limit'];
        $start = $_POST['start'];
        $searchstring = $_POST['searchstring'];
        $condition = array();
        if (!is_null($searchstring) && $searchstring != '')
            $condition['username'] = array('like', '%' . $searchstring . '%');

        $limits = $start . "," . $limit;

        $user = new CategoryViewModel();

        $count = $user->count();
        $result = $user->select();
        $role = new Model('Role');
        $list = $role->getField('id,name');
        foreach ($result as &$v) {
            if ($v['caccess'] == 0) {
                $v['caccess'] = '公开';
            } else {
                $v['caccess'] = $list[$v['caccess']];
            }
        }
        if ($result) {

            $result = json_encode($result);
            echo '{"totalCount":' . $count . ',"data":' . $result . '}';
        } else {
            echo '{"totalCount":' . $count . ',"data":[{"id":"0","name":"<font color=red><b>暂无记录</b></font>"}]}';
        }
    }

    function Add() {

        $menu = new CategoryModel();

        $data['title'] = $_POST['ctitle'];
        $data['alias'] = $_POST['calias'];
        $data['published'] = $_POST['cpublished'];
        $data['sectionid'] = $_POST['sec_name'];


        if (false !== $menu->data($data)->add()) {
            echo '{"success":true}';
        } else {
            echo '{"success":false}';
        }
    }

    function Save() {
        $menu = new CategoryModel();
        $data['title'] = $_POST['ctitle'];
        $data['alias'] = $_POST['calias'];
        $data['published'] = $_POST['cpublished'];
        $ac = $_POST['caccess'];
        $iac = intval($_POST['caccess']);
         
        if (intval($_POST['caccess']) != 0) {
            $data['access'] = $iac;
        } else if ($ac == '0' ) {
            $data['access'] = 0;
        }
        if (intval($_POST['sec_name']) != 0) {
            $data['sectionid'] = $_POST['sec_name'];
        }
        $data['id'] = $_POST['id'];

        if (false !== $menu->data($data)->save()) {
            echo '{"success":true}';
        } else {
            echo '{"success":false}';
        }
    }

}

?>
