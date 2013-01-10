<?php 
include '../setup/DEFINE.php';
include '../includes/lib/pdoc.class.php';
include '../includes/lib/db2htm.class.php';
include '../includes/lib/count.class.php';

$pdoc=new pdoc();
$count=new count($pdoc);

$all=$pdoc->getResAll("SELECT * FROM q_t");

$action=$_GET['action'];
$range=$_GET['range'];
$order=$_GET['order'];

$newArr=array();

if(isset($_GET['range'])){
if($range=='all')
foreach ($all as $arrValue){
	$uarrValue=unserialize($arrValue['q_a_t']);
	foreach ($uarrValue as $Value){
		array_push($newArr, 0);
	}
	$snewArr=serialize($newArr);
	$pdoc->getExecEff("UPDATE q_t SET q_a_t='".$snewArr."' WHERE q_num=".$arrValue['q_num'])	;
	$newArr=array();
}
}
else if(isset($_GET['order']))
if(is_numeric($order)){
	$all=$pdoc->getResRow("SELECT * FROM q_t WHERE q_num=$order");
	$uarrValue=unserialize($all['q_a_t']);
	foreach ($uarrValue as $value) {
		array_push($newArr, 0);
	}
	$snewArr=serialize($newArr);
	$pdoc->getExecEff("UPDATE q_t SET q_a_t='".$snewArr."' WHERE q_num=$order");
}

?>