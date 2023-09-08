<?php
include "Header.php";
include_once "NotAccess.php";
include_once "../DataBase/Connection.php";
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center mb-3">Update Slider Products</h2>
            <form class="forms-sample" method="POST" action="SliderQuery.php" enctype="multipart/form-data">
                <?php
                if (isset($_GET['Edit_Home_Pro']) == true) {
                    $id = $_GET['Edit_Home_Pro'];
                    $query = "SELECT * FROM `slider` WHERE Id = $id";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                }
                ?>
                <div class="form-group">
                    <label for="Image">Choose Image</label>
                    <input type="file" class="form-control" value="<?php echo $row['image']?>" name="img" id="Image">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="hidden" name="id" value="<?php echo $row['Id']?>">
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>" id="exampleInputName1" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Description</label>
                    <input type="text" class="form-control" name="desc" value="<?php echo $row['desc']?>" id="exampleInputName1" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">sale</label>
                    <input type="text" class="form-control" name="sale" value="<?php echo $row['sale']?>" id="exampleInputName1" placeholder="Name">
                </div>

                <button type="submit" name="EditSlider" class="btn btn-primary mr-2">Update Home Slider</button>
            </form>
        </div>
    </div>
</div>

<?php
include "Footer.php";
?>