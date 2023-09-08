<?php
include_once "../DataBase/Connection.php";
include_once "Header.php";
include_once "NotAccess.php";

if (isset($_REQUEST['category_update'])) {
    $Cat_Id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $cat_price = $_REQUEST['catPrice'];
    $catDisPrice = $_REQUEST['catDisPrice'];
    $brand_options = $_REQUEST['catBrand'];
    $cat_detail = $_REQUEST['cat_detail'];

    $fileName = $_FILES['file']['name'];
    $tempName = $_FILES['file']['tmp_name'];
    $path = "Products_Image/" . $fileName;
    $upload = move_uploaded_file($tempName, $path);

    $fileName1 = $_FILES['subimg1']['name'];
    $tempName1 = $_FILES['subimg1']['tmp_name'];
    $path1 = "Products_Image/" . $fileName1;
    $upload = move_uploaded_file($tempName1, $path1);

    $fileName2 = $_FILES['subimg2']['name'];
    $tempName2 = $_FILES['subimg2']['tmp_name'];
    $path2 = "Products_Image/" . $fileName2;
    $upload = move_uploaded_file($tempName2, $path2);

    $fileName3 = $_FILES['subimg3']['name'];
    $tempName3 = $_FILES['subimg3']['tmp_name'];
    $path3 = "Products_Image/" . $fileName3;
    $upload = move_uploaded_file($tempName3, $path3);

    $updateProQuery = "UPDATE `category_item` SET `Cat_Name`='$name',`Cat_Price`='$cat_price',`Cat_Dis_Price`='$catDisPrice',`Cat_Brand`='$brand_options',`Cat_Image`='$fileName' WHERE Cat_Id = $Cat_Id";
    mysqli_query($conn, $updateProQuery);

    $updateProDetail = "UPDATE `category_detail` SET `Cat_Detail`='$cat_detail',`Cat_SubImg1`='$fileName1',`Cat_SubImg2`='$fileName2',`Cat_SubImg3`='$fileName3' WHERE `Category_Id`='$Cat_Id'";
    mysqli_query($conn, $updateProDetail);
}


if (isset($_GET['DeletePro'])) {
    $DeleteProduct = $_GET['DeletePro'];
    $deleteProDetailQuery = "DELETE FROM `category_detail` WHERE Category_Id = $DeleteProduct";
    mysqli_query($conn, $deleteProDetailQuery);
    $deleteProQuery = "DELETE FROM `category_item` WHERE `Cat_Id` = $DeleteProduct";
    mysqli_query($conn, $deleteProQuery);
}
?>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="h2 text-center text-primary bg-white rounded shadow p-2 mt-2">Display Category</div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Products Sub Title</th>
                            <th scope="col">Products Price</th>
                            <th scope="col">Products Discount Price</th>
                            <th scope="col">Product Brands</th>
                            <th scope="col">Product Detail</th>
                            <th scope="col">Products Image</th>
                            <th scope="col">Product SubImg 1</th>
                            <th scope="col">Product SubImg 2</th>
                            <th scope="col">Product SubImg 3</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM category_item INNER JOIN category_detail ON category_detail.Category_Id = category_item.Cat_Id ORDER BY category_item.Cat_Id DESC";
                        $result1 = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result1) > 0) {
                            while ($row = mysqli_fetch_assoc($result1)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['Cat_Id']; ?></td>
                                    <td><?php echo $row['Cat_Name']; ?></td>
                                    <td>Rs. <?php echo $row['Cat_Price']; ?></td>
                                    <td>Rs. <?php echo $row['Cat_Dis_Price']; ?></td>
                                    <td><?php echo $row['Cat_Brand']; ?></td>
                                    <td><?php echo $row['Cat_Detail']; ?></td>
                                    <td><img src="../Admin//Products_Image/<?php echo $row['Cat_Image']; ?>" width="70px" height="70px" alt="">
                                    </td>
                                    <td><img src="../Admin//Products_Image/<?php echo $row['Cat_SubImg1']; ?>" width="70px" height="70px" alt="">
                                    </td>
                                    <td><img src="../Admin//Products_Image/<?php echo $row['Cat_SubImg2']; ?>" width="70px" height="70px" alt="">
                                    </td>
                                    <td><img src="../Admin//Products_Image/<?php echo $row['Cat_SubImg3']; ?>" width="70px" height="70px" alt="">
                                    </td>
                                    <td>
                                        <a href="DisplayCategory.php?Editcat=<?php echo $row['Cat_Id']; ?>" class="badge badge-primary">Edit</a>
                                        <a href="DisplayCategory.php?DeletePro=<?php echo $row['Cat_Id']; ?>" onclick="return confirmDelete();" class="badge badge-danger">Delete</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="col-md-12">
        <div class="row mt-4">
            <form class="forms-sample" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <?php
                if (isset($_GET['Editcat'])) {
                    $pro_edit_id = $_GET['Editcat'];
                    $sql = "SELECT * FROM category_item INNER JOIN category_detail ON category_detail.Category_Id = category_item.Cat_Id WHERE category_item.Cat_Id = $pro_edit_id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                ?>
                    <div class="form-group">
                        <label for="exampleInputName1">Edit Products Brand</label>
                        <input type="hidden" name="id" value="<?php echo $row['Cat_Id']; ?>">
                        <input type="text" class="form-control" name="catBrand" value="<?php echo $row['Cat_Brand']; ?>" id="exampleInputName1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Products Sub Title</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $row['Cat_Name']; ?>" id="exampleInputName1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Products Price</label>
                        <input type="text" class="form-control" value="<?php echo $row['Cat_Price']; ?>" name="catPrice" id="exampleInputName1" placeholder="Products Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Products Discount Price</label>
                        <input type="text" class="form-control" name="catDisPrice" value="<?php echo $row['Cat_Dis_Price']; ?>" id="exampleInputName1" placeholder="Products Discount Price">
                    </div>
                    <div class="form-group">
                        <label for="Image">Choose Products Image</label>
                        <input type="file" class="form-control" value="<?php echo $row['Cat_Image']; ?>" name="file" id="Image">
                    </div>
                    <hr>
                    <h2 class="text-center mb-3">Insert Category Details</h2>

                    <div class="form-group" id="textarea">
                        <label for="textarea">Category Discription</label>
                        <textarea class="form-control" name="cat_detail" rows="10"><?php echo $row['Cat_Detail']; ?>
                    </textarea>
                    </div>
                    <div class="form-group">
                        <label for="Image">Choose Products SubImg 1</label>
                        <input type="file" class="form-control" value="<?php echo $row['Cat_SubImg1']; ?>" name="subimg1" id="Image">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Image">Choose Products SubImg 2</label>
                                <input type="file" class="form-control" name="subimg2" value="<?php echo $row['Cat_SubImg2']; ?>" id="Image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Image">Choose Products SubImg 3</label>
                                <input type="file" value="<?php echo $row['Cat_SubImg3']; ?>" class="form-control" name="subimg3" id="Image">
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="category_update" class="btn btn-primary mr-2">Update</button>
                <?php } ?>
            </form>
        </div>
    </div>
</div>

<?php
include_once "Footer.php";
?>