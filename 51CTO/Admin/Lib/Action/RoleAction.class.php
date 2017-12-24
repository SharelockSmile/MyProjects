<?php

class RoleAction extends Action
{
        function ListAll()
        {
                
                $keyword = $_POST['searchstring'];

                if (!empty($keyword))
                {
                        $where['name'] = array('like', '%' . $keyword . '%');
                        $_SESSION['keyword'] = $where;
                } else
                {
                        if (empty($keyword))
                        {
                                unset($_SESSION['keyword']);
                        } else if (!empty($_SESSION['keyword']))
                        {
                                $where = $_SESSION['keyword'];
                        }
                }
                $limit = $_POST['limit'];
                $start = $_POST['start'];
                $limits = $start . "," . $limit;
                $role = new RoleModel();
                $count = $role->where($where)->count();
                $result = $role->order('id')->where($where)
                                ->limit($limits)->select();
                foreach ($result as &$val)
                        {
                                
                                $val['saveType'] = '项目';
                               
                        }
                if ($result)
                {

                        $result = json_encode($result);
                        echo '{"totalCount":' . $count . ',"data":' . $result . '}';
                } else
                {
                        echo '{"totalCount":' . $count . ',"data":[{"id":"0","name":"<font color=red><b>暂无记录</b></font>"}]}';
                }
        }

        

        function RoleApp()
        {
                $limit = $_POST['limit'];
                $start = $_POST['start'];
                $limits = $start . "," . $limit;
                $role = new NodeModel();
                $count = $role->where('level=1')->count();
                $result = $role->order('id')->where('level=1')
                                ->limit($limits)->select();
                $rid = $_GET['rid'];
                if (!empty($rid))
                {
                        $access = new AccessModel();
                        $list = $access->where('level=1 and role_id=' . $rid)->getField('node_id,role_id');
                        foreach ($result as &$val)
                        {
                                if (array_key_exists($val['id'], $list))
                                {
                                        $val['used'] = '授权';
                                }else{
                                        $val['used'] = '未授权';
                                }
                                
                        }
                }
                if ($result)
                {
                        $result = json_encode($result);
                        echo '{"totalCount":' . $count . ',"data":' . $result . '}';
                } else
                {
                        echo '{"totalCount":' . $count . ',"data":[{"id":"0","name":"暂无记录"}]}';
                }
        }

        function RoleControl()
        {
                $limit = $_POST['limit'];
                $start = $_POST['start'];
                $rid = $_GET['rid'];
                $nid = $_GET['nid'];
                if (!empty($rid) && !empty($nid))
                {
                        $node = new NodeModel();
                        $result = $node->where('level=2 and pid=' . $nid)->limit($limits)->select();
                        $count = $node->where('level=2 and pid=' . $nid)->count();
                        $access = new AccessModel();
                        $list = $access->where('level=2 and role_id=' . $rid)->getField('node_id,role_id');
                        foreach ($result as &$val)
                        {
                                if (array_key_exists($val['id'], $list))
                                {
                                        $val['used'] = '授权';
                                        $val['name']=$val['name'].$val['used'];
                                }else{
                                        $val['used'] = '未授权';
                                         $val['name']=$val['name'].$val['used'];
                                }
                        }
                }
                if ($result)
                {

                        $result = json_encode($result);
                        echo '{"totalCount":' . $count . ',"data":' . $result . '}';
                } else
                {
                        echo '{"totalCount":' . $count . ',"data":[{"id":"0","name":"暂无记录"}]}';
                }
        }

        function RoleAct()
        {
                $limit = $_POST['limit'];
                $start = $_POST['start'];
                $rid = $_GET['rid'];
                $nid = $_GET['nid'];
                if (!empty($rid) && !empty($nid))
                {
                        $node = new NodeModel();
                        $result = $node->where('level=3 and pid=' . $nid)->limit($limits)->select();
                        $count = $node->where('level=3 and pid=' . $nid)->count(); 

                        $access = new AccessModel();
                        $list = $access->where('level=3 and role_id=' . $rid)->getField('node_id,role_id');
                        foreach ($result as &$val)
                        {
                                if (array_key_exists($val['id'], $list))
                                {
                                        $val['used'] = '授权';
                                        $val['name']=$val['name'].$val['used'];
                                }else{
                                        $val['used'] = '未授权';
                                        $val['name']=$val['name'].$val['used'];
                                }
                        }
                }
                if ($result)
                {

                        $result = json_encode($result);
                        echo '{"totalCount":' . $count . ',"data":' . $result . '}';
                } else
                {
                        echo '{"totalCount":' . $count . ',"data":[{"id":"0","name":"暂无记录"}]}';
                }

                 
        }

        function AddAccess()
        {
                $rid = $_POST['rid'];
                $appid = $_POST['appid'];
                $cid = $_POST['cid'];
                $actionid = $_POST['actionid'];
                 $lock=true;
                if($actionid!='请选择'&&$actionid!=null){
                        $lock=false;
                        $nid=$aid;
                }else if($cid!='请选择'&&$cid!=null){
                        $nid=$cid;
                }else if($appid !='请选择'&&$appid!=null){
                        $nid=$appid;
                }
                if (!empty($rid) && !empty($nid))
                {
                    if($lock){
                        $node = new NodeModel();
                        $list = $node->where('id = ' . $nid)->select();
                    }else{
                        $node_id = implode(',', $nid);
                        $node = new NodeModel();
                        $list = $node->where('id in(' . $node_id . ')')->select();
                    }
                        
                        $access = new AccessModel();
                        foreach ($list as $node)
                        {
                                $alist = $access->where('node_id =' . $node['id'] .
                                                ' and role_id=' . $rid)->select();
                                if (empty($alist))
                                {
                                        $data['role_id'] = $rid;
                                        $data['node_id'] = $node['id'];
                                        $data["level"] = $node['level'];
                                        $data["pid"] = $node['pid'];
                                        $paccess = $access->where('role_id=' . $rid . ' and node_id=' . $node['pid'])->find();
                                        if (empty($paccess) && $node['pid'] != 0)
                                        {
                                                echo '{"success":false}';
                                        }
                                        if (false !== $access->data($data)->add())
                                        {
                                                $flg = true;
                                        } else
                                        {
                                                echo '{"success":false}';
                                        }
                                }
                        }
                        echo '{"success":true}';
                } else
                {
                           
                }
        }

        function DelAccess()
        {
                $rid = $_POST['rid'];
                $nid = $_POST['nid'];
                if (!empty($rid) && !empty($nid))
                {
                        $node_id = implode(',', $nid);
                        $access = new AccessModel();
                        if (false !== $access->where('node_id in(' . $node_id . ') and role_id=' . $rid)->delete())
                        {
                                $this->success('取消授权成功');
                        } else
                        {
                                $this->error('取消授权失败');
                        }
                } else
                {
                        $this->error('请选择用户组和权限');
                }
        }

        function Add()
        {
                $user = new RoleModel();
                if ($data = $user->create())
                {

                        if (false !== $user->add())
                        {

                                echo '{"success":true}';
                        } else
                        {
                                echo '{"success":false}';
                        }
                } else
                {
                        echo '{"success":false}';
                }
        }

        function ListAllForCombo()
        {
                $result = M('role')->order('id')->findAll();
                if ($result)
                {
                        $result = json_encode($result);
                        echo $result;
                } else
                {
                        echo "{'success':false}";
                }
        }

        function Save()
        {

                $user = new RoleModel();
                if ($data = $user->create())
                {
                        if (!empty($data['id']))
                        {

                                if (false !== $user->save())
                                {

                                        echo "{'success':true}";
                                } else
                                {
                                        echo "{'success':false}";
                                }
                        } else
                        {
                                echo "{'success':false}";
                        }
                } else
                {
                        echo "{'success':false}";
                }
        }

        function Remove()
        {
                $did = $_POST['deleteIds'];
                if (!empty($did))
                {
                        $user = new RoleModel();

                        if (false !== $user->where('id in(' . $did . ')')->delete())
                        {

                                echo "{'success':true}";
                        } else
                        {

                                echo '{"success":false,"error":' . $user->getDbError() . '}';
                        }
                } else
                {
                        echo '{"success":false,"error":请选择要删除的用户}';
                }
        }

}

?>