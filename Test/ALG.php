<?php
//汉诺塔(A,B,C-------A->C,A->B,C->B,A->C,B->A,B->C,A->C)
/*
 * 1.有三根杆A,B,C.
 * A上有若干盘子
 * 2.每次移动一块盘子，小的只能叠在大的上面
 * 3.把所有盘子从A移到C
 *
 * n=1时移动顺序A->C
 * n=2时移动顺序A->B,A->C.B->C
 * n=3时移动顺序A->C,A->B,C->B,A->C,B->A,B->C,A->C
 */
function hanoi($n,$x,$y,$z) {
    if ($n==1)
    {
        echo "move disk 1 from ".$x." to ".$z."<br/>";
    }else{
        hanoi($n-1,$x,$z,$y);         //把n-1个盘子由A移到B
        echo "move disk ",$n." from".$x." to ".$z."<br/>";         //把第n个盘子由A移到C
        hanoi($n-1,$y,$x,$z);         //把n-1个盘子由B移到C
    }
}
hanoi(4,'A','B','C');
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/21
 * Time: 17:51
 */