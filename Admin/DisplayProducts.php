<?php
include_once "../DataBase/Connection.php";
include_once "Header.php";
include_once "NotAccess.php";

if (isset($_GET['DeletePro'])) {
    $DeleteProduct = $_GET['DeletePro'];
    $deleteProDetailQuery = "DELETE FROM `product_details` WHERE `product_id` = $DeleteProduct";
    mysqli_query($conn, $deleteProDetailQuery);
    $deleteProQuery = "DELETE FROM `products` WHERE `products_Id` = $DeleteProduct";
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
            <div class="h2 text-center text-primary bg-white rounded shadow p-2 mt-2">Display Products</div>
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
                        $sql = "SELECT * FROM products INNER JOIN product_details ON product_details.product_id = products.products_Id ORDER BY products.products_Id DESC";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['products_Id']; ?></td>
                                    <td><?php echo $row['productsSubTitle']; ?></td>
                                    <td>Rs. <?php echo $row['productsPrice']; ?></td>
                                    <td>Rs. <?php echo $row['productsDisPrice']; ?></td>
                                    <td><?php echo $row['brands']; ?></td>
                                    <td><?php echo $row['pro_detail']; ?></td>
                                    <td><img src="../Admin//Products_Image/<?php echo $row['productsImage']; ?>" width="70px" height="70px" alt="">
                                    </td>
                                    <td><img src="../Admin//Products_Image/<?php echo $row['subImg1']; ?>" width="70px" height="70px" alt="">
                                    </td>
                                    <td><img src="../Admin//Products_Image/<?php echo $row['subImg2']; ?>" width="70px" height="70px" alt="">
                                    </td>
                                    <td><img src="../Admin//Products_Image/<?php echo $row['subImg3']; ?>" width="70px" height="70px" alt="">
                                    </td>
                                    <td>
                                        <a href="ProductUpdate.php?EditPro=<?php echo $row['products_Id']; ?>" class="badge badge-primary">Edit</a>
                                        <a href="DisplayProducts.php?DeletePro=<?php echo $row['products_Id']; ?>" onclick="return confirmDelete();" class="badge badge-danger">Delete</a>
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

<?php
include_once "Footer.php";
?>