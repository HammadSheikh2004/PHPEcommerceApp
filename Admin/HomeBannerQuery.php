<?php
include_once "../DataBase/Connection.php";

if (isset($_REQUEST['insertHomeBanner'])==true) {
    $text = $_REQUEST['text'];
    $fileName = $_FILES['file']['name'];
    $tempName = $_FILES['file']['tmp_name'];
    $folder = "HomeBannerImage/".$fileName;
    $move = move_uploaded_file($tempName,$folder);
    $query = "INSERT INTO `homebanner`(`HomeBannerImg`, `Text`) VALUES ('$fileName','$text')";
    mysqli_query($conn,$query);
    mysqli_close($conn);
    header('Location:HomeBanner.php');
}

?>