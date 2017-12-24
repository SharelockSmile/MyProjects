<?php

class NodeAction extends Action {

    

    function ListAll() {

        $keyword = $_POST['searchstring'];

        if (!empty($keyword)) {
            $where['title'] = array('like', '%' . $keyword . '%');
            $_SESSION['keyword'] = $where;
        } else {
            if (empty($keyword)) {
                unset($_SESSION['keyword']);
            } else if (!empty($_SESSION['keyword'])) {
                $where = $_SESSION['keyword'];
            }
        }
        $pid = $_POST['id'];
        if (!empty($pid)) {
            $where['pid'] = array('eq', $pid);
        } else {
            $where['pid'] = array('eq', 0);
        }
        $limit = $_POST['limit'];
        $start = $_POST['start'];
        $limits = $start . "," . $limit;
        $role = new NodeModel();
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
        $user = new UserModel();
        if ($data = $user->create()) {

            if (false !== $user->add()) {

                $uid = $user->getLastInsID();
                $ru['role_id'] = $_POST['role_id'];
                $ru['user_id'] = $uid;
                $roleuser = new Model('RoleUser');
                $roleuser->add($ru);
                echo '{"success":true}';
            } else {
                echo '{"success":false}';
            }
        } else {
            echo '{"success":false}';
        }
    }

    function ListAllForCombo() {
        $result = M('role')->order('id')->findAll();
        if ($result) {
            $result = json_encode($result);
            echo $result;
        } else {
            echo "{'success':false}";
        }
    }

    function Save() {

        $user = new UserModel();
        if ($data = $user->create()) {
            if (!empty($data['id'])) {

                if (false !== $user->save()) {
                    $ru['role_id'] = $_POST['role_id'];
                    $roleuser = new Model('RoleUser');
                    $roleuser->where('user_id=' . $user->id)->save($ru);
                    echo "{'success':true}";
                } else {
                    echo "{'success':false}";
                }
            } else {
                echo "{'success':false}";
            }
        } else {
            echo "{'success':false}";
        }
    }

    function Remove() {
        $did = $_POST['deleteIds'];
        if (!empty($did)) {
            $user = new UserModel();

            if (false !== $user->where('id in(' . $did . ')')->delete()) {
                $roleuser = new Model('RoleUser');
                $roleuser->where('user_id in(' . $did . ')')->delete();
                echo "{'success':true}";
            } else {

                echo '{"success":false,"error":' . $user->getDbError() . '}';
            }
        } else {
            echo '{"success":false,"error":请选择要删除的用户}';
        }
    }

}

?>