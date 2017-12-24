<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SectionModel
 *
 * @author laoyin
 */
class SectionModel extends RelationModel {
    /*
     * 定义关联关系
     * 
     */

    public $_link = array(
        'Category' => array(
            'mapping_type' => HAS_MANY,
            'class_name' => 'Category',
            'foreign_key' => 'sectionid',
            'mappig_name' => 'categorys',
        ),
        'Articel' => array(
            'mapping_type' => HAS_MANY,
            'class_name' => 'Articel',
            'foreign_key' => 'sectionid',
            'mappig_name' => 'articels',
        ),
    );
    protected $_validate = array(
        array('title', 'require', '单元名必须存在', '1', 'regex', 3)
    );
    protected $_auto = array(
        array('alias', 'getAlias', 1, 'callback'), 
        array('access', 'checkAccess', 1, 'callback'));

    function getAlias() {
        if (empty($_POST['alias'])) {
            return date('Y-m-d-H-i-s');
        } else {
            return $_POST['alias'];
        }
    }

    public function checkAccess() {
        $ac = $_POST['access'];
        $iac = intval($_POST['access']);

        if (intval($_POST['access']) != 0) {
            return $iac;
        } else if ($ac == '0') {
            return 0;
        }
    }

}

?>
