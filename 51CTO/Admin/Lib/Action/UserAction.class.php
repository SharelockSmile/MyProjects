<?php

class UserAction extends Action
{

        function ListAll()
        {

                $limit = $_POST['limit'];
                $start = $_POST['start'];
                $searchstring = $_POST['searchstring'];
                $condition = array();
                if (!is_null($searchstring) && $searchstring != '')
                        $condition['username'] = array('like', '%' . $searchstring . '%');

                $limits = $start . "," . $limit;

                $user = new UserModel();

                $count = $user->where($condition)->count();
                $result = $user->order('id')->where($condition)
                                ->limit($limits)->select();
                if ($result)
                {
                        foreach ($result as &$val)
                        {
                                $val['pwd'] = $val['password'];
                                unset($val['password']);
                        }
                        $result = json_encode($result);
                        echo '{"totalCount":' . $count . ',"data":' . $result . '}';
                } else
                {
                        echo '{"totalCount":' . $count . ',"data":[{"id":"0","name":"<font color=red><b>暂无记录</b></font>"}]}';
                }
        }

        function Add()
        {
                $user = new UserModel();
                if ($data = $user->create())
                {

                        if (false !== $user->add())
                        {

                                $uid = $user->getLastInsID();
                                $ru['role_id'] = $_POST['role_id'];
                                $ru['user_id'] = $uid;
                                $roleuser = new Model('RoleUser');
                                $roleuser->add($ru);
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
                array_unshift($result, array('id' => '0', 'name' => '公开'));
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

                $user = new UserModel();
                if ($data = $user->create())
                {
                        if (!empty($data['id']))
                        {

                                if (false !== $user->save())
                                {
                                        $ru['role_id'] = $_POST['role_id'];
                                        $roleuser = new Model('RoleUser');
                                        $roleuser->where('user_id=' . $user->id)->save($ru);
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
                        $user = new UserModel();

                        if (false !== $user->where('id in(' . $did . ')')->delete())
                        {
                                $roleuser = new Model('RoleUser');
                                $roleuser->where('user_id in(' . $did . ')')->delete();
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