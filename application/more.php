<?php 
function more(int $page,$func,int $start,int $end){
  $id=$start;
  if($page<1) return false;
  if($end<$start) return false;
  if(($end-$start+1)/$page<1) $page=($end-$start)+1;
  $base=(int)($end-$start+1)/$page;
  $basemore=$end-$start+1-$page*$base;
  if($basemore>=1)
    for(;$basemore<1;$basemore--,$page--)
      $func($id);
}
?>