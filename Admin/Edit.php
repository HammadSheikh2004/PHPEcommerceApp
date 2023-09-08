<?php
session_start();
include "../DataBase/Connection.php";
include "Header.php";
?>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center text-primary mb-3">Update Your Profile</h2>
            <form class="forms-sample" method="POST" action="InsertQuery.php" enctype="multipart/form-data">
                <?php
                if (isset($_GET['id']) == true) {
                    $id = $_GET['id'];
                    $sqlquery = "SELECT * FROM `admin` WHERE `Id`= $id";
                    $result = mysqli_query($conn, $sqlquery);
                    $rows = mysqli_fetch_assoc($result);
                ?>
                    <div class="form-group">
                        <img src="Admin_Images/<?php echo $_SESSION['AdminImage'] ?>" class="d-flex mx-auto rounded-circle" alt="">
                        <input type="file" class="form-control" name="img" value="<?php echo $rows["Image"] ?>" id="Image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="hidden" class="form-control" name="id" value="<?php echo $rows['Id']; ?>" id="name">
                        <input type="text" class="form-control" name="name" id="name" required value="<?php echo $rows["Name"]; ?>" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $rows["Email"] ?>" id="exampleInputEmail3" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" name="pass" value="<?php echo $rows["Password"] ?>" id="exampleInputPassword4" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Gender</label>
                        <input type="text" class="form-control" name="gender" value="<?php echo $rows["Gender"] ?>" id="exampleInputCity1" placeholder="Location">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" name="city" value="<?php echo $rows["City"] ?>" id="exampleInputCity1" placeholder="Location">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Role</label>
                        <input type="text" class="form-control" name="role" value="<?php echo $rows["Roles"] ?>" id="exampleInputCity1" placeholder="Location">
                    </div>
                    <button type="submit" name="profile_update" class="btn btn-primary mr-2">Submit</button>
                <?php } ?>
            </form>
        </div>
    </div>
</div>
<?php
include "Footer.php";
?>