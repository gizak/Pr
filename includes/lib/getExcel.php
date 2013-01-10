<?php
/*
 *You can get a excel file if you request this page in new window
 */
ini_set('display_errors', '0'); //avoid some notice print on the page
require_once '../../setup/DEFINE.php';
require_once './pdoc.class.php';
require_once './db2htm.class.php';
require_once './count.class.php';
$pdoc = new pdoc();
$count=new count($pdoc);
//you can get a excel which you assigned the encoding 
header("Content-Type: application/force-download");
header("Content-type: application/octet-stream");
header('Pragma: private');
header('Cache-control: private, must-revalidate');
header("Content-type:applicationapplication/vnd.ms-excel;charset=utf-8");
header("Content-Disposition:attachment;filename=count.xls");

if(isset($_GET['page'])){
	
	switch ($_GET['page']) {
		case 'survey':
		
			
			
			;
		break;
		
		case 'quiz':
			
			
			
			
			break;
		
		default:
			;
		break;
	}
}

if(isset ($_GET['encoding'])){
if($_GET['encoding']){
$en=$_GET['encoding'];



$end=$count->getCountRow("q_en");
for ($i = 1; $i <= $end; $i++) $count->getExcel ($i,$en);
}}
else {//first view will lead to follow:
?>
<script>
    $("#downloadexcel").click(function(){
        window.location="../includes/lib/getExcel.php?encoding="+$('input[name="enc"]').val();
        //$.ajax("../includes/lib/getExcel.php?encoding="+$('input[name="enc"]').val());
    });
</script>
<p>choice encoding:</p>
<input type="text" name="enc" value="utf-8" />
<a href="#" id="downloadexcel">Download</a>
<?php }?>
