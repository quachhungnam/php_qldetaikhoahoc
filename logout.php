<?php
session_start();
session_destroy();
header('location:index.php');
// header('Location: '.$_SERVER['PHP_SELF']);  
?>