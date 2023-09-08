<?php
include_once "../DataBase/Connection.php";
session_start();

if (isset($_REQUEST['register'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $num = $_REQUEST['num'];
    $pass = $_REQUEST['pass'];

    if (empty($name) || empty($email) || empty($num) || empty($pass)) {
        $_SESSION['message'] = "<div class='alert alert-danger'>Please All The Fields.</div>";
        header("Location: Register.php");
        exit();
    } else {

        $insertQuery = "INSERT INTO `registration`(`name`, `email`, `number`,`pass`) VALUES ('$name','$email','$num','$pass')";
        $query = mysqli_query($conn, $insertQuery);
        mysqli_close($conn);
        header("Location: Index.php");
    }
}


if (isset($_REQUEST['update'])) {
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $num = $_REQUEST['num'];
    $pass = $_REQUEST['pass'];
    $updateQuery = "UPDATE `registration` SET `name`='$name',`email`='$email',`number`='$num',`pass`='$pass' WHERE `register_id`= $id";
    mysqli_query($conn, $updateQuery);
    mysqli_close($conn);
    header("Location: Index.php");
}
