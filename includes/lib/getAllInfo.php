<?php
require_once '../../setup/DEFINE.php';
require_once './pdoc.class.php';
require_once './db2htm.class.php';
require_once './count.class.php';

$pdoc = new pdoc();
$count=new count($pdoc);
$end_q=$count->getCountRow("q_en");
$end_p=$count->getCountRow("p_info");
?>
<p>Questions Number: <?php echo $end_q;?></p>
<p>Registration Number: <?php echo $end_p;?></p>
<p>Include Language: zh;en;de</p>
