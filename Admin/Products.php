<?php
include "Header.php";
include_once "../DataBase/Connection.php";
include_once "NotAccess.php";
?>

<div class="col-12 grid-margin stretch-card">

    <div class="card">
        <div class="card-body">
            <div class="brand">
                <form action="ProductsQuery.php" method="post">
                    <h2 class="text-center m-2">Insert Brands</h2>
                    <div class="form-group">
                        <label for="Brand">Brand</label>
                        <input type="text" class="form-control" name="brand" id="Brand" placeholder="Brands">
                        <button type="submit" name="Brand_Insert" class="btn btn-primary mt-2">Insert Brands</button>
                    </div>
                </form>
            </div>
            <hr class="border my-4">
            <h2 class="text-center mb-3">Insert Products</h2>
            <form class="forms-sample" method="POST" action="ProductsQuery.php" enctype="multipart/form-data">
                <div class="form-group">
                    <select class="form-control" name="brand_options">
                        <option>Select Brands</option>
                        <?php
                        $sql = "SELECT * FROM `brands`";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($brands = mysqli_fetch_assoc($result)) {
                        ?>
                                <option><?php echo $brands['Brand_name'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Products Sub Title</label>
                    <input type="text" class="form-control" name="subTitle" id="exampleInputName1" placeholder="Products Sub Title">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Products Price</label>
                    <input type="text" class="form-control" name="proPrice" id="exampleInputName1" placeholder="Products Price">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Products Discount Price</label>
                    <input type="text" class="form-control" name="proDisPrice" id="exampleInputName1" placeholder="Products Discount Price">
                </div>
                <div class="form-group">
                    <label for="Image">Choose Products Image</label>
                    <input type="file" class="form-control" name="file" id="Image">
                </div>
                <hr>
                <h2 class="text-center mb-3">Insert Products Details</h2>

                <div class="form-group" id="textarea">
                    <label for="textarea">Products Discription</label>
                    <textarea class="form-control" name="pro_detail" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="Image">Choose Products SubImg 1</label>
                    <input type="file" class="form-control" name="subimg1" id="Image">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Image">Choose Products SubImg 2</label>
                            <input type="file" class="form-control" name="subimg2" id="Image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Image">Choose Products SubImg 3</label>
                            <input type="file" class="form-control" name="subimg3" id="Image">
                        </div>
                    </div>
                </div>

                <button type="submit" name="Products_Insert" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
include "Footer.php";
?>