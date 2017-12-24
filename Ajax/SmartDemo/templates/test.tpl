数组遍历:
{foreach from=$arr item=value}
    {$value}---
{/foreach}<br>

{foreach from=$arr item=value key=k}
    {$k}-->{$value}<br>
    {foreachelse}没有找到任何数据
{/foreach}<br>

{foreach from=$array item=row name="outer"}
    {foreach from=$row item=cols name="inner"}
        {$cols}---
    {/foreach}<br>
{/foreach}<br>

{foreach from=$stu item=value key=k}
    {$k}-->{$value}<br>
{/foreach}<br>

{foreach from=$null item=value key=k}
    {$k}-->{$value}<br>
    {foreachelse}没有找到任何数据
{/foreach}<br>

Section遍历(不能遍历关联数组):<br>
{section loop=$arr name=k}
    {$arr[k]}--
{/section}<br>


{section loop=$stu name=k}
    {$smarty.section.k.index}
{/section}<br>

嵌套的section:<br>
{section name=k loop=$array}
    {section name=kk loop=$array[k]}
        {$array[k][kk]}---
    {/section}<br>
{/section}<br>

获取索引:
{section loop=$num name=k}
{$smarty.section.k.iteration}
{$smarty.section.k.index}--
{/section}<br>

{$sentence|indent}

{$sentence|indent:10}

{$sentence|indent:1:"\t"}

