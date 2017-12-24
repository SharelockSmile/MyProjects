<?php

class AccessAction extends Action {

    function ListAll() {
        $saveType = $_POST['saveType'];
        switch ($saveType) {
            case '应用':$this->RoleApp();
                break;
            case '功能':$this->RoleControl();
                break;
            case '控制':$this->RoleAct();
                break;
        }
    }

    function RoleApp() {
        $limit = $_POST['limit'];
        $start = $_POST['start'];
        $limits = $start . "," . $limit;
        $role = new NodeModel();
        $count = $role->where('level=1')->count();
        $result = $role->order('id')->where('level=1')
                        ->limit($limits)->select();
        $rid = $_POST['rid'];
        if (!empty($rid)) {
            $access = new AccessModel();
            $list = $access->where('level=1 and role_id=' . $rid)->getField('node_id,role_id');
            foreach ($result as &$val) {

                $val['saveType'] = '控制器';
                if (array_key_exists($val['id'], $list)) {
                    $val['used'] = '授权';
                } else {
                    $val['used'] = '未授权';
                }
            }
        }
        if ($result) {
            $result = json_encode($result);
            echo '{"totalCount":' . $count . ',"data":' . $result . '}';
        } else {
            echo '{"totalCount":' . $count . ',"data":[{"id":"0","name":"暂无记录"}]}';
        }
    }

    function RoleControl() {
        $limit = $_POST['limit'];
        $start = $_POST['start'];
        $rid = $_POST['rid'];
        $nid = $_POST['nid'];
        if (!empty($rid) && !empty($nid)) {
            $node = new NodeModel();
            $result = $node->where('level=2 and pid=' . $nid)->limit($limits)->select();
            $count = $node->where('level=2 and pid=' . $nid)->count();
            $access = new AccessModel();
            $list = $access->where('level=2 and role_id=' . $rid)->getField('node_id,role_id');
            foreach ($result as &$val) {

                $val['saveType'] = '方法';
                if (array_key_exists($val['id'], $list)) {
                    $val['used'] = '授权';
                } else {
                    $val['used'] = '未授权';
                }
            }
        }
        if ($result) {

            $result = json_encode($result);
            echo '{"totalCount":' . $count . ',"data":' . $result . '}';
        } else {
            echo '{"totalCount":' . $count . ',"data":[{"id":"0","name":"暂无记录"}]}';
        }
    }

    function RoleAct() {
        $limit = $_POST['limit'];
        $start = $_POST['start'];
        $rid = $_POST['rid'];
        $nid = $_POST['nid'];
        if (!empty($rid) && !empty($nid)) {
            $node = new NodeModel();
            $result = $node->where('level=3 and pid=' . $nid)->limit($limits)->select();
            $count = $node->where('level=3 and pid=' . $nid)->count();

            $access = new AccessModel();
            $list = $access->where('level=3 and role_id=' . $rid)->getField('node_id,role_id');
            foreach ($result as &$val) {

                if (array_key_exists($val['id'], $list)) {
                    $val['used'] = '授权';
                } else {
                    $val['used'] = '未授权';
                }
            }
        }
        if ($result) {

            $result = json_encode($result);
            echo '{"totalCount":' . $count . ',"data":' . $result . '}';
        } else {
            echo '{"totalCount":' . $count . ',"data":[{"id":"0","name":"暂无记录"}]}';
        }
    }

}

?>