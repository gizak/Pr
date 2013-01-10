<?php
/*
 * check username and password
 * default username is 'admin' ,So is password.
 */
if(!isset ($_POST['username'],$_POST['password']))   { header("Location:login.php");}
else{
if (!($_POST['username'] == "admin" && $_POST['password'] == "admin"))
header("Location:login.php");
}
?>
<?php
header('X-Powered-By: Powered by Gizak');
header('Content-Language: EN');
header('Content-Type: text/html;charset=utf-8');
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>AdminPanel</title> 
        <link rel="stylesheet" href="../includes/js/jquery-ui/themes/base/jquery.ui.all.css"> 
        <link rel="stylesheet" href="./css/index.css"> 
        <script src="../includes/js/jQuery.min.js"></script> 
        <script src="../includes/js/jquery-ui/ui/jquery.ui.core.js"></script> 
        <script src="../includes/js/jquery-ui/ui/jquery.ui.widget.js"></script> 
        <script src="../includes/js/jquery-ui/ui/jquery.ui.button.js"></script> 
        <link rel="stylesheet" href="../includes/js/jquery-ui/demos/demos.css"> 
        <script> 
            $(function() {
                $( "a" ).button();
                $("#getsurvey").click(function(){
                    $("#contentbody").load('../includes/lib/printcount.php');
                    return false;
                })
                $("#getexcel").click(function(){
                    $("#contentbody").load('../includes/lib/getExcel.php');
                    return false;
                })
                $("#getregistration").click(function(){
                    $("#contentbody").load('../includes/lib/getRegistration.php');
                    return false;
                })
                $("#getallinfo").click(function(){
                    $("#contentbody").load('../includes/lib/getAllInfo.php');
                    return false;
                })
                $("#getgraphic").click(function(){
					$("#contentbody").load('../application/getGraphicUI.php');
					return false;
                    })
            });
        </script> 
    </head> 
    <body>
        <div id="head">
            <h1 align="middle">Admin Panel</h1>
        </div>
        <div id="content">
            <ul id="nav">
                <li><a id="getallinfo" href="#">All Info</a></li>
                <br />
                <li><a id="getexcel" href="#">Get Excel</a></li>
                <br />
                <li><a id="getsurvey" href="#">Survey Info</a></li>
                <br />
                <li><a id="getregistration" href="#">Registration Info</a></li>
                <br />
                <li><a id="getgraphic" href="#">Get Graphic</a></li>
                <br />
            </ul>
            <div id="contentbody">
                <h2 align="center">Welcome</h2>
            </div>
        </div>


        <div id="foot">

        </div>
    </body>
</html>