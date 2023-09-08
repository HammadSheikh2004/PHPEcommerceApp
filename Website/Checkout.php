<?php
include_once "../DataBase/Connection.php";
include_once "Navbar.php";
include_once "NotAccess.php";
?>

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="Index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="Shop.php">Shop</a>
                    <span>Check Out</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="checkout-section spad">
    <div class="container">
        <form action="CheckoutQuery.php" class="checkout-form">
            <div class="row d-flex justify-content-center mb-3 ">
                <div class="h2 text-center bg-white shadow p-2 w-100">Check Out Process</div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h4>Biiling Details</h4>
                    <div class="row">
                        <?php
                        if ($_SESSION['Name'] || isset($_SESSION['Email'])) {
                        ?>
                            <div class="col-lg-6">
                                <label for="fir">First Name<span>*</span></label>
                                <input type="text" name="firstname" value="<?php echo $_SESSION['Name'] ?>" id="fir">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address<span>*</span></label>
                                <input type="email" name="email" value="<?php echo $_SESSION['Email'] ?>" id="email">
                            </div>
                        <?php
                        }
                        ?>
                        <div class="col-lg-12">
                            <label for="phone">Phone<span>*</span></label>
                            <input type="number" name="num" id="phone">
                        </div>
                        <div class="col-lg-12">
                            <label for="street">Street Address<span>*</span></label>
                            <input type="text" id="street" name="street1" class="street-first">
                            <input type="text" name="street2">
                        </div>
                        <div class="col-lg-12">
                            <label for="zip">Postcode / ZIP</label>
                            <input type="text" name="postcode" id="zip">
                        </div>
                        <div class="col-lg-12">
                            <label for="town">Town / City<span>*</span></label>
                            <input type="text" name="city" id="town">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="place-order">
                        <h4>Your Order</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <?php
                                if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) { ?>
                                    <h4 class=" text-center" style="color:#e7ab3c" ;>Card Is Empty</h4>
                                    <?php } else {
                                    $cart = $_SESSION['cart'];
                                    $totalCartPrice = 0;
                                    foreach ($cart as $carts) {
                                        $totalPrice = $carts['qty'] * $carts['price'];
                                        $totalCartPrice += $totalPrice;
                                    ?>
                                        <li>Product <span>Total</span></li>
                                        <li class="fw-normal"><img width="40px" height="40px" src="../Admin//Products_Image/<?php echo $carts['img'] ?>" alt="<?php echo $carts['name'] ?>"><?php echo $carts['name'] ?><span>Rs. <?php echo $carts['price'] ?></span></li>
                                        <li class="total-price">Quantity <span><?php echo $carts['qty'] ?></span></li>
                                        <li class="total-price">Total <span>Rs. <?php echo $carts['qty'] * $carts['price']; ?></span></li>
                                        <p class="mt-4">SubTotal:</p>
                                        <li class="h3">Rs. <?php echo $totalCartPrice; ?></li>
                                    <?php } ?>
                            </ul>

                            <div class="payment-check">
                                <div class="pc-item">
                                    <label for="pc-check">
                                        Cheque Payment
                                        <input type="checkbox" id="pc-check">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="pc-item">
                                    <label for="pc-paypal">
                                        Paypal
                                        <input type="checkbox" id="pc-paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="order-btn">
                                <button type="submit" name="checkout" class="site-btn place-btn">Place Order</button>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php


include_once "Footer.php";
?>