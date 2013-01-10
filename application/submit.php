<?php
/*
 * All form data post to here,include survey,quiz,registration.
 * 
 */
ini_set('display_errors', '0'); //avoid some notice print on the page
require_once '../setup/DEFINE.php';
require_once '../includes/lib/pdoc.class.php';
require_once '../includes/lib/htm2db.class.php';
$pdoc = new pdoc();
$tsql = "select count(*) from p_info where p_email='" . $_POST['p_email'] . "'";
$res = $pdoc->getDBH()->query($tsql);
if ($res->fetchColumn() > 0){
    echo "This Email has already exist";}
else{
    htm2db::saveData($pdoc);
$astr = array("p_email", "p_sex", "p_birth", "p_edu", "p_occ", "p_nation", "p_lang");
foreach ($astr as $value) {
    if(isset($_POST[$value])){
    if ($_POST[$value]!='')
        switch ($value) {
            case 'p_email':
                echo "<br />Email:" . $_POST[$value];
                break;
            case 'p_sex':
                echo "<br />Sex:" . $_POST[$value];
                break;
            case 'p_birth':
                echo "<br />Birth date:" . $_POST[$value];
                break;
            case 'p_edu':
                echo "<br />Educational background:" . $_POST[$value];
                break;
            case 'p_occ':
                echo "<br />Occupation:" . $_POST[$value];
                break;
            case 'p_nation':
                echo "<br />nationality:" . $_POST[$value];
                break;
            case 'p_nation':
                echo "<br />language:" . $_POST[$value];
                break;
        }
}
}
}
//You can add other info follow:
?>
<br />
All done!
<br />
Thank you for participating in the survey.
<br />
other info...
<br />
