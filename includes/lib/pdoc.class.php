<?php
/*
 *get the connect constant from DEFINE.php
 */

class pdoc {
    private $DBMS,$HOST,$DBNAME,$USR,$PWD;
    private $DSN;
    public  $DBH;
    function __construct() {
        $this->DBMS=DBMSname;
        $this->DBNAME=DBname;
        $this->HOST=DBhost;
        $this->USR=DBusr;
        $this->PWD=DBpwd;
        $this->DSN="$this->DBMS:host=$this->HOST;dbname=$this->DBNAME";
    
        try{$this->DBH=new PDO("$this->DSN", $this->USR, $this->PWD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8';"));}
        catch(PDOException $e){ 
            $this->debug();
            die("Error!: ".$e->getMessage()."<br/>");}
        
    }
    //get the pdo object
    function getDBH(){return $this->DBH;}
    //fetch the query result in a associate array 
    function getResRow($tsql,$method=PDO::FETCH_ASSOC){    
        $rs=$this->DBH->prepare($tsql);
        $rs->execute();
        $row=$rs->fetch($method);
    
        return $row;
    }
    
    function getResAll($tsql,$method=PDO::FETCH_ASSOC){
        return $this->DBH->query($tsql)->fetchAll($method);
    }

    function getExecEff($tsql){
        return $this->DBH->exec($tsql);
    }
    //debug function    
// function debug(){print($this->DSN."<BR>".$this->USR."<BR>".$this->PWD."<BR>");}
}

?>
