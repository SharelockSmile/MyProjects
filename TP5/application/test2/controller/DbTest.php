<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/8/3
 * Time: 16:57
 */

namespace app\test2\controller;

use think\Db;
class DbTest
{
    public function dbTest()
    {
        /* //查询结果集
        $sql="select id, name,info from tb_commo";
        $res=Db::query($sql);
       //更新数据库
       $sql="";
        $res=Db::execute($sql);*/
      /*  echo "<pre>";
        dump($res);
        echo "</pre>";*/

       /* $result=Db::connect([
            // 数据库类型
            'type'            => 'mysql',
            // 服务器地址
            'hostname'        => '127.0.0.1',
            // 数据库名
            'database'        => 'forum',
            // 用户名
            'username'        => 'root',
            // 密码
            'password'        => 'root',
            // 端口
            'hostport'        => '',
            // 连接dsn
            'dsn'             => '',
            // 数据库连接参数
            'params'          => [],
            // 数据库编码默认采用utf8
            'charset'         => 'utf8',
            // 数据库表前缀
            'prefix'          => 'tb_',
        ])->query("select uid,uname,usex from dis_users");*/

        /* $db1=Db::connect("db1");
         $result=Db::connect('db1')->query("select * from books");

         $sql="select uid,uname,usex from dis_users";
         $result=Db::connect('db2')->query("select uid,uname,usex from dis_users");*/


       /* //参数绑定
        Db::execute('insert into tb_admin (id, name,pwd) values (?, ?, ?)', [5, 'Joy', md5("123")]);
       //query查询
        $result = Db::query('select * from tb_admin where id = ?', [4]);

        //查询构造器
        Db::table('tb_admin')->insert(['id' => 7, 'name' => 'Jone', 'pwd' => md5("123")]);
       //更新数据
        //Db::table('tb_admin')->where('id', 4)->update(['name' => "hello"]);
        //由于设定了表前缀，可以把table改为name
        Db::name('admin')->update(['id' => 4, 'name' => 'Linda']);
        //查询数据
        $list = Db::table('tb_admin')->where('id', 7)->select();
       //删除数据
        Db::name('admin')
            ->where('id', 3)
            ->delete();
       //使用助手函数代表db(),定义了前缀和name的参数相同
        $db = db('admin');
        // 插入记录
        //$db->insert(['id' => 3, 'name' => 'Liu',"pwd"=>md5("123456")]);
        //查询数据
        $list = $db->where('id', 4)->select();
        $list = $db->select();
        //删除数据
        $res=$db->where("id",6)->delete();*/

        //链式操作   除select()外其余顺序可改
        /*$list = Db::name('admin')
            ->field('id,name')
            ->order('id', 'desc')
            //->limit(3)
                ->limit(2,3)
            ->select();*/
        /* $list=Db::name('admin')
           ->where("id",3)
           ->field("id,name")
           //->select()          //有一个元素的二维数组
           ->find();            //一位数组
      /* $=Db::name('admin')
           ->field("id,name")
           //->find("id",4)      //NULL
           ->find(4);         //括号里可以直接写主键的值
       */

        /*  //聚合查询
        $count = Db::name('admin')
            ->count();

      //查NULL-----默认值是NULL
      $res=Db::table("books")->where("detail",null)->select();*/

        //批量查询
        /* $result = Db::name('menu')
             ->where([
                 'menuId' => ['between', '1,7'],
                 'menuName' => ['like', '%商品%'],
             ])->select();
        $result=Db::name("menu")
         ->where('menuName', 'like', '%商品%')
         ->where('menuId', ['in', [1, 2, 3]], ['between', '5,9'], 'or')->limit(2)->select();*/

        /*//快捷查询，使用&和|
        $result = Db::name('class')
            //->where('id|supid', '>', 0)
            ->where('id&supid', '>', 0)
            ->limit(10)
            ->select();*/

       /* //获取数值
        $title=Db::name("public")->where("id",15)->value("title");
        //获取列数据
        $culomn=Db::name("public")->column("title");         //默认索引
        $culomn=Db::name("public")->column("title","id");       //以id为索引
        $list = Db::name('public')
            ->where('title', "like","%Add%")
            ->column('*', 'id');*/

        /*$result = Db::name('admin')
            ->where([
                'id' => [['in', [1, 2, 3]], ['between', '2,7'], 'or'],
                'name' => ['like', '%l%'],
            ])->limit(2)->select();*/

        /*//字符串查询
        $result=Db::name("menu")->where('menuId>:dd AND link IS NOT NULL',['dd'==3])->select();
        $result=Db::name("menu")->where('menuId>:dd AND link IS NOT NULL',['dd'=>3])->select();*/

        /* // 获取今天的数据
       $result = Db::name('public')
            ->whereTime('addtime', 'today')
            ->select();
        $result = Db::name('public')
        ->whereTime('addtime', '>','2017-07-11')
        ->select();
        $result = Db::name('public')
            ->whereTime('addtime','2017-07-11')
            ->select();
        $result = Db::name('public')
            ->whereTime('addtime', 'last week')
            ->select();
        $result = Db::name('public')
            ->whereTime('addtime','between',['2017-07-11','2017-08-04'])
            ->select();*/

        //分块查询
        $result=Db::name("menu")->where('menuId', '>', 3)
            ->chunk(5, function ($list) {
// 处理5条记录
                foreach($list as $data){
                    echo "<pre>";
                    dump($data);
                    echo "</pre>";
                }
            });

        echo "<pre>";
        //dump($list);
        dump($result);
        echo "</pre>";
    }
}