<?php
  $a = 'a/b/c/1/d/e.php';
  $b = 'a/b/12/34/c.php';
  //c.php�����e.php
  echo getpathinfo($a, $b);
  //e.php�����c.php
  //echo getpathinfo($b, $b);
  
   //��������
   echo "<br/>";
   echo getRelativePath($a, $b);
   echo "<br/>";
  
   /**
   * ������
   * @param $path1
    * @param $path2
  */
  function getRelativePath($path1, $path2){
      //���� path �ĸ�Ŀ¼�� ����� path  ��û��б�ߣ��򷵻�һ���㣨'.'������ʾ��ǰĿ¼��
      //���򷵻ص��ǰ� path  �н�β�� /component�����һ��б���Լ����沿�֣�ȥ��֮����ַ����� 
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
                       //array_fill()  �� value������ֵ��һ��������� num����Ŀ��
                         //������ start_index  ����ָ���Ŀ�ʼ��
                            $return_path=array_fill(0,$len-$i,'..');
                        }
                       //$b�����$a
                       //array_merge()  ��һ����������ĵ�Ԫ�ϲ�������
                       //һ�������е�ֵ������ǰһ������ĺ��档������Ϊ��������顣 
                       //array_slice()���ظ��� offset�� length������ָ���� array  �����е�һ�����С� 
                       $return_path=array_merge($return_path,array_slice($arr1,$i));
                        /*//$a�����$b
                        $return_path=array_merge($return_path,array_slice($arr2,$i));*/
                       //implode �� ��һ��һά�����ֵת��Ϊ�ַ��� 
                        echo implode('/',$return_path);
                  
                   }

  
                   
                   
                   /**
                    * ����һ
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
                           //�������·�����Ȳ�ͬ�±�
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
