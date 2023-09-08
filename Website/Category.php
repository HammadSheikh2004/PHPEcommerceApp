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
                    <span>Category</span>
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
                    <h4 class="fw-title">Category</h4>
                    <form>
                        <?php
                        $filterQuery = "SELECT DISTINCT Cat_Brands from category";
                        $filterResult = mysqli_query($conn, $filterQuery);
                        if (mysqli_num_rows($filterResult) > 0) {
                            while ($filter = mysqli_fetch_assoc($filterResult)) {
                        ?>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="common_selector filter brand form-check-input" value="<?php echo $filter['Cat_Brands']; ?>">
                                    <label class="form-check-label"><?php echo $filter['Cat_Brands']; ?></label>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </form>
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

                   

                    <div class="row" id="displayProducts">
                        <?php
                        if (isset($_GET['categoryName'])) {
                            $cat = $_GET['categoryName'];
                            $FetchCategory = "SELECT * FROM `category_item` WHERE CAT_Brand = '$cat'";
                            $FetchCategoryResult = mysqli_query($conn, $FetchCategory);
                            if (mysqli_num_rows($FetchCategoryResult) > 0) {
                                while ($categoryItems = mysqli_fetch_assoc($FetchCategoryResult)) {
                        ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img height="300px" width="300px" src="../Admin//Products_Image/<?php echo $categoryItems['Cat_Image'] ?>" alt="">
                                                <div class="sale pp-sale">Sale</div>
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                                <ul>
                                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                    <li class="quick-view"><a href="QuickView.php?cat_id=<?php echo $categoryItems['Cat_Id'] ?>">+ Quick View</a></li>
                                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name"><?php echo $categoryItems['Cat_Brand'] ?></div>
                                                <a href="#">
                                                    <h5><?php echo $categoryItems['Cat_Name'] ?></h5>
                                                </a>
                                                <div class="product-price">
                                                    RS. <?php echo $categoryItems['Cat_Price'] ?>
                                                    <span><?php echo $categoryItems['Cat_Dis_Price'] ?>%</span>
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

                    <div class="row">
                        <?php
                        if (isset($_GET['SearchCategory'])) {
                            $Search_cat = $_GET['SearchCategory'];
                            $FetchCategory = "SELECT * FROM `category_item` WHERE CAT_Brand = '$Search_cat'";
                            $FetchCategoryResult = mysqli_query($conn, $FetchCategory);
                            if (mysqli_num_rows($FetchCategoryResult) > 0) {
                                while ($categoryItems = mysqli_fetch_assoc($FetchCategoryResult)) {
                        ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img height="300px" width="300px" src="../Admin//Products_Image/<?php echo $categoryItems['Cat_Image'] ?>" alt="">
                                                <div class="sale pp-sale">Sale</div>
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                                <ul>
                                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                    <li class="quick-view"><a href="QuickView.php?cat_id=<?php echo $categoryItems['Cat_Id'] ?>">+ Quick View</a></li>
                                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name"><?php echo $categoryItems['Cat_Brand'] ?></div>
                                                <a href="#">
                                                    <h5><?php echo $categoryItems['Cat_Name'] ?></h5>
                                                </a>
                                                <div class="product-price">
                                                    RS. <?php echo $categoryItems['Cat_Price'] ?>
                                                    <span><?php echo $categoryItems['Cat_Dis_Price'] ?>%</span>
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
                        url: "CategoryFilter.php",
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