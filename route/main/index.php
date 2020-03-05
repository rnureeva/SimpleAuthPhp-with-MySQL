<?php 
session_start();
require ($_SERVER['DOCUMENT_ROOT'].'/template/header.php');
$name = giveTitle($_SERVER['REQUEST_URI'],$array);
?>
<h1><?=$name;?></h1>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/template/footer.php'); ?>