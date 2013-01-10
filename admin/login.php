<?php
/*
 * username and password will send to ./index.php in POST.
 * 
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-CN">
    <head>
        <title> Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="stylesheet" id="login-css" href="./css/login.css" type="text/css" media="all">
                <link rel="stylesheet" id="colors-fresh-css" href="./css/colors-fresh.css" type="text/css" media="all">

                    <style type="text/css" media="screen">
                        body { font: 13px "Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif,"新宋体","宋体"; }
                        .submit input, .button, input.button, .button-primary, input.button-primary, .button-secondary, input.button-secondary, .button-highlighted, input.button-highlighted, #postcustomstuff .submit input { font-size: 12px !important; }
                    </style>

                    <meta name="robots" content="noindex,nofollow">

                        <script type="text/javascript">
                            addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
                        </script>

                        </head>
                        <body class="login">
                            <div id="login"><h1><a href="" title="Your Logo here">Gizak</a></h1>
                                <?php
                                if (!empty($_SESSION['ERRmsg']))
                                    echo "<div id='login_error'><strong>错误</strong>:  " . $_SESSION['ERRmsg'] . "<br></div>";
                                ?>

                                <form style="position: static; left: 0px;" name="loginform" id="loginform" action="index.php" method="post">
                                    <p>
                                        <label>username<br>
                                                <input name="username" id="user_login" class="input" value="" size="20" tabindex="10" type="text"></label>
                                                    </p>
                                                    <p>
                                                        <label>password<br>
                                                                <input name="password" id="user_pass" class="input" value="" size="20" tabindex="20" type="password"></label>
                                                                    </p>
                                                                    <p class="forgetmenot"><label><input name="rememberme" id="rememberme" value="forever" tabindex="90" type="checkbox"> SetCookie</label></p>
                                                                    <p class="submit">
                                                                        <input name="wp-submit" id="wp-submit" class="button-primary" value="login" tabindex="100" type="submit">
                                                                            <input name="testcookie" value="1" type="hidden">
                                                                                </p>
                                                                                </form>

                                                                                <p id="nav">
                                                                                    <a href="?action=lostpassword" title="找回密码">forget password</a>
                                                                                </p>
                                                                                </div>
                                                                                <p id="backtoblog"><a href="../" title="">←back to home</a></p>

                                                                                <script type="text/javascript">
                                                                                    function wp_attempt_focus(){
                                                                                        setTimeout( function(){ try{
                                                                                                d = document.getElementById('user_login');
                                                                                                d.value = '';
                                                                                                d.focus();
                                                                                                d.select();
                                                                                            } catch(e){}
                                                                                        }, 200);
                                                                                    }

                                                                                    if(typeof wpOnload=='function')wpOnload();
                                                                                </script>


                                                                                </body>
                                                                                </html>