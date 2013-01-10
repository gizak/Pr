<?php
ini_set('display_errors', '0'); 
/*
 * 
 */
class count {

  private $dbh;//PDO object
    private $pdoc;//class pdoc in ./pdoc.class.php
    private $encoding;//default =gb2312

    function __construct($pdoc) {
        $this->dbh = $pdoc->getDBH();
        $this->pdoc = $pdoc;
    }
    
    function getCountRow($table){//get the table count 
        $sql="select count(*) from $table";
        $res=$this->dbh->query($sql);
        return $res->fetchColumn();
    }

    function getCountArr($i) {//fetch statistical data in a array
        $tsql = "select * from q_t where q_num=$i";
        $row = $this->pdoc->getResRow($tsql);
        if ($row)
            return $ca = unserialize($row['q_a_t']);
        else
            return FALSE;
    }

    function getCountResArr($i) {//get a percentage of statistical data array
        $cra = $this->getCountArr($i);
        $sum = 0;
        foreach ($cra as $c)
            $sum+=$c;
        foreach ($cra as $k => $c)
            $cra[$k] = (float) $c / $sum;
        return $cra;
    }


    function getExcel($order,$en="gb2312") {//print content as a table to get execl
    $tsql = "select * from q_en where order_num=$order";
    $row = $this->pdoc->getResRow($tsql);
    if ($row == FALSE)
        return FALSE;

//unserialize data from db
    if ($row['options'] != null)
        $opt = unserialize($row['options']);

//get count data
    $optc = $this->getCountResArr($order);
    $optcn = $this->getCountArr($order);

//print content
    echo "\n$order. " . iconv('utf-8', $en, $row['questions']) . "\t\n";

    foreach ($opt as $key => $str) {

        echo iconv('utf-8',$en, $str) . "\t";
        echo $optcn[$key] . "\t";
        printf("%01.2f", $optc[$key] * 100);
        echo "%\t\n";
    }
    
}
    function getprintf($order) {//print content as a html table
    $tsql = "select * from q_en where order_num=$order";
    $row = $this->pdoc->getResRow($tsql);
    if ($row == FALSE)
        return FALSE;

//unserialize data from db
    if ($row['options'] != null)
        $opt = unserialize($row['options']);

//get count data
    $optc = $this->getCountResArr($order);
    $optcn = $this->getCountArr($order);
//print content
    echo "<p>$order. " . $row['questions'] . "</p>";
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>option</th>
                <th>count</th>
                <th>percentage</th>
            </tr>
        </thead>
        <tbody><?php foreach ($opt as $key => $str) { ?>


                <tr>
                    <td><?php echo $str; ?></td>
                    <td><?php echo $optcn[$key]; ?></td>
                    <td><?php printf("%01.2f", $optc[$key] * 100); ?>%</td>
                </tr>

    <?php } ?>
        </tbody>
    </table>
    <?php }
    
}
?>
