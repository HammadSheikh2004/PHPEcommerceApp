<?php
include_once "../DataBase/Connection.php";

if (isset($_REQUEST['insertSlider']) == true) {
    $name = $_REQUEST['name'];
    $desc = $_REQUEST['desc'];
    $sale = $_REQUEST['sale'];
    
    $fileName = $_FILES['file']['name'];
    $tempName = $_FILES['file']['tmp_name'];
    $folder = "Slider_Images/" . $fileName;
    $move = move_uploaded_file($tempName,$folder);
    $query = "INSERT INTO `slider`(`name`, `desc`, `sale`, `image`) VALUES ('$name','$desc','$sale','$fileName')";
    $sql = mysqli_query($conn,$query);
    mysqli_close($conn);
    header('Location:Slider.php');
}

else if(isset($_REQUEST['EditSlider'])==true){
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $desc = $_REQUEST['desc'];
    $sale = $_REQUEST['sale'];
    $fileName = $_FILES['img']['name'];
    $tempName = $_FILES['img']['tmp_name'];
    $folder = "Slider_Images/" . $fileName;
    $move = move_uploaded_file($tempName,$folder);
    $updateQuery ="UPDATE `slider` SET 
    `name`='$name',
    `desc`='$desc',
    `sale`='$sale',
    `image`='$fileName' WHERE Id = $id";
    $update = mysqli_query($conn,$updateQuery);
    mysqli_close($conn);
    header('Location:Display_Slider_Products.php');
}

else if (isset($_REQUEST['Delete_Home_Pro'])==true) {
    $id = $_GET['Delete_Home_Pro'];
    $deleteQuery ="DELETE FROM `slider` WHERE Id = $id";
    $delete = mysqli_query($conn,$deleteQuery);
    mysqli_close($conn);
    header('Location:Display_Slider_Products.php');
}

?>
