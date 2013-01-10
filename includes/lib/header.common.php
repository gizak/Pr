<?php
/* * ******set header******* */
header('X-Powered-By: Powered by Gizak');
header('Content-Language: EN');
header('Content-Type: text/html;charset=utf-8');

/* * ********set locale************* */
require_once './includes/lib/lang.inc.php';
/* * *********common require****** */
require_once './setup/DEFINE.php';
require_once './includes/lib/pdoc.class.php';
require_once './includes/lib/db2htm.class.php';
require_once './includes/lib/count.class.php';

/* * **********get instance*************** */
$pdoc = new pdoc();
$count = new count($pdoc);
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo gettext("Survey on the Dream of the Red Chamber");?></title>
        <link media="screen" type="text/css" href="./includes/css/common.css" rel="stylesheet"></link>
        <link media="screen" type="text/css" href="./includes/js/jquery-ui/themes/base/jquery.ui.all.css" rel="stylesheet"></link>
        <script type="text/javascript" src="./includes/js/jQuery.min.js"></script>
        <script type="text/javascript" src="./includes/js/jquery-ui/ui/jquery.ui.core.js"></script>
        <script type="text/javascript" src="./includes/js/jquery-ui/ui/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="./includes/js/jquery-ui/ui/jquery.ui.tabs.js"></script>
        <script src="./includes/js/jquery-ui/ui/jquery.ui.button.js"></script> 
        <link rel="stylesheet" href="./includes/js/jquery-ui/demos/demos.css"></link>
        <script> 
            $(function() {
                $( "#tabs" ).tabs();
                $( ".tabs-bottom .ui-tabs-nav, .tabs-bottom .ui-tabs-nav > *" )
                .removeClass( "ui-corner-all ui-corner-top" )
                .addClass( "ui-corner-bottom" );
                $( "#lang" ).buttonset();
                $("#de,#zh,#en").click(function(){window.location.href="?lang="+$(this).attr("value")});
                $("#quiz,#reg").hide();
                $("#s_b").click(function(){
                    if($('input:radio[name="ans_1"]:checked').length==0)
                    {alert("Please finish the survey");return false;}
                    else{$("#survey").hide();$("#quiz").show();
                        alert("<?php echo gettext("Thank you for your answers. The survey now is finished. Would you also like to take part in the quiz, where you can win 1,000 Yuan Renminbi (approx. 130 USD). The winner will be notified on June 30, 2012. Decisions are final. We will try to notify everybody with the individual results of your quiz and maybe with a winner's notification.");?>");
                        return false;} 
                });
                $("#q_b").click(function(){
                    var i=1;
                    for(;i<7;i++){
                        var name="a"+i+"_";
                        var n=$('input[name="'+name+'"]:radio:checked').length;
                        if(n==0) {alert("No."+i+" question is not be selected");return false;}
                        
                    }
                    alert("<?php echo gettext("Thank you for participating in the survey. If you want to know the results and to have the chance to win 1000 Yuan, please be so kind to leave us your email address in order to be informed about the result");?>");
                    $("#quiz").hide();$("#reg").show();
                })
                $("a").button();
                $('input[name=""submit]').click(function(){
                     var search_str = /^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
                     var email_str=$('input[name="p_email"]').val();
                     if(email_str==""){alert("email can not be null");$('input[name="p_email"]').focus();return false;}
            if(!search_str.test(email_str)) {alert("please input right email");$('input[name="p_email"]').focus();return false;}
                    
                })
                //alert($('#quiz>:radio').length);
            });
        </script> 
        <style> 
            body{font-size: 70%;}
            #tabs { height: 450px; width: 700px} 
            .tabs-bottom { position: relative; } 
            .tabs-bottom .ui-tabs-panel { height: 400px; overflow: auto; } 
            .tabs-bottom .ui-tabs-nav { position: absolute !important; left: 0; bottom: 0; right:0; padding: 0 0.2em 0.2em 0; } 
            .tabs-bottom .ui-tabs-nav li { margin-top: -2px !important; margin-bottom: 1px !important; border-top: none; border-bottom-width: 1px; }
            .ui-tabs-selected { margin-top: -3px !important; }
            #intro{ width: 320px; height: 445px; padding: 0.4em; position: absolute;}
            #intro h3 { margin: 0; padding: 0.4em; text-align: center; }
            #introcontent{width: 320px;height: 415px;overflow: auto;font-size: 13px;}
        </style> 
    </head>
    <body>


