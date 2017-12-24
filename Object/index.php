<?php
/*//引用Person 类
include "Person.php";
//include_once "Person.php";
//require "Person.class.php";
//require_once "Person.class.php";

$p1=new \Object\Person();

//对象访问   对象名->属性/方法
$p1->Id=10001;
echo $p1->Id;
$p1->Sex="女";
var_dump(isset($p1->Id));
var_dump(isset($p1->Sex));
unset($p1->Sex);
var_dump(isset($p1->Sex));*/
?>

<?php
$db=new DB();
function __autoload($className)
{
    //echo $className;
    //exit();
    require $className.'.php';
}

/**
 * 访问类中成员属性和方法
 * A.访问非静态成员：使用对象名-->方法/属性
 *                 x 类名::方法名/属性
 * B.访问静态成员：a.在类外：对象名-->方法名
 *                        类名::方法名
 *               b.在类内：类名::属性/方法
 *                        self::属性/方法
 */
$peo1=new People();
$peo1->name='王乐';    //非静态属性
/*People::$Age=20;    //非静态属性
echo $peo1->name.'---->'.People::$Age;*/
echo $peo1->name;
$peo1->test1();   //非静态方法

$peo1->walk();    //静态方法
People::test2();    //静态方法

?>
<?php
/*include "Person.class.php";
//require "Person.class.php";
$p2=new Person();
$p2->setId(1000);
$id= $p2->getId();
echo $id;
$p2->setAge(18);
echo $p2->getAge();*/
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/20
 * Time: 17:49
 */
?>