<?php header('Content-Type:text/html;charset=utf-8');?>
<form action="" method="POST">
<select name="type">
<option value="a">a</option>
<option value="b">b</option>
<option value="c">c</option>
</select>
<input type="text" name="arr0" value="" />
<input type="text" name="arr1" value="" />
<input type="submit" name="submit" value="upload" />
</form>
<div>
<?php
 //var_dump($_POST);
if(isset($_POST)){
  switch ($_POST['type']){
    case 'a':$arr=explode(';',$_POST['arr0']);echo serialize($arr);break;
    case 'b':$arr0=explode(';',$_POST['arr0']);$arr1=explode(';',$_POST['arr1']);
      $arr=array();
      foreach($arr0 as $v0){
	foreach($arr1 as $v1)
	  array_push($arr,"$v0|$v1");
      }
      echo serialize($arr);
      break;
    case 'c':$arr0=explode(';',$_POST['arr0']);$arr1=explode(';',$_POST['arr1']);
      $arr=array();
      foreach($arr1 as $v1){
	foreach($arr0 as $v0)
	  array_push($arr,"$v0|$v1");
      }
      echo serialize($arr);
      break;
}

}

$tv=array();
for ($i = 0; $i < 160; $i++) {
	array_push($tv, 0);
}
echo serialize($tv);
?>
</div>