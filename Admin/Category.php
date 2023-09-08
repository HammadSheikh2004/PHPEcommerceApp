<?php
include_once "../DataBase/Connection.php";
include_once "Header.php";
include_once "NotAccess.php";
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center mb-3 text-primary">Insert Category</h2>
            <form class="forms-sample" method="POST" action="CategoryQuery.php">
                <div class="form-group">
                    <label for="exampleInputName1">Category</label>
                    <input type="text" class="form-control" name="categoryItems" id="exampleInputName1" placeholder="Category Items">
                </div>
                <input type="submit" value="Insert Category" name="category" class="btn btn-primary">
            </form>

            <hr>
            <h2 class="text-center mb-3 text-primary">Insert Category Items</h2>
            <form class="forms-sample" method="POST" action="CategoryQuery.php" enctype="multipart/form-data">
                <div class="form-group">
                    <select class="form-control" name="category_options">
                        <option>Select Category</option>
                        <?php
                        $sql = "SELECT DISTINCT * FROM `category`";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($cat = mysqli_fetch_assoc($result)) {
                        ?>
                                <option><?php echo $cat['Cat_Brands'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Category Name</label>
                    <input type="text" class="form-control" name="catName" id="exampleInputName1" placeholder="Category Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Category Price</label>
                    <input type="text" class="form-control" name="catPrice" id="exampleInputName1" placeholder="Category Price">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Category Discount Price</label>
                    <input type="text" class="form-control" name="catDisPrice" id="exampleInputName1" placeholder="Category Discount Price">
                </div>
                <div class="form-group">
                    <label for="Image">Choose Category Image</label>
                    <input type="file" class="form-control" name="file" id="Image">
                </div>
                <hr>
                <h2 class="text-center mb-3">Insert Category Details</h2>

                <div class="form-group" id="textarea">
                    <label for="textarea">Category Discription</label>
                    <textarea class="form-control" name="cat_detail" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="Image">Choose Category SubImg 1</label>
                    <input type="file" class="form-control" name="subimg1" id="Image">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Image">Choose Category SubImg 2</label>
                            <input type="file" class="form-control" name="subimg2" id="Image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Image">Choose Category SubImg 3</label>
                            <input type="file" class="form-control" name="subimg3" id="Image">
                        </div>
                    </div>
                </div>

                <button type="submit" name="insertCategory" class="btn btn-primary mr-2">Insert Category</button>
            </form>
        </div>
    </div>
</div>


<?php include_once "Footer.php"; ?>