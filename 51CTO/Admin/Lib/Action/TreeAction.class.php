<?php

class TreeAction {

    /**
     * 生成数所需要的二维数组
     */
    public $input_arr;

    /**
     * 返回的树形数组
     */
    private $tree_arr;

    /**
     * 生成树所需要的tag
     */
    public $tag = array('│', '├', '└', '─');

    /**
     * 树形深度
     */
    public $deep;

    /**
     * 数组键值
     */
    public $my_tag = 'id';

    /**
     * 数组父键值
     */
    public $parent_tag = 'pid';

    /**
     * 数组保证键名和id相同 否则出现致命性错误
     * @param array $arr
     * $arr = array(
     *      1 => array('id'=>'1', 'parentid'=>0, 'name'=>'一级1'),
     *      2 => array('id'=>'2', 'parentid'=>0, 'name'=>'一级2'),
     *      3 => array('id'=>'3', 'parentid'=>1, 'name'=>'二级1'),
     *      4 => array('id'=>'4', 'parentid'=>1, 'name'=>'二级2'),
     *      5 => array('id'=>'5', 'parentid'=>2, 'name'=>'二级3'),
     *      6 => array('id'=>'6', 'parentid'=>3, 'name'=>'三级1'),
     *      7 => array('id'=>'7', 'parentid'=>3, 'name'=>'三级2'))
     */
    public function __construct($arr = array()) {
        $this->input_arr = $arr;
        return is_array($this->input_arr);
    }

    /**
     * 递归取树形纯数组
     * @param  int    $start_id 从哪个id开始遍历,0为根节点
     * @return array  排序好的数组
     */
    public function get_tree_data($start_id = 0, $leaf = false) {
        $tree_arr = array();
        $child = $this->get_child($start_id, $leaf);
          
        if (is_array($child) && $child) {
            foreach ($child as &$child_value) {
                $tree_arr[$child_value['id']] = $child_value;
                $data = $this->get_child($child_value['id']);
                if (is_array($data) && count($data) >= 1) {
                    $leaf = 'false';
                } else {
                    $leaf = 'true';
                }
                
                $tree_arr[$child_value['id']]['leaf'] = $leaf;
                $tree_arr[$child_value['id']]['children'] = $this->get_tree_data($child_value['id']);
            }
        }
        return $tree_arr;
    }

    /**
     * 返回树形结构
     * @param  int    $start_id 从哪个id开始遍历,0为根节点
     * @param  string $display  显示哪个键值
     * @param  string $adds     额外添加的字串
     * @return array 
     * $return = array(
     * 	   1 =>  一级1
     *     3 => ├ 二级1
     *     6 =>     ├ 三级1
     * 	   7 =>     └ 三级2
     * 	   4 => └ 二级2
     * 	   2 =>  一级2
     * 	   5 => └ 二级3)
     */
    public function get_tree($start_id, $display, $adds = '') {
        $child = $this->get_child($start_id);
        $num = 1;
        if (is_array($child) && $child) {
            $size = count($child);
            foreach ($child as $child_id => $child_value) {
                $pre = '';
                if ($start_id != 0) {
                    if ($num == $size) {
                        $pre = $this->tag[2];
                    } else {
                        $pre = $this->tag[1];
                    }
                }
                $this->tree_arr[$child_id] = $adds . $pre . $child_value[$display];
                $this->get_tree($child_id, $display, $adds . $this->tag[0]);
                $num++;
            }
        }
        return $this->tree_arr;
    }

    /**
     * 获取子元素
     * @param  string $my_id 其id
     * @return array  $data  子元素数组
     */
    private function get_child($my_id, $leaf) {
        $data = array();
        foreach ($this->input_arr as $key => $value) {
            if ($value[$this->parent_tag] == $my_id) {

                $data[$key] = $value;
            }
        }


        return $data;
    }

    /**
     * 获取父元素
     * @param string $my_id 其id
     * @return array $data  父元素数组
     */
    private function get_parent($my_id) {
        if (!isset($this->input_arr[$my_id])) {
            return false;
        }
        $pid = $this->input_arr[$my_id][$this->parent_tag];
        if (!$pid) {
            return false;
        }
        return isset($this->input_arr[$pid]) ? $this->input_arr[$pid] : array();
    }

}

?>