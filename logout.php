<?php
session_start();
session_unset();
session_destroy(); 
unset($_SESSION["admin_name"]);
header("location:index.php");
?>
