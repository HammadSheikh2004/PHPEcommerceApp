<?php
session_start();
    $id = $_GET['delete'];
    unset($_SESSION['cart'][$id]);
    header('location: Cart.php');

?>