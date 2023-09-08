<?php
include_once "../DataBase/Connection.php";

if (isset($_REQUEST['Products_Insert'])==true) {
    $proSubTitle = $_REQUEST['subTitle'];
    $proPrice = $_REQUEST['proPrice'];
    $proDisPrice = $_REQUEST['proDisPrice'];
    $brand_options = $_REQUEST['brand_options'];
    $pro_detail = $_REQUEST['pro_detail'];

    $fileName = $_FILES['file']['name'];
    $tempName = $_FILES['file']['tmp_name'];
    $path = "Products_Image/". $fileName;
    $upload = move_uploaded_file($tempName,$path);

    $fileName1 = $_FILES['subimg1']['name'];
    $tempName1 = $_FILES['subimg1']['tmp_name'];
    $path1 = "Products_Image/". $fileName1;
    $upload = move_uploaded_file($tempName1,$path1);

    $fileName2 = $_FILES['subimg2']['name'];
    $tempName2 = $_FILES['subimg2']['tmp_name'];
    $path2 = "Products_Image/". $fileName2;
    $upload = move_uploaded_file($tempName2,$path2);

    $fileName3 = $_FILES['subimg3']['name'];
    $tempName3 = $_FILES['subimg3']['tmp_name'];
    $path3 = "Products_Image/". $fileName3;
    $upload = move_uploaded_file($tempName3,$path3);

    $insertQuery = "INSERT INTO `products`(`productsSubTitle`, `productsPrice`, `productsDisPrice`, `productsImage`,`brands`) VALUES ('$proSubTitle','$proPrice','$proDisPrice','$fileName','$brand_options')";
    $result = mysqli_query($conn,$insertQuery);

    $productId = mysqli_insert_id($conn);
    $insertDetailsQuery = "INSERT INTO `product_details`(`pro_detail`, `subImg1`, `subImg2`, `subImg3`, `product_id`) VALUES ('$pro_detail','$fileName1','$fileName2','$fileName3','$productId')";
    mysqli_query($conn, $insertDetailsQuery);
    mysqli_close($conn);
    header("Location: Products.php");
}
else if(isset($_REQUEST['Brand_Insert'])==true){
    $brand_name = $_REQUEST['brand'];
    $BrandQuery = "INSERT INTO `brands`(`Brand_name`) VALUES ('$brand_name')";
    mysqli_query($conn,$BrandQuery);
    mysqli_close($conn);
    header("Location: Products.php");
}

?>