<?php
include_once "../DataBase/Connection.php";
?>
<style>
    .review-slide {
        overflow-x: hidden;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="Shop.php" class="badge mb-2 p-2 text-white" style="background-color: #e7ab3c;">Show More</a>
        </div>
    </div>
    <div class="review-slide">
        <div class="swiper-wrapper">
            <?php
            $sql = "SELECT * FROM `products` LIMIT 5";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($products = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="swiper-slide">

                        <div class="product-item">
                            <div class="pi-pic">
                                <img height="300px" width="300px" src="../Admin//Products_Image/<?php echo $products['productsImage'] ?>" alt="">
                                <div class="sale pp-sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="QuickView.php?p_id=<?php echo $products['products_Id'] ?>">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?php echo $products['brands'] ?></div>
                                <a href="#">
                                    <h5><?php echo $products['productsSubTitle'] ?></h5>
                                </a>
                                <div class="product-price">
                                    RS. <?php echo $products['productsPrice'] ?>
                                    <span><?php echo $products['productsDisPrice'] ?>%</span>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<script>
    var swiper = new Swiper(".review-slide", {
        loop: true,
        grabCursor: true,
        spaceBetween: 20,
        breakpoints: {
            450: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
</script>