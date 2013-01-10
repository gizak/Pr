<script type="text/javascript">
<!--
$("#buttonSelect").click(function(){
	$("#perform").load('../application/getGraphic.php?order='+$("#inputOrderSelect").val()+'&type='+$("#inputTypeSelect").val());
})
//-->
</script>
<div id="select">
<br />
Input question number here:
<input id="inputOrderSelect" value="1" />
Graphic Type:
<input id="inputTypeSelect" value="bar" />
<button id="buttonSelect">viewGraphic</button>
</div>

<div id=perform>

</div>