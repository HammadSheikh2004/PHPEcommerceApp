<?php
include_once "../DataBase/Connection.php";
include_once "Navbar.php";
?>

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Update User</span>
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
                    <h2>Update Yourself</h2>
                    <form action="RegisterQuery.php" method="POST">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM `registration` WHERE register_id = $id";
                            $result = mysqli_query($conn,$sql);
                            $rows = mysqli_fetch_assoc($result);
                        ?>
                        <div class="group-input">
                            <label for="username">Name</label>
                            <input type="text" name="name" value="<?php echo $rows['name']?>" id="username">
                            <input type="hidden" name="id" value="<?php echo $rows['register_id']?>">
                        </div>
                        <div class="group-input">
                            <label for="username">Email</label>
                            <input type="email" name="email" value="<?php echo $rows['email']?>" id="username">
                        </div>
                        <div class="group-input">
                            <label for="num">Phone Number</label>
                            <input type="number" name="num" value="<?php echo $rows['number']?>" id="num">
                        </div>
                        <div class="group-input">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" value="<?php echo $rows['pass']?>" id="pass">
                        </div>
                        <button type="submit" name="update" class="site-btn register-btn">Update</button>
                        <?php }?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
include_once "Footer.php";
?>