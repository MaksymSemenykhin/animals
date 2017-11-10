<?php
$list = file_get_contents('./list.txt');
$list = explode("\n",$list);
$result_list = [];
foreach($list as $item){
$item = trim($item);
$item = str_replace([' ','-','(',')','\\'],'_',$item);
if(!$item)
  continue;
  $result_list[$item] = 0;
}

file_put_contents('animals.json',json_encode($result_list));
