<?php
/**
 *get data from form and save them to db
 */
class htm2db {

  static function post2arr() {//Deal data which from survey questions into a array
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                $tk=explode("_", $key);
                $sk = array_pop($tk);

                if (!is_array($value)) {

                    if (is_numeric($sk)) {
                        if (strstr($key, "ans_text")) {
                            $ans[(int) $sk] = "$value";
                        } else {
                            $ans[(int) $sk][$value] = 1;
                        }
                    }
                } else {
                    $rear = count($value) - 1;
                    for ($i = 0; $i <= $rear; $i++)
                        (array) $ans[(int) $sk][(int) $value[$i]] = 1;

                }
            }

            return $ans;

        }
    }

    static function saveData($pdoc) {

      //save survey data 
        $ans = self::post2arr();

        $tsql = "select * from q_t";
        $dbrs = $pdoc->getResAll($tsql);
        foreach ($dbrs as $value) {
            $value['q_a_t'] = unserialize($value['q_a_t']);

            foreach ($value['q_a_t'] as $k => $v) {
                if (isset($ans[$value['q_num']][$k]))
                    $value['q_a_t'][$k]+=1;
            }

            $value['q_a_t'] = serialize($value['q_a_t']);
            $tsql = "update q_t set q_a_t='" . $value['q_a_t'] . "' where q_num=" . $value['q_num'];
            $pdoc->getExecEff($tsql);
        }
	//save quiz and personal information
        $a = array();
        foreach ($_POST as $k => $v) {
            if (strlen($k) == 3 && (int) substr($k, -1) == 0) {
                $a[(int) substr($k, 1, 1)] = $v;
            }
        }

        $a = serialize($a);
        if(!isset($_POST['p_sex'])) $_POST['p_sex']=null;
         $tsql = "insert into p_info values('" . $_POST['p_email'] . "','" . $_POST['p_sex'] . "','" . $_POST['p_birth'] . "','" . $_POST['p_edu'] . "','" . $_POST['p_occ'] . "','" . $_POST['p_nation'] . "','" . $_POST['p_lang'] . "','" . $a . "')";
        try {
             $pdoc->getExecEff($tsql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>
