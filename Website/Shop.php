<?php
include_once "../DataBase/Connection.php";
include_once "Navbar.php";
?>

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="Index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                <div class="filter-widget">
                    <h4 class="fw-title">Categories</h4>
                    <ul class="filter-catagories">
                        <li><a href="#">Men</a></li>
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Kids</a></li>
                    </ul>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Brand</h4>
                    <form>
                        <?php
                        $filterQuery = "SELECT DISTINCT brands from `products`";
                        $filterResult = mysqli_query($conn, $filterQuery);
                        if (mysqli_num_rows($filterResult) > 0) {
                            while ($filter = mysqli_fetch_assoc($filterResult)) {
                        ?>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="common_selector filter brand form-check-input" value="<?php echo $filter['brands']; ?>">
                                    <label class="form-check-label"><?php echo $filter['brands']; ?></label>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </form>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Price</h4>
                    <div class="filter-range-wrap">
                        <div class="range-slider">
                            <div class="price-input">
                                <input type="text" id="minamount">
                                <input type="text" id="maxamount">
                            </div>
                        </div>
                        <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="33" data-max="98">
                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                        </div>
                    </div>
                    <a href="#" class="filter-btn">Filter</a>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Color</h4>
                    <div class="fw-color-choose">
                        <div class="cs-item">
                            <input type="radio" id="cs-black">
                            <label class="cs-black" for="cs-black">Black</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-violet">
                            <label class="cs-violet" for="cs-violet">Violet</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-blue">
                            <label class="cs-blue" for="cs-blue">Blue</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-yellow">
                            <label class="cs-yellow" for="cs-yellow">Yellow</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-red">
                            <label class="cs-red" for="cs-red">Red</label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" id="cs-green">
                            <label class="cs-green" for="cs-green">Green</label>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Size</h4>
                    <div class="fw-size-choose">
                        <div class="sc-item">
                            <input type="radio" id="s-size">
                            <label for="s-size">s</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" id="m-size">
                            <label for="m-size">m</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" id="l-size">
                            <label for="l-size">l</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" id="xs-size">
                            <label for="xs-size">xs</label>
                        </div>
                    </div>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Tags</h4>
                    <div class="fw-tags">
                        <a href="#">Towel</a>
                        <a href="#">Shoes</a>
                        <a href="#">Coat</a>
                        <a href="#">Dresses</a>
                        <a href="#">Trousers</a>
                        <a href="#">Men's hats</a>
                        <a href="#">Backpack</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product-show-option">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="select-option">
                                <select class="sorting">
                                    <option value="">Default Sorting</option>
                                </select>
                                <select class="p-show">
                                    <option value="">Show:</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 text-right">
                            <p>Show 01- 09 Of 36 Product</p>
                        </div>
                    </div>
                </div>
                <div class="row" id="result" style="display: none;">
                </div>
                <div class="product-list">

                    <div class="row" id="displayProducts" <?php if (isset($_GET['id']) || isset($_GET['categoryName'])) {
                                                            echo 'style="display: none;"';} ?>>
                        <?php
                            $sql = "SELECT * FROM `products` ORDER BY products_Id DESC";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($products = mysqli_fetch_assoc($result)) {
                        ?>
                                    <div class="col-lg-4 col-sm-6">
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

                    <div class="row" <?php if (!isset($_GET['id'])) {
                                                            echo 'style="display: none;"';
                                                        } ?>>
                        <?php
                        if (isset($_GET['id'])) {
                            $products_id = $_GET['id'];
                            $sql = "SELECT * FROM `products` WHERE products_Id = $products_id ORDER BY products_Id DESC";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($products = mysqli_fetch_assoc($result)) {
                        ?>
                                    <div class="col-lg-4 col-sm-6">
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
                        }
                        ?>
                    </div>

                    

                </div>
                <div class="loading-more">
                    <i class="icon_loading"></i>
                    <a href="#">
                        Loading More
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>


<script>
    let filter = document.querySelector(".filter");
    filter.click = function() {
        if (this.checked) {
            filter = true;
        } else {
            filter = false;
        }
    }

    $(document).ready(function() {
        filter();

        $(".common_selector").click(function() {
            get_filter();
        });

        function filter() {
            $(".common_selector").click(function() {
                var brand = get_filter('brand');
                var action = "FilterData";
                if (action != "") {
                    $.ajax({
                        url: "FilterData.php",
                        method: "POST",
                        data: {
                            action: action,
                            brand: brand
                        },
                        success: function(data) {
                            if (data !== "") {
                                $("#result").html(data);
                                $("#displayProducts").hide();
                                $("#result").show();
                            } else {
                                $("#result").hide();
                                $("#displayProducts").show();
                            }
                        }
                    });
                }
            });
        }

        function get_filter(class_name) {
            let filterData = [];
            $('.' + class_name + ':checked').each(function() {
                filterData.push($(this).val());
            });
            return filterData;
        }

    });
</script>










<?php
include_once "Footer.php";
?>