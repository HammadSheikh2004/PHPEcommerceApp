<?php
include "Header.php";
include_once "../DataBase/Connection.php";
include_once "NotAccess.php";

if (isset($_REQUEST['Products_update'])) {
    $product_Id = $_REQUEST['id'];
    $proSubTitle = $_REQUEST['subTitle'];
    $proPrice = $_REQUEST['proPrice'];
    $proDisPrice = $_REQUEST['proDisPrice'];
    $brand_options = $_REQUEST['proBrand'];
    $pro_detail = $_REQUEST['pro_detail'];

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

    $updateProQuery = "UPDATE `products` SET `productsSubTitle` = '$proSubTitle',`productsPrice` = '$proPrice',`productsDisPrice` = '$proDisPrice',`productsImage` = '$fileName',`brands` = '$brand_options'WHERE `products_Id` = $product_Id";
    mysqli_query($conn,$updateProQuery);
    
    $updateProDetail = "UPDATE `product_details` SET `pro_detail`='$pro_detail',`subImg1`='$fileName1',`subImg2`='$fileName2',`subImg3`='$fileName3' WHERE `product_id`='$product_Id'";
    mysqli_query($conn,$updateProDetail);
    mysqli_close($conn);
    header("Location: DisplayProducts.php");
}



?>

<div class="col-12 grid-margin stretch-card">

    <div class="card">
        <div class="card-body">
            <h2 class="text-center mb-3">Update Products</h2>
            <form class="forms-sample" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <?php
                if (isset($_GET['EditPro'])) {
                    $pro_edit_id = $_GET['EditPro'];
                    $sql = "SELECT * FROM products INNER JOIN product_details ON product_details.product_id = products.products_Id WHERE products.products_Id=$pro_edit_id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                ?>
                <div class="form-group">
                    <label for="exampleInputName1">Edit Products Brand</label>
                    <input type="hidden" name="id" value="<?php echo $row['products_Id']; ?>">
                    <input type="text" class="form-control" name="proBrand" value="<?php echo $row['brands']; ?>" id="exampleInputName1" placeholder="Products Brands">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Products Sub Title</label>
                    <input type="text" class="form-control" name="subTitle" value="<?php echo $row['productsSubTitle']; ?>" id="exampleInputName1" placeholder="Products Sub Title">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Products Price</label>
                    <input type="text" class="form-control" value="<?php echo $row['productsPrice']; ?>" name="proPrice" id="exampleInputName1" placeholder="Products Price">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Products Discount Price</label>
                    <input type="text" class="form-control" name="proDisPrice" value="<?php echo $row['productsDisPrice']; ?>" id="exampleInputName1" placeholder="Products Discount Price">
                </div>
                <div class="form-group">
                    <label for="Image">Choose Products Image</label>
                    <input type="file" class="form-control" value="<?php echo $row['productsImage']; ?>" name="file" id="Image">
                </div>
                <hr>
                <h2 class="text-center mb-3">Insert Products Details</h2>

                <div class="form-group" id="textarea">
                    <label for="textarea">Products Discription</label>
                    <textarea class="form-control" name="pro_detail" rows="10"><?php echo $row['pro_detail']; ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="Image">Choose Products SubImg 1</label>
                    <input type="file" class="form-control" value="<?php echo $row['subImg1']; ?>" name="subimg1" id="Image">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Image">Choose Products SubImg 2</label>
                            <input type="file" class="form-control" name="subimg2" value="<?php echo $row['subImg2']; ?>" id="Image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Image">Choose Products SubImg 3</label>
                            <input type="file" value="<?php echo $row['subImg3']; ?>" class="form-control" name="subimg3" id="Image">
                        </div>
                    </div>
                </div>

                <button type="submit" name="Products_update" class="btn btn-primary mr-2">Update</button>
                <?php }?>
            </form>
        </div>
    </div>
</div>

<?php
include "Footer.php";
?>