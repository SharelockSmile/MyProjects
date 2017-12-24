<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SectionAction
 *
 * @author laoyin
 */
class SectionAction extends Action {

    function ListALl() {

        $limit = $_POST['limit'];
        $start = $_POST['start'];
        $searchstring = $_POST['searchstring'];
        $condition = array();
        if (!is_null($searchstring) && $searchstring != '')
            $condition['username'] = array('like', '%' . $searchstring . '%');

        $limits = $start . "," . $limit;

        $user = new SectionModel();

        $count = $user->select();
        $result = $user->select();
        $role = new Model('Role');
        $list = $role->getField('id,name');
        foreach ($result as &$v) {
            if ($v['access'] == 0) {
                $v['access'] = '公开';
            } else {
                $v['access'] = $list[$v['access']];
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

        $menu = new SectionModel();

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
        $menu = new SectionModel();

        $data['title'] = $_POST['title'];
        $data['alias'] = $_POST['alias'];
        $data['published'] = $_POST['published'];
        $ac = $_POST['access'];
        $iac = intval($_POST['access']);

        if (intval($_POST['access']) != 0) {
            $data['access'] = $iac;
        } else if ($ac == '0') {
            $data['access'] = 0;
        }

        $data['id'] = $_POST['id'];
        if (!empty($data['id'])) {


            if (false !== $menu->data($data)->save()) {
                echo '{"success":true}';
            } else {
                echo '{"success":false}';
            }
        }
    }

    function ListAllForCombo() {
        $m = new SectionModel();
        $result = $m->order('id')->findAll();
        array_unshift($result, array('id' => '0', 'name' => '公开'));
        if ($result) {
            $result = json_encode($result);
            echo $result;
        } else {
            echo "{'success':false}";
        }
    }
    function Remove() {
        $did = $_POST['deleteIds'];
        if (!empty($did)) {
            $user = new SectionModel();

            if (false !== $user->where('id in(' . $did . ')')->delete()) {

                echo "{'success':true}";
            } else {

                 echo "{'success':true}";
            }
        } else {
             echo "{'success':true}";
        }
    }
    function helper() {
        
    }

}

?>
