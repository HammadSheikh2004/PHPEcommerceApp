<?php
include_once "../DataBase/Connection.php";
?>

<div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            <?php
            $sql = "SELECT * FROM `homebanner`";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result)>0) {
                while ($data = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="../Admin//HomeBannerImage//<?php echo $data['HomeBannerImg']?>" alt="">
                    <div class="inner-text">
                        <h4><?php echo $data['Text']; ?></h4>
                    </div>
                </div>
            </div>
            <?php
                }}
            ?>
        </div>
    </div>
</div>