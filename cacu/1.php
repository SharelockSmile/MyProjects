<?php
for ($p=3;$p<3999992/2;$p++)
{
    for ($q=3999992/2;$q>$p;$q++)
    {
        if($p*$q==3999991)
        {
            echo $p.",".$q;
        }
    }
}
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/4/17
 * Time: 12:43
 */