<?php
include_once "../DataBase/Connection.php";
if (isset($_POST['action'])) {
    $sql = "SELECT * FROM `products` where brands";
    if (isset($_POST['brand'])) {
        $brand_filter = implode("','", $_POST["brand"]);
        $sql .= " IN('" . $brand_filter . "')
  ";
    }

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($filter = mysqli_fetch_assoc($result)) {
?>

            <div class="col-lg-4 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img height="300px" width="300px" src="../Admin//Products_Image/<?php echo $filter['productsImage'] ?>" alt="">
                        <div class="sale pp-sale">Sale</div>
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                            <li class="quick-view"><a href="QuickView.php?p_id=<?php echo $filter['products_Id'] ?>">+ Quick View</a></li>
                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name"><?php echo $filter['brands'] ?></div>
                        <a href="#">
                            <h5><?php echo $filter['productsSubTitle'] ?></h5>
                        </a>
                        <div class="product-price">
                            <?php echo $filter['productsPrice'] ?>
                            <span><?php echo $filter['productsDisPrice'] ?></span>
                        </div>
                    </div>
                </div>
            </div>

<?php }
    }
} ?>