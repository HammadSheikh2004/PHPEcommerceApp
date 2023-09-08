<?php
include_once "Navbar.php";
?>

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Register</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Register</h2>
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
                    <form action="RegisterQuery.php" method="POST">
                        <div class="group-input">
                            <label for="username">Name</label>
                            <input type="text" class="input" name="name" id="username">
                        </div>
                        <div class="group-input">
                            <label for="username">Email</label>
                            <input type="email" class="input" name="email" id="useremail">
                        </div>
                        <div class="group-input">
                            <label for="num">Phone Number</label>
                            <input type="number" class="input" name="num" id="num">
                        </div>
                        <div class="group-input">
                            <label for="pass">Password</label>
                            <input type="password" class="input" name="pass" id="pass">
                        </div>
                        <button type="submit" name="register" id="submit" disabled class="site-btn register-btn">REGISTER</button>
                    </form>
                    <div class="switch-login">
                        <a href="Login.php" class="or-login">Or Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const tags = document.querySelectorAll(".input");
    const submit = document.getElementById("submit");
    tags.forEach(tag => {
        tag.addEventListener("keyup", () => {
            let disableSubmit = true;
            tags.forEach(tag => {
                if (tag.value.trim() !== "") {
                    disableSubmit = false;
                }
            });
            submit.disabled = disableSubmit;
        });
    });
</script>



<?php
include_once "Footer.php";
?>