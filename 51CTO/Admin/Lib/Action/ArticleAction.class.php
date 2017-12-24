<?php

class ArticleAction extends Action
{
        function ListAll()
        {
                $limit = $_POST['limit'];
                $start = $_POST['start'];
                $searchstring = $_POST['searchstring'];
                $condition = array();
                if (!is_null($searchstring) && $searchstring != '')
                        $condition['atitle'] = array('like', '%' . $searchstring . '%');

                $limits = $start . "," . $limit;

                $user = new ArticleViewModel();

                $count = $user->where($condition)->count();
                $result = $user->select();

                if ($result)
                {
                        $role = new Model('Role');
                        $list = $role->getField('id,name');
                        foreach ($result as &$v)
                        {
                                if ($v['aaccess'] == 0)
                                {
                                        $v['aaccess'] = '公开';
                                } else
                                {
                                        $v['aaccess'] = $list[$v['aaccess']];
                                }
                        }
                        $result = json_encode($result);
                        echo '{"totalCount":' . $count . ',"data":' . $result . '}';
                } else
                {
                        echo '{"totalCount":' . $count . ',"data":[{"id":"0","name":"<font color=red><b>暂无记录</b></font>"}]}';
                }
        }

        function ListSecCat()
        {
                $sec = new SectionModel();
                $slist = $sec->order('id')->field('id,title')->select();

                $cat = new CategoryModel();
                $clist = $cat->order('sectionid,id')->field('id,title,sectionid')->select();
                foreach ($slist as &$sv)
                {
                        $sv['cv'] = array();
                        foreach ($clist as $cv)
                        {
                                if ($cv['sectionid'] == $sv['id'])
                                {
                                        array_push($sv['cv'], $cv);
                                }
                        }
                }
                echo json_encode($slist);
        }

        function Save()
        {
                $menu = new ArticleModel();

                $data['title'] = $_POST['atitle'];
                $data['alias'] = $_POST['aalias'];
                $data['published'] = $_POST['apublished'];
                $data['access'] = $_POST['aaccess'];
                $data['sectionid'] = $_POST['sectionid'];
                $data['catid'] = $_POST['catid'];
                $data['id'] = $_POST['id'];
                $data['introtext'] = $_POST['introtext'];
                $data['modified'] = getDate();
                if (false !== $menu->data($data)->save())
                {
                        echo '{"success":true}';
                } else
                {
                        echo '{"success":false}';
                }
        }

        function Add()
        {
                $menu = new ArticleModel();
                $data['title'] = $_POST['atitle'];
                $data['alias'] = $_POST['aalias'];
                $data['published'] = $_POST['apublished'];
                $data['access'] = $_POST['aaccess'];
                $data['sectionid'] = $_POST['sectionid'];
                $data['catid'] = $_POST['catid'];
                $data['created_by']=$this->getUser();
                $data['introtext'] = $_POST['introtext'];
                $data['modified'] = $this->getDate();
                if (false !== $menu->data($data)->add())
                {
                        echo '{"success":true}';
                } else
                {
                        echo '{"success":false}';
                }
        }
        function Remove()
        {
                $did = $_POST['deleteIds'];
                if (!empty($did))
                {
                        $user = new ArticleModel();

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
        function getTitleAlias()
        {
                if (empty($_POST['title_alias']))
                {
                        return substr(strip_tags($_POST['introtext']), 0, 30);
                } else
                {
                        //需要判断是否是中文
                        return $_POST['title_alias'];
                }
        }

        function getDate()
        {
                return date('Y-m-d H:i:s');
        }

        function getUser()
        {
                return $_SESSION['authId'];
        }

}

?>