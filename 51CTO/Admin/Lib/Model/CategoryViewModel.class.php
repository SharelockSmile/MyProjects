<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryViewModel
 *
 * @author laoyin
 */
class CategoryViewModel extends ViewModel{
     public $viewFields=array(
         'Category'=>array(
              
             'title'=>'ctitle',
             'alias'=>'calias',
             'published'=>'cpublished',
             'order'=>'corder',
             'access'=>'caccess',
             'sectionid',
             'id'
         ),
         'Section'=>array(
              'id'=>'sid',
             'title'=>'sec_name',
             '_on'=>'Category.sectionid=Section.id',
         )
     );
}

?>
