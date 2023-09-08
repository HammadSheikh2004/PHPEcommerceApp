<?php
include_once "../DataBase/Connection.php";
session_start();

if (isset($_REQUEST['submit'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $gender = $_REQUEST['gender'];
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "Admin_Images/" . $filename;
    $image = move_uploaded_file($tempname, $folder);
    $city = $_REQUEST['city'];
    $role = $_REQUEST['role'];

    if (empty($name) || empty($email) || empty($pass) || empty($gender) || empty($filename) || empty($image) || empty($city) || empty($role)) {
        $_SESSION['message'] = "<div class='alert alert-danger'>Please All The Fields.</div>";
        header("Location: Registration.php");
        exit();
    } else {
        $sql = "INSERT INTO `admin`(`Name`, `Email`, `Password`, `Gender`, `Image`, `City`, `Roles`) VALUES ('$name','$email','$pass','$gender','$filename','$city','$role')";

        $query = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location:Registration.php');
    }
}

if (isset($_REQUEST['profile_update']) == true) {
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $gender = $_REQUEST['gender'];

    $filename = $_FILES["img"]["name"];
    $tempname = $_FILES["img"]["tmp_name"];
    $folder = "Admin_Images/" . $filename;
    $image = move_uploaded_file($tempname, $folder);


    $city = $_REQUEST['city'];
    $role = $_REQUEST['role'];

    $sql = "UPDATE `admin` SET `Name`='$name',`Email`='$email',`Password`='$pass',`Gender`='$gender',`Image`='$filename',`City`='$city',`Roles`='$role' WHERE `Id` = $id";

    $query = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header('location:Index.php');
}
