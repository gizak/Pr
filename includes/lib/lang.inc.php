<?php
/*
 *basis the client's locale language to set the site's language
 * you can also send GET request: ?lang="encoding"to choose language
 */

if (isset($_GET['lang']))
    $GLOBALS['lang'] = $_GET['lang'];
elseif ($_SERVER['HTTP_ACCEPT_LANGUAGE']) {
    preg_match('/^([a-z\-]+)/i', $_SERVER ['HTTP_ACCEPT_LANGUAGE'], $matches);
    if (strstr($matches[1], "-")) {
        $lang_arr = explode("-", $matches[1]);
        $GLOBALS['lang'] = $lang_arr[0];
    }
    else
        $GLOBALS['lang'] = $matches[1];
}
else
    $GLOBALS['lang'] = "en";
define('PACKAGE', 'index');
putenv("LANG=" . $GLOBALS['lang']);
setlocale(LC_ALL, $GLOBALS['lang']);
bindtextdomain(PACKAGE, './locale');
textdomain(PACKAGE);
?>
