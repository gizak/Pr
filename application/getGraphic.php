<?php 
include '../setup/DEFINE.php';
include '../includes/lib/pdoc.class.php';
include '../includes/lib/db2htm.class.php';
include '../includes/lib/count.class.php';

$pdoc=new pdoc();
$count=new count($pdoc);

$order=$_GET['order'];
$all=$pdoc->getResRow("SELECT * FROM q_en WHERE order_num=$order");
$question=$all['questions'];
if(isset($_GET['type'])) $chartType=$_GET['type'];
else $chartType=null;
?>
<script src="../application/graphic/AC_RunActiveContent.js" language="javascript"></script>
<script language="JavaScript" type="text/javascript">
<!--
var requiredMajorVersion = 10;
var requiredMinorVersion = 0;
var requiredRevision = 45;
-->
</script>
<br />
<?php echo "<p>".$order.": ".$question."<p>";?>
<embed width="400" height="250"  type="application/x-shockwave-flash" devicefont="false" play="true" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" allowscriptaccess="sameDomain" allowfullscreen="true" menu="true" name="my_chart" flashvars="library_path=../application/graphic/charts_library&amp;xml_source=../application/graphic/swfXML.php?order=<?php echo $order.($chartType==null?'':"|$chartType"); //这特么只能通过GET传递一个值?>" src="../application/graphic/charts.swf" wmode="opaque" bgcolor="#FFFFFF" salign="TL" scale="noscale">
<noscript>
	<P>This content requires JavaScript.</P>
</noscript>
