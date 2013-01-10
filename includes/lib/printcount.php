<?php
/*
 *print statistical data as a table
 *use class count->getprintf($num)
 */
require_once '../../setup/DEFINE.php';
require_once './pdoc.class.php';
require_once './db2htm.class.php';
require_once './count.class.php';
$pdoc = new pdoc();
$count=new count($pdoc);
$end=$count->getCountRow("q_en");
?>

<?php
for ($i = 1; $i <= $end; $i++)  $count->getprintf($i);
?>

