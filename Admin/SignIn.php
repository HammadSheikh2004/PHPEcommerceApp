<?php
session_start();
include "Header_Links.php";
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center mb-3">SignIn YourSelf</h2>
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
            <form class="forms-sample mt-3" method="POST" action="SignIn.php">
                <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail3" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Password</label>
                    <input type="password" class="form-control" name="pass" id="exampleInputPassword4" placeholder="Password">
                </div>
                <button type="submit" name="login" class="btn btn-primary mr-2">SignIn Now</button>

                <b>
                    <p class="mt-4">You have not an account so <a href="Registration.php" class="text-decoration-none">Register</a> YourSelf Now.</p>
                </b>
            </form>
        </div>
    </div>
</div>

<?php
include_once "../DataBase/Connection.php";

if (isset($_REQUEST['login'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['pass'];
    $sql = "Select * from admin where Email='$email' and Password='$password'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

    if (empty($email) || empty($password)) {
        $_SESSION['message'] = "<div class='alert alert-danger'>Please Enter Email and Password.</div>";
        echo "<script>window.location.assign('SignIn.php')</script>";
        exit();
    }
    if (isset($result['Email']) != $email || isset($result['Password']) != $password) {
        $_SESSION['message'] = "<div class='alert alert-danger'>Email and Password does not match. Please Fill Correct Email and Password.</div>";
        echo "<script>window.location.assign('SignIn.php')</script>";
        exit();
    }else {
        if (isset($result['Email']) == $email || isset($result['Password']) == $password) {
            if (isset($result['Roles']) == 'Admin') {
                $_SESSION['AdminId'] = $result['Id'];
                $_SESSION['AdminName'] = $result['Name'];
                $_SESSION['AdminEmail'] = $result['Email'];
                $_SESSION['AdminImage'] = $result['Image'];
                echo "<script>window.location.assign('Index.php')</script>";
            }
        } elseif ($result['Roles'] == 'User') {
            $_SESSION['UserId'] = $result['Id'];
            $_SESSION['UserName'] = $result['Name'];
            $_SESSION['UserEmail'] = $result['Email'];
            header('location:Index.php');
        } else {
            header('location:SignIn.php');
        }
    }
}










?>