<?php
session_start();
unset($_SESSION['AdminName']);
session_destroy();
header('location:SignIn.php');
?>