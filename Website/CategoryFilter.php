<?php
include_once "../DataBase/Connection.php";
if (isset($_POST['action'])) {
    $sql1 = "SELECT * FROM category_item where Cat_Brand";
    if (isset($_POST['brand'])) {
        $brand_filter = implode("','", $_POST["brand"]);
        $sql1 .= " IN('" . $brand_filter . "')
  ";
    }

    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        while ($filter = mysqli_fetch_assoc($result1)) {
?>

            <div class="col-lg-4 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img height="300px" width="300px" src="../Admin//Products_Image/<?php echo $filter['Cat_Image'] ?>" alt="">
                        <div class="sale pp-sale">Sale</div>
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                            <li class="quick-view"><a href="QuickView.php?cat_id=<?php echo $filter['Cat_Id'] ?>">+ Quick View</a></li>
                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name"><?php echo $filter['Cat_Brand'] ?></div>
                        <a href="#">
                            <h5><?php echo $filter['Cat_Name'] ?></h5>
                        </a>
                        <div class="product-price">
                            RS. <?php echo $filter['Cat_Price'] ?>
                            <span><?php echo $filter['Cat_Dis_Price'] ?>%</span>
                        </div>
                    </div>
                </div>
            </div>

<?php }
    }
} ?>
