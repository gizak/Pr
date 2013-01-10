<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// echo "here";
$ci=0;
$pvalue="中文本";
array_push($opt, "产生结尾|0");
foreach ($opt as $key => $str){
    $ex_str=explode("|", $str);
    if($ex_str[0]!=$pvalue){
        echo "<p>$pvalue: ";
        echo "<select name='ans_other_".$row['order_num']."[]'>";
        for($i=0;$i<$key-$ci;$i++){
            echo "<option value='" . ($ci+$i) . "'>" . $i."次";
            echo "</option>";
        }
        echo "</select></p>";
        $ci=$key;
        $pvalue=$ex_str[0];
    }
}
unset ($ci,$pvalue);
?>
