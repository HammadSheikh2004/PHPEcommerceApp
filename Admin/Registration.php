<?php
include "Header_Links.php";
session_start();
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center mb-3">Register YourSelf</h2>
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
            <form class="forms-sample mt-3" method="POST" action="InsertQuery.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail3" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Password</label>
                    <input type="password" class="form-control" name="pass" id="exampleInputPassword4" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">Gender</label>
                    <input type="text" class="form-control" name="gender" id="exampleInputCity1" placeholder="Location">
                </div>
                <div class="form-group">
                    <label for="Image">Choose Image</label>
                    <input type="file" class="form-control" name="file" id="Image">
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">City</label>
                    <input type="text" class="form-control" name="city" id="exampleInputCity1" placeholder="Location">
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">Role</label>
                    <input type="text" class="form-control" name="role" id="exampleInputCity1" placeholder="Location">
                </div>
                <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>

                <b>
                    <p class="mt-4">You have an account so <a href="SignIn.php" class="text-decoration-none">Sign in</a> Now.</p>
                </b>
            </form>
        </div>
    </div>
</div>