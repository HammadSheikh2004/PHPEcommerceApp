<?php
session_start();
unset($_SESSION['Name']);
session_destroy();
header('location:Index.php');
?>