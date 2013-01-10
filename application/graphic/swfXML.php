<?php
/**
 * @param $order=$_GET['order']
 * @param $chartType=$_GET['type']
 */
include '../../setup/DEFINE.php';
include '../../includes/lib/pdoc.class.php';
include '../../includes/lib/db2htm.class.php';
include '../../includes/lib/count.class.php';

function getNumber($string) {
	if(!is_numeric(substr($string,0,1))) return getNumber(substr($string,1));
	elseif(!is_numeric(substr($string,-1))) return getNumber(substr($string,0,-1));
	return $string;
}

$pdoc=new pdoc();
$count=new count($pdoc);

header("Content-Type:application/XML;charset=UTF-8");

if(isset($_GET['ctype'])) 
$chartType=$_GET['ctype'];
else $chartType=null;

if(isset($_GET['order'])) {
	$tmp=explode("|", $_GET['order']);
	$order=$tmp[0];
	$chartType=$tmp[1];
	unset($tmp);
	try {
		$all=$pdoc->getResRow("SELECT * FROM q_en WHERE order_num=$order");
	}
	catch (Exception $e) {
		die($e->getMessage());
	}

	$question=$all['questions'];
	$type=$all['type'];
	$option=unserialize($all['options']); //array
	$add=explode("|",$all['add']); //array
	$exOption=array();
	$exOptionCount=array();
	$tSum=0;
	if(($optionCount=$count->getCountArr($order))==FALSE) die("Error:swfXML.php:getCountArr"); //$optionCount

}
?>
<chart> 
<chart_data> 
<?php 
switch ($type){

	case 'multi_str&select':
		$tpValue = substr($option[0], 0, strpos($option[0], "|"));
		array_push($option, "END|0");
		foreach ($option as $key=>$value){
			$extOption=explode("|", $value);

			$extCount=getNumber($extOption[1]);

			if($extOption[0]==$tpValue) $tSum+=$extCount*$optionCount[$key];
			else {
				array_push($exOption, $tpValue);
				array_push($exOptionCount, $tSum);
				$tSum=$extCount*$optionCount[$key];
				$tpValue=$extOption[0];
			}
			if($extOption[0]=='END') break;
		}

		echo "<row>\n<null/>";
		foreach ($exOption as $value) {
			echo "\n<string>";
			echo $value;
			echo "</string>";
		}
		echo "\n</row>";
		echo "\n<row>\n<string>Count</string>";
		foreach ($exOptionCount as $value){
			echo "\n<number>";
			echo $value;
			echo "</number>";
		}
		echo "\n</row>";
		break;

	case 'multi_select&str':
		$tpValue = substr($option[0], strpos($option[0], "|")+1);
		array_push($option, "0|END");
		foreach ($option as $key=>$value){
			$extOption=explode("|", $value);
			$extCount=getNumber($extOption[0]);

			if($extOption[1]==$tpValue) $tSum+=$extCount*$optionCount[$key];
			else {
				array_push($exOption, $tpValue);
				array_push($exOptionCount, $tSum);
				$tSum=$extCount*$optionCount[$key];
				$tpValue=$extOption[1];
			}
			if($extOption[1]=='END') break;
		}

		echo "<row>\n<null/>";
		foreach ($exOption as $value) {
			echo "\n<string>";
			echo $value;
			echo "</string>";
		}
		echo "\n</row>";
		echo "\n<row>\n<string>Count</string>";
		foreach ($exOptionCount as $value){
			echo "\n<number>";
			echo $value;
			echo "</number>";
		}
		echo "\n</row>";
		break;

	case 'select':
			
	case 'checkbox':
			
	case 'radio':
		echo "<row>\n<null/>";
		foreach ($option as $value) {
			echo "\n<string>";
			echo $value;
			echo "</string>";
		}
		echo "\n</row>";
		echo "\n<row>\n<string>Count</string>";
		foreach ($optionCount as $value){
			echo "\n<number>";
			echo $value;
			echo "</number>";
		}
		echo "\n</row>";
}
?> 
</chart_data> 
<?php if($chartType!=null) echo "<chart_type>".$chartType."</chart_type>"; ?>
</chart>



