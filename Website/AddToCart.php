<?php
include_once "../DataBase/Connection.php";

session_start();
$id = $_GET['pro_id'];
$name = $_GET['pro_title'];
$price = floatval($_GET['pro_price']);
$img = $_GET['pro_img'];
$qty = floatval($_GET['quantity']);
$total = $qty + $price;
$totalPrice = $qty * $price;
$cart = $_SESSION['cart'];
$_SESSION['cart'][$id] = array("id" => $id, "name" => $name, "price" => $price, "img" => $img, "qty" => $qty, "totalPrice" => $total, "orderTotal" => $totalPrice);
header("location: Shop.php");
