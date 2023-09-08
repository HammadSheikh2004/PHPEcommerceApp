<?php
include_once "../DataBase/Connection.php";
include_once "Navbar.php";

// $cat_Id = $_GET['cat_id'];
// echo $cat_Id;
// exit();
?>

<main class="detail">
    <div class="container mt-1 mb-1 p-2 bg-white border border-white w-100 h-100">
        <div class="row">
            <?php
            if (isset($_GET['p_id'])) {

                $id = $_GET['p_id'];
                $sql = "SELECT * FROM products 
            INNER JOIN product_details ON product_details.product_id = products.products_Id
            WHERE products.products_Id = '$id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
            ?>
                        <div class="col-md-4">
                            <div class="products-img">
                                <div class="img-container">
                                    <img src="../Admin//Products_Image/<?php echo $data['productsImage'] ?>" id="imgBox" class="mainImg w-100 h-100 img-fluid img-thumbnail" alt="<?php echo $data['productsSubTitle'] ?>">

                                    <div class="img-samll-container d-flex m-2 p-2 ml-2">
                                        <img src="../Admin//Products_Image/<?php echo $data['subImg1'] ?>" class="border ml-2 img-fluid img-thumbnail" onclick="imgChange(this)" width="85px" height="85px" alt="">
                                        <img src="../Admin//Products_Image/<?php echo $data['subImg2'] ?>" class="border ml-2 img-fluid img-thumbnail" onclick="imgChange(this)" width="85px" height="85px" alt="">
                                        <img src="../Admin//Products_Image/<?php echo $data['subImg3'] ?>" class="border ml-2 img-fluid img-thumbnail" onclick="imgChange(this)" width="85px" height="85px" alt="">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-8 w-100">
                            <form action="AddToCart.php" method="get">
                                <input type="hidden" name="pro_id" value="<?php echo $data['products_Id'] ?>">
                                <input type="hidden" name="pro_title" value="<?php echo $data['productsSubTitle'] ?>">
                                <input type="hidden" name="pro_price" value="<?php echo $data['productsPrice'] ?>">
                                <input type="hidden" name="pro_img" value="<?php echo $data['productsImage'] ?>">

                                <p><?php echo $data['productsSubTitle'] ?></p>
                                <p class="h5 text-black"><?php echo $data['pro_detail'] ?></p>
                                <hr>
                                <div class="price h4" style="color: #e7ab3c;" id="price">Rs.<?php echo $data['productsPrice']; ?></div>
                                <span class="h6 price-dis" style="text-decoration: line-through;">Rs.<?php echo $data['productsDisPrice']; ?>%</span>
                                <div class="increment-decrement mt-2">
                                    <span>Quantity</span>
                                    <div class="col-md-3 p-0 mt-2">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" style="color: #e7ab3c;" class="quantity-left-minus minus-btn  border btn btn-number" data-type="minus" disabled>
                                                    <span class="fa-solid fa-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-right-plus plus-btn btn btn-number border" style="color: black;" data-type="plus">
                                                    <span class="fa-solid fa-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3">You can pay <span id="totalquantity" style="font-size: 1.8rem; color: #e7ab3c;">Rs. <?php echo $data['productsPrice']; ?></span></p>

                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="text-white h4 p-2 rounded" style="background-color: #e7ab3c; border: 0;">Add to Cart</button>
                                </div>
                            </form>
                        </div>

            <?php

                    }
                }
            }
            ?>
        </div>

        <div class="row">
            <?php
            if (isset($_GET['cat_id'])) {

                $cat_Id = $_GET['cat_id'];
                $sql1 = "SELECT * FROM category_item 
            INNER JOIN category_detail ON category_detail.Category_Id = category_item.Cat_Id
            WHERE category_item.Cat_Id = '$cat_Id'";
                $result = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result) > 0) {
                    while ($cat = mysqli_fetch_assoc($result)) {
            ?>
                        <div class="col-md-4">
                            <div class="products-img">
                                <div class="img-container">
                                    <img src="../Admin//Products_Image/<?php echo $cat['Cat_Image'] ?>" id="imgBox" class="mainImg w-100 h-100 img-fluid img-thumbnail" alt="<?php echo $cat['Cat_Name'] ?>">

                                    <div class="img-samll-container d-flex m-2 p-2 ml-2">
                                        <img src="../Admin//Products_Image/<?php echo $cat['Cat_SubImg1'] ?>" class="border ml-2 img-fluid img-thumbnail" onclick="imgChange(this)" width="85px" height="85px" alt="">
                                        <img src="../Admin//Products_Image/<?php echo $cat['Cat_SubImg2'] ?>" class="border ml-2 img-fluid img-thumbnail" onclick="imgChange(this)" width="85px" height="85px" alt="">
                                        <img src="../Admin//Products_Image/<?php echo $cat['Cat_SubImg3'] ?>" class="border ml-2 img-fluid img-thumbnail" onclick="imgChange(this)" width="85px" height="85px" alt="">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-8 w-100">
                            <form action="AddToCart.php" method="get">
                                <input type="hidden" name="pro_id" value="<?php echo $cat['Cat_Id'] ?>">
                                <input type="hidden" name="pro_title" value="<?php echo $cat['Cat_Name'] ?>">
                                <input type="hidden" name="pro_price" value="<?php echo $cat['Cat_Price'] ?>">
                                <input type="hidden" name="pro_img" value="<?php echo $cat['Cat_Image'] ?>">

                                <p><?php echo $cat['Cat_Name'] ?></p>
                                <p class="h5 text-black"><?php echo $cat['Cat_Detail'] ?></p>
                                <hr>
                                <div class="price h4" style="color: #e7ab3c;" id="price">Rs.<?php echo $cat['Cat_Price']; ?></div>
                                <span class="h6 price-dis" style="text-decoration: line-through;">Rs.<?php echo $cat['Cat_Dis_Price']; ?>%</span>
                                <div class="increment-decrement mt-2">
                                    <span>Quantity</span>
                                    <div class="col-md-3 p-0 mt-2">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" style="color: #e7ab3c;" class="quantity-left-minus minus-btn  border btn btn-number" data-type="minus" disabled>
                                                    <span class="fa-solid fa-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-right-plus plus-btn btn btn-number border" style="color: black;" data-type="plus">
                                                    <span class="fa-solid fa-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3">You can pay <span id="totalquantity" style="font-size: 1.8rem; color: #e7ab3c;">Rs. <?php echo $cat['Cat_Price']; ?></span></p>

                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="text-white h4 p-2 rounded" style="background-color: #e7ab3c; border: 0;">Add to Cart</button>
                                </div>
                            </form>
                        </div>

            <?php

                    }
                }
            }
            ?>
        </div>
    </div>
</main>







<script>
    function imgChange(smallImage) {
        let fullImage = document.getElementById("imgBox");
        fullImage.src = smallImage.src;
    }

    let valueCount;
    let price = parseFloat(document.getElementById("totalquantity").innerText.split(" ")[1]);

    const calculate = () => {
        let total = valueCount * price;
        document.getElementById("totalquantity").innerText = "Rs. " + total.toFixed(2);
    };

    let plus = document.querySelector(".plus-btn");
    plus.addEventListener("click", () => {
        valueCount = parseFloat(document.querySelector("#quantity").value);
        valueCount++;
        document.querySelector("#quantity").value = valueCount;

        if (valueCount > 1) {
            document.querySelector(".minus-btn").removeAttribute("disabled");
            document.querySelector(".minus-btn").classList.remove("disabled");
        }
        calculate();
    });

    let minus = document.querySelector(".minus-btn");
    minus.addEventListener("click", () => {
        valueCount = parseFloat(document.querySelector("#quantity").value);
        valueCount--;
        document.querySelector("#quantity").value = valueCount;

        if (valueCount === 1) {
            document.querySelector(".minus-btn").setAttribute("disabled", "disabled");
        }
        calculate();
    });


    $(document).ready(function() {
        $('.mainImg').imagezoomsl();
    });
</script>












<?php include_once "Footer.php"; ?>