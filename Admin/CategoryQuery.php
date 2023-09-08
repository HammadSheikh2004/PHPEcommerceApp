<?php
include_once "../DataBase/Connection.php";
if (isset($_REQUEST['insertCategory'])) {
    $catName = $_REQUEST['catName'];
    $catPrice = $_REQUEST['catPrice'];
    $catDisPrice = $_REQUEST['catDisPrice'];
    $category_options = $_REQUEST['category_options'];
    $cat_detail = $_REQUEST['cat_detail'];

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

    $insertCatQuery = "INSERT INTO `category_item`(`Cat_Name`, `Cat_Price`, `Cat_Dis_Price`, `Cat_Brand`, `Cat_Image`) VALUES ('$catName','$catPrice','$catDisPrice','$category_options','$fileName')";
    mysqli_query($conn, $insertCatQuery);

    $productId = mysqli_insert_id($conn);
    $insertDetailsQuery = "INSERT INTO `category_detail`(`Cat_Detail`, `Cat_SubImg1`, `Cat_SubImg2`, `Cat_SubImg3`, `Category_Id`) VALUES ('$cat_detail','$fileName1','$fileName2','$fileName3','$productId')";
    mysqli_query($conn, $insertDetailsQuery);
    
    mysqli_close($conn);
    header("Location: Category.php");
}
if (isset($_REQUEST['category'])) {
    $categoryItems = $_REQUEST['categoryItems'];
    $insertCategoryItems = "INSERT INTO `category`(`Cat_Brands`) VALUES ('$categoryItems')";
    mysqli_query($conn, $insertCategoryItems);
    mysqli_close($conn);
    header("Location: Category.php");
}

?>