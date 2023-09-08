<?php
include_once "../DataBase/Connection.php";
include_once "Navbar.php";
?>
<style>
    .text{
        text-decoration: none;
        color: black;
        font-size: 1.5rem;
        margin-top: 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .text:hover{
        color: #e7ab3c;
    }
</style>
<div class="cart">

    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <?php
                        if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {?>
                            <h4 class=" text-center" style="color:#e7ab3c";>Card Is Empty</h4>
                            <a href="Shop.php" class="text">Continue Shopping</a>
                        <?php } else { ?>
                            <table>

                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th class="p-name">Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th><i class="ti-close"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cart = $_SESSION['cart'];
                                    $totalCartPrice = 0;
                                    foreach ($cart as $carts) {
                                        $totalPrice = $carts['qty'] * $carts['price'];
                                        $totalCartPrice += $totalPrice;
                                    ?>
                                        <tr>
                                            <td class="cart-pic first-row"><img width="70px" height="70px" src="../Admin//Products_Image/<?php echo $carts['img'] ?>" alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5><?php echo $carts['name'] ?></h5>
                                            </td>
                                            <td class="p-price first-row"><?php echo $carts['price'] ?></td>
                                            <td class="qua-col first-row">
                                                <?php echo $carts['qty'] ?>
                                            </td>
                                            <td class="total-price first-row"><?php echo $carts['qty'] * $carts['price']; ?></td>
                                            <td class="first-row"><a href="RemoveCart.php?delete=<?php echo $carts['id'] ?>" class="removeCart"><i class="ti-close"></i></a></td>
                                        </tr>
                                </tbody>
                            <?php
                                    }
                            ?>
                            </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="Shop.php" class="primary-btn continue-shop">Continue shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <?php
                            if (isset($_SESSION['Email'])) {
                            ?>
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="cart-total">Total <span><?php echo $totalCartPrice; ?></span></li>
                                    </ul>
                                    <a href="Checkout.php" class="proceed-btn">PROCEED TO CHECK OUT</a>
                                </div>

                            <?php
                            } else { ?>
                                <div class="login">
                                    <a href="Register.php" class="login-panel"><i class="fa fa-user icon"></i>Register</a>
                                    <a href="Login.php" class="login-panel mr-2"><i class="fa fa-user icon"></i>Login</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>


    </section>
</div>


<style>
    .removeCart{
        color: black;
    }

    .removeCart i:hover{
        color: #e7ab3c;
    }
</style>

<?php
include_once "Footer.php";
?>