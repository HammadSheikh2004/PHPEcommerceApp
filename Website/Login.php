<?php
include_once "Navbar.php";
include_once "../DataBase/Connection.php";
?>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Login</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Login</h2>
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>

                    <form action="Login.php" method="post">
                        <div class="group-input">
                            <label for="username">Email address</label>
                            <input type="email" name="email" id="username">
                        </div>
                        <div class="group-input">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" id="pass">
                        </div>
                        <button type="submit" name="login" class="site-btn login-btn">Sign In</button>
                    </form>
                    <div class="switch-login">
                        <a href="Register.php" class="or-login">Or Create An Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_REQUEST['login'])) {
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $sql = "SELECT * FROM `registration` WHERE email = '$email' and pass = '$pass'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

    if (empty($email) && empty($pass)) {
        $_SESSION['message'] = "<div class='alert alert-danger'>Please Enter Email and Password.</div>";
        echo "<script>window.location.assign('Login.php')</script>";
    }if ($result['email'] != $email && $result['pass'] != $pass) {
        $_SESSION['message'] = "<div class='alert alert-danger'>Please Enter Valid Email and Password.</div>";
        echo "<script>window.location.assign('Login.php')</script>";
    }else {
        if ($result['email'] == $email && $result['pass'] == $pass) {
            $_SESSION['Id'] = $result['register_id'];
            $_SESSION['Name'] = $result['name'];
            $_SESSION['Email'] = $result['email'];
            echo "<script>window.location.assign('Index.php')</script>";
        } else {
            echo "<script>window.location.assign('Login.php')</script>";
        }
    }
}


?>





<?php
include_once "Footer.php";
?>