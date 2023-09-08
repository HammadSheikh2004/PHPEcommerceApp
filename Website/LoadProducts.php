<?php include_once "../DataBase/Connection.php" ?>

<?php
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $sql = "SELECT DISTINCT productsSubTitle,products_Id FROM products WHERE productsSubTitle LIKE '%$query%'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>
            <div class='search-result'>
                <a href="Shop.php?id=<?php echo $row['products_Id'] ?>">
                    <h5><?php echo $row['productsSubTitle'] ?></h5>
                </a>
            </div>
            <hr>
        <?php
        }
    }

    $cat = "SELECT DISTINCT Cat_Name,Cat_Id,Cat_Brand FROM category_item WHERE Cat_Name LIKE '%$query%'";
    $cat_Result = mysqli_query($conn, $cat);
    if (mysqli_num_rows($cat_Result) > 0) {
        while ($category = mysqli_fetch_assoc($cat_Result)) {
        ?>
            <div class='search-result'>
                <a href="Category.php?SearchCategory=<?php echo $category['Cat_Name'] ?>">
                    <h5><?php echo $category['Cat_Name'] ?></h5>
                </a>
            </div>
            <hr>
    <?php
        }
    }
} else {
    ?>

    <div class='search-result'>
        <h5>No Data Found.</h5>
    </div>
<?php
}
?>

<style>
    .search-result h5 {
        color: #e7ab3c;
    }

    .search-result h5:hover {
        color: black;
    }
</style>

<!-- #e7ab3c -->