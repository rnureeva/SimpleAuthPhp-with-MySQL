<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/main_menu.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/functionCreator.php');

if(!isAuthUser() && (($_SERVER['REQUEST_URI']) != '/?login=yes') && (($_SERVER['REQUEST_URI']) != '/?chao')&& (($_SERVER['REQUEST_URI']) != '/')) {
    header('Location: /?login=yes');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project</title>
</head>

<body>

    <div class="header">
        <div class="logo"><img src="/images/logo.png" width="68" height="23" alt="Project"></div>
        <div class="clearfix"></div>
    </div>
    <ul class="link-type">
        <? if (!isAuthUser()): ?>
        <li><a href="/?login=yes">Authorization</a></li>
        <? elseif (isAuthUser()): ?>
        <li><a href="/?chao">Log out</a></li>
     <? endif; ?>
    </ul>
    <div class="clear">
            <?php
            functionCreator($array, "main-menu", $sort = SORT_ASC);
            ?>
    </div>
