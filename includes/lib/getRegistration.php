<?php
/*
 * 
 */
require_once '../../setup/DEFINE.php';
require_once './pdoc.class.php';
require_once './db2htm.class.php';
require_once './count.class.php';
$pdoc = new pdoc();
$count=new count($pdoc);
$end=$count->getCountRow("p_info");
if(!isset ($_GET['action'])){
?>
<div>
    <form action="../includes/lib/getRegistration.php" method="GET">
    <input type="hidden" name="action" value="getexcel" />
    <p>Registration Number: <?php echo $end;?></p>
    Get more info:<input type="submit" value="Download Excel" name="s" />
    </form>
</div>
<?php }
elseif($_GET['action']=='getexcel'){
header("Content-Type: application/force-download");
header("Content-type: application/octet-stream");
header('Pragma: private');
header('Cache-control: private, must-revalidate');
header("Content-type:applicationapplication/vnd.ms-excel;charset=utf-8");
header("Content-Disposition:attachment;filename=Registration.xls");

$arrA=$pdoc->getResAll("select * from p_info");
echo "Email\t"."Sex\t"."Birth Date\t"."Educational background\t"."Occupation\t"."Nationality\t"."Native language\t"."Quiz\t\n";
foreach ($arrA as $v) {
    echo $v['p_email']."\t";
    echo $v['p_sex']."\t";
    echo $v['p_birth']."\t";
    echo $v['p_edu']."\t";
    echo $v['p_occ']."\t";
    echo $v['p_nation']."\t";
    echo $v['p_lang']."\t";
    $ans=unserialize($v['p_ans']);
    foreach ($ans as $va) {
        echo strtoupper($va); 
    }
    echo "\t\n";
}

}
?>
