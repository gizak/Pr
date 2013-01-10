<?php
/*
 *print survey questions from db to html
 */
class db2htm {

    static function printContent($order, $pdoc, $count) {
        switch ($GLOBALS['lang']) {
            case 'en':$table = "q_en";
                break;
            case 'zh':$table = "q_zh";
                break;
            case 'de':$table = 'q_de';
                break;
            default:
                $table = 'q_en';
                break;
        }
        $tsql = "select * from " . $table . " where order_num=$order";
        $row = $pdoc->getResRow($tsql);
        if ($row === FALSE)
            return FALSE;

//unserialize data from db
        if (!empty($row['options']))
            $row['options'] = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $row['options']);
        $opt = unserialize($row['options']);
        $label = explode("|", $row['add']);
//print content
        echo "<p><b>$order. " . $row['questions'] . "</b></p>";

        switch ($row['type']) {
            case "text":
                echo "<input type='text' name='ans_text_" . $row['order_num'] . "' value='ans' /> ";
                break;
            case "radio":
                //var_dump(serialize(array('s1','s2','s3')));
                //var_dump($row['options']);
                if (is_array($opt)) {
                    foreach ($opt as $key => $str) {
                        echo $label[0] . "<input type='radio' name='ans_";
                        echo $row['order_num'];
                        echo "' value=" . $key . " />";
                        echo $label[1] . $str . $label[2];
                    }
                    break;
                }
            case "select":
                echo $label[0] . "<select name='ans_" . $row['order_num'] . "'>";
                foreach ($opt as $key => $str) {
                    echo "<option value='" . $key . "'>" . $str;
                    echo "</option>";
                }
                echo "</select>" . $label[1];
                break;

            case "checkbox":
                foreach ($opt as $key => $str) {
                    echo $label[0] . "<input type='checkbox' name='ans_";
                    echo $row['order_num'];
                    echo "[]' value=" . $key . " />";
                    echo $label[1] . $str . $label[2];
                }
                break;
            case 'multi_select&str':
                $ci = 0;
                $pvalue = substr($opt[0], strpos($opt[0], "|") + 1);
                $parr = array();
                foreach ($opt as $str) {
                    $ex_str = explode("|", $str);
                    if ($ex_str[1] == $pvalue)
                        array_push($parr, $ex_str[0]);
                    else
                        break;
                }
                array_push($opt, "0|end");
                foreach ($opt as $key => $str) {
                    $ex_str = explode("|", $str);
                    if ($ex_str[1] != $pvalue) {
                        echo "<p>" . $label[0];
                        echo "<select name='ans_multi_" . $row['order_num'] . "[]'>";
                        for ($i = 0; $i < $key - $ci; $i++) {
                            echo "<option value='" . ($ci + $i) . "'>" . $parr[$i];
                            echo "</option>";
                        }
                        echo "</select>" . $label[1] . "$pvalue$label[2]</p>";
                        $ci = $key;
                        $pvalue = $ex_str[1];
                    }
                }
                break;
            case 'multi_str&select':
                $ci = 0;
                $pvalue = substr($opt[0], 0, strpos($opt[0], "|"));
                $parr = array();
                foreach ($opt as $str) {
                    $ex_str = explode("|", $str);
                    if ($ex_str[0] == $pvalue)
                        array_push($parr, $ex_str[1]);
                    else
                        break;
                }
                array_push($opt, "end|0");
                foreach ($opt as $key => $str) {
                    $ex_str = explode("|", $str);
                    if ($ex_str[0] != $pvalue) {
                        echo "<p>" . $label[0] . $pvalue . $label[1];
                        echo "<select name='ans_multi_" . $row['order_num'] . "[]'>";
                        for ($i = 0; $i < $key - $ci; $i++) {
                            echo "<option value='" . ($ci + $i) . "'>" . $parr[$i];
                            echo "</option>";
                        }
                        echo "</select>" . "$label[2]</p>";
                        $ci = $key;
                        $pvalue = $ex_str[0];
                    }
                }
                break;
            case "other":
	      //if basic mode can not fill the request,you can add extend mode in ./application/extend/ex_q_*.php
                require_once './application/extend/ex_q_' . $order . '.php';
                break;
        }
        return TRUE;
    }

}

?>
