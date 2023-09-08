<?php
include_once "../DataBase/Connection.php";
include_once "NavbarLink.php";
session_start();
?>
<style>
    .login {
        margin: 3px;
        padding: 2px;
        font-size: 20px;
    }

    .login .login-panel:hover {
        color: #e7ab3c;
    }

    .login .login-panel {
        color: black;
        margin-right: 23px;
    }

    .login .login-panel .icon {
        padding-right: 4px;
    }

    #navbar.sticky {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        width: 100%;
    }

    .active {
        background-color: #e7ab3c;
    }

    @media screen and (max-width:768px) {
        .login .login-panel .icon {
            display: none;
        }

        #navbar.sticky {
            position: sticky;
        }
    }
</style>
<header class="header-section">
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./index.html">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="input-group">
                        <input type="search" class="form-control" id="input_products" placeholder="Search the products">
                        <div class="input-group-append">
                            <button class="btn" style="color: #e7ab3c; border: 1px solid #e7ab3c;" id="loadProducts" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div id="products" class="shadow rounded" style="display: none; position: absolute; width: 80%; background-color: rgba(255, 255, 255);padding: 1rem; z-index: 1000; margin-top: 0.6rem;">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mt-2">
                    <?php
                    if (isset($_SESSION['Id']) || isset($_SESSION['Email'])) {
                    ?>
                        <div class="dropdown">
                            <i class=" fa fa-envelope"></i>
                            <button type="button" class="btn dropdown-toggle text-white" style="background-color: #e7ab3c;" data-toggle="dropdown">
                                <?php echo "Hello, " . $_SESSION['Name'] ?>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="UserUpdate.php?id=<?php echo $_SESSION['Id']; ?>">Update Your Self</a>
                                <a class="dropdown-item" href="Logout.php">Sign Out</a>
                            </div>
                        </div>
                    <?php
                    } else { ?>
                        <div class="login">
                            <a href="Register.php" class="login-panel"><i class="fa fa-user icon"></i>Register</a>
                            <a href="Login.php" class="login-panel mr-2"><i class="fa fa-user icon"></i>Login</a>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-2 text-right col-md-2">
                    <ul class="nav-right">
                        <li class="heart-icon">
                            <a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li>
                        <li class="cart-icon">
                            <a href="Cart.php">
                                <i class="icon_bag_alt"></i>
                                <span>
                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        echo  count($_SESSION['cart']);
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="nav-item" id="navbar">
        <div class="container categories" style="max-width: 1180px;">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All Categories</span>
                    <ul class="depart-hover">
                        <?php
                        $sql = "SELECT DISTINCT Cat_Brand FROM category_item";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result)) {
                            while ($category = mysqli_fetch_assoc($result)) {
                        ?>
                                <li>
                                    <a href="Category.php?categoryName=<?php echo $category['Cat_Brand'] ?>">
                                        <?php echo $category['Cat_Brand'] ?>
                                    </a>
                                </li>
                        <?php }
                        } ?>
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li><a href="Index.php">Home</a></li>
                    <li><a href="Shop.php">Shop</a></li>
                    <li><a href="Blog.php">Blog</a></li>
                    <li><a href="ContactUs.php">Contact</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row" id="showProducts" style="display: none;">
    </div>
</div>

<script>
    const navbar = document.getElementById("navbar");
    const sticky = navbar.offsetTop;
    window.addEventListener("scroll", () => {
        if (window.pageYOffset > sticky) {
            navbar.classList.add('sticky');
        } else {
            navbar.classList.remove('sticky');
        }
    });

    const currentLocation = location.href;
    const menuItem = document.querySelectorAll("nav ul li a");
    const menuLength = menuItem.length;
    for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) {
            menuItem[i].className = "active";
        }
    }

    $(document).ready(function() {
        $("#input_products").keyup(function() {
            var query = $(this).val();
            if (query !== '') {
                $.ajax({
                    type: "GET",
                    url: "LoadProducts.php",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $("#products").show();
                        $("#products").html(data);
                    }
                });
            } else {
                $("#products").empty();
                $("#products").hide();
            }
        });

    });
</script>