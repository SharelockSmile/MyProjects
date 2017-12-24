<?php

class MenuItemAction extends Action
{

        function ListAll()
        {

                $keyword = $_POST['searchstring'];
                $limit = $_POST['limit'];
                $start = $_POST['start'];
                $limits = $start . "," . $limit;
                if (!empty($keyword))
                {
                        $where['name'] = array('like', '%' . $keyword . '%');
                        $_SESSION['keyword'] = $where;
                } else
                {
                        if (empty($keyword))
                        {
                                unset($_SESSION['keyword']);
                        } else
                        if (!empty($_SESSION['keyword']))
                        {
                                $where = $_SESSION['keyword'];
                        }
                }
                $menuitem = new MenuItemModel();
                $keyword = $_POST['keyword'];
                $ftype = $_POST['ftype'];
                if (!empty($keyword) && !empty($ftype))
                {
                        $where[$ftype] = array('like', '%' . $keyword . '%');
                        $_SESSION['keyword'] = $where;
                } else
                {
                        if (empty($keyword) && !empty($ftype))
                        {
                                unset($_SESSION['keyword']);
                        } else
                        if (!empty($_SESSION['keyword']))
                        {
                                $where = $_SESSION['keyword'];
                        }
                }
                if (!empty($_REQUEST['id']))
                {
                        $_SESSION['menuid'] = $_REQUEST['id'];
                        $where['menuid'] = $_SESSION['menuid'];
                } elseif ($_SESSION['menuid'])
                {
                        $where['menuid'] = $_SESSION['menuid'];
                } else
                {
                        $this->error('请选择菜单');
                }

                $count = $menuitem->where($where)->count();


                $list = $menuitem->field("id,name,pid,type,componentid,`order`,published,access,concat(path,'-',id) as bpath")->
                                order("bpath,id")->limit($limits)->where($where)->select();
                $role = new Model('Role');
                $rlist = $role->getField('id,name');

                foreach ($list as $key => $value)
                {
                        if ($list[$key]['access'] != 0)
                        {
                                $list[$key]['access'] = $rlist[$list[$key]['access']];
                        }
                        $list[$key]['signnum'] = count(explode('-', $value['bpath'])) - 1;
                        $list[$key]['marginnum'] = (count(explode('-', $value['bpath'])) - 1) * 20;
                }

                if ($list)
                {

                        $result = json_encode($list);
                        echo '{"totalCount":' . $count . ',"data":' . $result . '}';
                } else
                {
                        echo '{"totalCount":' . $count .
                        ',"data":[{"id":"0","name":"<font color=red><b>暂无记录</b></font>"}]}';
                }
        }

        function getPath()
        {
                $menu = new MenuItemModel();
                $pid = $_POST['pid'];
                $mi = $menu->field('id,path')->getById($pid);
                $path = $pid != 0 ? $mi['path'] . '-' . $mi['id'] : 0;
                return $path;
        }

        function Add()
        {
                $menu = new MenuItemModel();
                switch ($_POST['fenlei'])
                {
                        case '1':$_POST['fenlei'] = 'Article';
                        case '2':$_POST['fenlei'] = 'Section';
                        case '3':$_POST['fenlei'] = 'Category';
                }
                $data['link'] = 'index.php/' . $_POST['fenlei'] . '/view/id/' . $_POST['ctype'];
                $data['access'] = $_POST['access'];
                $data['published'] = $_POST['published'];

                $data['browserNav'] = $_POST['nav'];
                $data['name'] = $_POST['name'];
                $data['type'] = $_POST['fenlei'];
                $data['menuid'] = $_POST['menuid'];
                $data['path'] = $this->getPath();
                $data['pid'] = $_POST['pid'];

                if (false !== $menu->data($data)->Add())
                {
                        echo '{"success":true}';
                } else
                {
                        echo '{"success":false}';
                }
        }

        function Save()
        {
                $menu = new MenuItemModel();
                switch ($_POST['fenlei'])
                {
                        case '1':$_POST['fenlei'] = 'Article';
                        case '2':$_POST['fenlei'] = 'Section';
                        case '3':$_POST['fenlei'] = 'Category';
                }
                $data['link'] = 'index.php/' . $_POST['fenlei'] . '/view/id/' . $_POST['ctype'];
                $data['access'] = $_POST['access'];
                $data['published'] = $_POST['published'];

                $data['browserNav'] = $_POST['nav'];
                $data['name'] = $_POST['name'];
                $data['type'] = $_POST['fenlei'];
                $data['menuid'] = $_POST['pid'];
                $data['path'] = $this->getPath();
                $data['id'] = $_POST['id'];

                if (false !== $menu->data($data)->Save())
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
                        $user = new MenuItemModel();

                        if (false !== $user->where('id in(' . $did . ')')->delete())
                        {

                                echo "{'success':true}";
                        } else
                        {

                                echo "{'success':true}";
                        }
                } else
                {
                        echo "{'success':true}";
                }
        }

        function ParentMenu()
        {



                $menuitem = new MenuItemModel();
                $result = $menuitem->field("id,name,pid,type,componentid,`order`,published,access,concat(path,'-',id) as bpath")->
                                order("bpath,id")->where('pid=' . $_SESSION['menuid'])->select();
                $json = array();
                $ids = array();
                foreach ($result as $val)
                {
                        if (in_array($ids, $val['id']))
                        {
                                return;
                        }
                        ;
                        array_puah($val['id'], $ids);
                        $json['id'] = $val["id"];
                        $json['text'] = $val["name"];
                        $json['leaf'] = 'true';
                        foreach ($resultc as $cval)
                        {
                                if ($cval['pid'] = $val['id'])
                                {
                                        $json['children']['id'] = $cval['id'];
                                        $json['children']['text'] = $cval['name'];
                                        $json['children']['leaf'] = 'false';
                                }
                        }
                }
                if ($result)
                {
                        $result = json_encode($result);
                        echo $result;
                } else
                {
                        echo "{'success':false}";
                }
        }

        function boss_json($list)
        {
                $str = '';
                foreach ($list as $key => $value)
                { //遍历列表
                        if ($str != '')
                                $str .= ',';
                        $in_str = '';
                        foreach ($value as $n => &$v)
                        { //遍历数组
                                if ($in_str != '')
                                        $in_str .= ',';
                                if ($n == 'leaf')
                                {
                                        $in_str .= $n . ":" . $v;
                                } else
                                {
                                        if ($n == 'children' && is_array($v))
                                        {
                                                $v = $this->boss_json($v);
                                                $in_str .= $n . ":" . $v;
                                        } else
                                        {
                                                $in_str .= $n . ":'" . $v . "'";
                                        }
                                }
                        }
                        $str .= '{' . $in_str . '}';
                }
                return $str = '[' . $str . ']';
        }

        function tree()
        {


                $menuitem = new MenuItemModel();
                $result = $menuitem->field("id,name as text,pid,type")->select();
                $tree = new TreeAction();
                $tree->input_arr = $result;
//        var_dump($result);
                $data = $tree->get_tree_data(0);
//        $data = array(
//  0 => 'int 1',
//  1 =>'int 1',
//  2 =>'int 1');
//        $data['children']=array(
//  0 => 'int 1',
//  1 =>'int 1',
//  2 =>'int 1');

                echo "[{id:'0',text:'顶层菜单',children:" . $this->boss_json($data) . "}]";
//                echo "[
//            { id:'1',text:'01',leaf:false,children:[
//                { id:'12',text:'01-01',leaf:true},
//                { id:'13',text:'01-02',children:[
//                    {text:'01-02-01'},
//                    {text:'01-02-02',leaf:true}
//                ]},
//                {text:'01-03',leaf:true}
//            ]},
//            {text:'02',leaf:true}
//        ]";
//                echo "[{id:'1',text:'主菜单项1',pid:'0',type:'Section' 
//                        ,children:'[
//                                {id:'3',text:'主菜单1-1',pid:'1',type:'',leaf:'true'}
//                                ,{id:'4',text:'主菜单项2-1',pid:'1',type:'',leaf:'true'}
//                                ,{id:'5',text:'主菜单项1-1-3',pid:'1',type:'',leaf:'true'}
//                                ,{id:'6',text:'主菜单1-2',pid:'1',type:'',leaf:'true',children:'[]'}]'},
//                                {id:'2',text:'主菜单项2',pid:'0',type:'Category',leaf:'true',children:'[]'}
//                                ]
//                                [{id:'1',text:'主菜单项1',pid:'0',type:'Section',leaf:'false'}]]";
        }

        function Art()
        {
                $limit = $_POST['limit'];
                $start = $_POST['start'];
                $limits = $start . "," . $limit;
                $role = new ArticleViewModel();
                $where['Article.published'] = array('gt', 0);
                $count = $role->where($where)->count();
                $result = $role->order('id')->where($where)->limit($limits)->select();
                if ($result)
                {

                        $result = json_encode($result);
                        echo '{"totalCount":' . $count . ',"root":' . $result . '}';
                } else
                {
                        echo '{"totalCount":' . $count .
                        ',"root":[{"id":"0","atitle":"<font color=red><b>暂无记录</b></font>"}]}';
                }
        }

        function Car()
        {
                $limit = $_POST['limit'];
                $start = $_POST['start'];
                $limits = $start . "," . $limit;
                $role = new CategoryViewModel();
                $where['Category.published'] = array('gt', 0);
                $count = $role->where($where)->count();
                $result = $role->order('id')->where($where)->limit($limits)->select();
                foreach ($result as & $val)
                {
                        $val['atitle'] = $val['ctitle'];
                }
                if ($result)
                {

                        $result = json_encode($result);
                        echo '{"totalCount":' . $count . ',"root":' . $result . '}';
                } else
                {
                        echo '{"totalCount":' . $count .
                        ',"root":[{"id":"0","atitle":"<font color=red><b>暂无记录</b></font>"}]}';
                }
        }

        function Sec()
        {
                $limit = $_POST['limit'];
                $start = $_POST['start'];
                $limits = $start . "," . $limit;
                $role = new SectionModel();
                $where['published'] = array('gt', 0);
                $count = $role->where($where)->count();
                $result = $role->order('id')->where($where)->limit($limits)->select();
                foreach ($result as & $val)
                {
                        $val['atitle'] = $val['title'];
                }
                if ($result)
                {

                        $result = json_encode($result);
                        echo '{"totalCount":' . $count . ',"root":' . $result . '}';
                } else
                {
                        echo '{"totalCount":' . $count .
                        ',"root":[{"id":"0","atitle":"<font color=red><b>暂无记录</b></font>"}]}';
                }
        }

}

?>
