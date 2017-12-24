<?php
  $a = 'a/b/c/1/d/e.php';
  $b = 'a/b/12/34/c.php';
  //c.php相对于e.php
  echo getpathinfo($a, $b);
  //e.php相对于c.php
  //echo getpathinfo($b, $b);
  
   //方法二、
   echo "<br/>";
   echo getRelativePath($a, $b);
   echo "<br/>";
  
   /**
   * 方法二
   * @param $path1
    * @param $path2
  */
  function getRelativePath($path1, $path2){
      //返回 path 的父目录。 如果在 path  中没有斜线，则返回一个点（'.'），表示当前目录。
      //否则返回的是把 path  中结尾的 /component（最后一个斜线以及后面部分）去掉之后的字符串。 
            $arr1=explode('/',dirname($path1));
            //echo dirname($path1)."<br />";//    a/b/c/d
       $arr2=explode('/',dirname($path2));//      a/b/12/34
         for($i=0, $len=count($arr2); $i<$len; $i++ ){
                if($arr1[$i]!=$arr2[$i]){
                    break ;
                         }
         }    
              echo $i."<br>";
                   if($i<$len){
                       //array_fill()  用 value参数的值将一个数组填充 num个条目，
                         //键名由 start_index  参数指定的开始。
                            $return_path=array_fill(0,$len-$i,'..');
                        }
                       //$b相对于$a
                       //array_merge()  将一个或多个数组的单元合并起来，
                       //一个数组中的值附加在前一个数组的后面。返回作为结果的数组。 
                       //array_slice()返回根据 offset和 length参数所指定的 array  数组中的一段序列。 
                       $return_path=array_merge($return_path,array_slice($arr1,$i));
                        /*//$a相对于$b
                        $return_path=array_merge($return_path,array_slice($arr2,$i));*/
                       //implode — 将一个一维数组的值转化为字符串 
                        echo implode('/',$return_path);
                  
                   }

  
                   
                   
                   /**
                    * 方法一
                    * @param $path1
                    * @param $path2
                    * @return string
                    */
                   function getpathinfo($path1, $path2) {
                       $a2array    = explode('/', dirname($path1));
                       $b2array    = explode('/', dirname($path2));
                       $pathinfo   = '';
                       $length= count($a2array)>=count($b2array)?count($a2array):count($b2array);
                       for( $i = 0; $i < $length; $i++ ) {
                           //如果两个路径长度不同下标
                           if(!isset($a2array[$i])){
                               $a2array[$i]='';
                           }elseif(!isset($b2array[$i])){
                               $b2array[$i]='';
                           }
                           $pathinfo.=$a2array[$i] == $b2array[$i] ? '../' : $a2array[$i].'/';
                            
                       }
                       return $pathinfo;
                   }
?>
