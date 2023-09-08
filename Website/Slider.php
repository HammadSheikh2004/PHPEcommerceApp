<?php
include "../DataBase/Connection.php";
include_once "NavbarLink.php";
$query = "SELECT * FROM slider ORDER BY Id DESC";
$result = mysqli_query($conn, $query);
?>
<section class="hero-section">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $indicators = 0;
            foreach ($result as $row) {
                $active = '';
                if ($indicators == 0) {
                    $active = 'active';
                }
            ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $indicators ?>" class="<?php echo $active ?>"></li>
            <?php $indicators++;
            } ?>
        </ol>
        <div class="carousel-inner">
            <?php
            $indicators = 0;
            foreach ($result as $row) {
                $active = '';
                if ($indicators == 0) {
                    $active = 'active';
                }
            ?>
                <div class="carousel-item <?php echo $active; ?>">
                    <img class="d-block w-100" src="../Admin///Slider_Images/<?php echo $row['image'] ?>" width="100%" height="550px" alt="">
                </div>
            <?php $indicators++;
            } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>