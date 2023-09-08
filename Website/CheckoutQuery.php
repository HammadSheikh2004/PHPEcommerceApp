<?php
session_start();
include_once "../DataBase/Connection.php";

if (isset($_REQUEST['checkout']) == true) {
    $FirstName = $_REQUEST['firstname'];
    $Street1 = $_REQUEST['street1'];
    $Street2 = $_REQUEST['street2'];
    $Postcode = $_REQUEST['postcode'];
    $City = $_REQUEST['city'];
    $Email = $_REQUEST['email'];
    $Number = $_REQUEST['num'];
    $status = 'unread';

    $checkoutQuery = "INSERT INTO `checkout`(`Firt_Name`,`Street1`, `Street2`, `PostCode`, `TownAndCity`, `Email`, `Number`,`status`) VALUES ('$FirstName','$Street1','$Street2','$Postcode','$City','$Email','$Number','$status')";
    mysqli_query($conn, $checkoutQuery);

    $checkoutId = mysqli_insert_id($conn);

    foreach ($_SESSION['cart'] as $cart_item) {
        $name = $cart_item['name'];
        $price = $cart_item['price'];
        $qty = $cart_item['qty'];
        $img = $cart_item['img'];
        $id = $cart_item['id'];
        $total = $qty * $price;
        $orderQuery = "INSERT INTO `orders`(`Name`, `price`, `image`, `qty`, `total`, `pro_id`, `checkout_Id`) VALUES ('$name','$price','$img','$qty','$total','$id','$checkoutId')";
        mysqli_query($conn, $orderQuery);
    }
    unset($_SESSION['cart']);
    $_SESSION['products_inserted'] = true;
    mysqli_close($conn);
    header("Refresh:3; url=PDF.php?id=$checkoutId");
    echo "<div class='alert alert-success'>Your Order has been Successfully Submitted.</div>";
    exit();
}
