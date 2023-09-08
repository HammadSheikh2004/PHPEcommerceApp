<?php include_once "../DataBase/Connection.php";

$query = "SELECT * FROM dealsection";
$result = mysqli_query($conn, $query);

$currentDateTime = date('Y-m-d H:i:s');

while ($row = mysqli_fetch_assoc($result)) {
    $image = $row['Deal_Image'];
    $endDateTime = $row['Deal_Ending_Date'];
    $isHidden = $row['ststus']; 

    if ($isHidden == 1) {
        continue; 
?>

        <section class="deal-of-week set-bg spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h2>Deal Of The Week</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                                consectetur adipisicing elit </p>
                            <div class="product-price">
                                $35.00
                                <span>/ HanBag</span>
                            </div>
                        </div>
                        <div class="countdown-timer" data-end-date="<?php echo $endDateTime; ?>">
                            <div class="cd-item">
                                <span class="days">0</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span class="hours">0</span>
                                <p>Hrs</p>
                            </div>
                            <div class="cd-item">
                                <span class="minutes">0</span>
                                <p>Mins</p>
                            </div>
                            <div class="cd-item">
                                <span class="seconds">0</span>
                                <p>Secs</p>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">Shop Now</a>
                    </div>
                    <div class="col-lg-6 w-100">
                        <img src="../Admin//Products_Image/<?php echo $image ?>" class="w-100 h-65" alt="">
                    </div>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <section class="deal-of-week set-bg spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h2>Deal Of The Week</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                                consectetur adipisicing elit </p>
                            <div class="product-price">
                                $35.00
                                <span>/ HanBag</span>
                            </div>
                        </div>
                        <div class="countdown-timer" data-end-date="<?php echo $endDateTime; ?>">
                            <div class="cd-item">
                                <span class="days">0</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span class="hours">0</span>
                                <p>Hrs</p>
                            </div>
                            <div class="cd-item">
                                <span class="minutes">0</span>
                                <p>Mins</p>
                            </div>
                            <div class="cd-item">
                                <span class="seconds">0</span>
                                <p>Secs</p>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">Shop Now</a>
                    </div>
                    <div class="col-lg-6 w-100">
                        <img src="../Admin//Products_Image/<?php echo $image ?>" class="w-100 h-65" alt="">
                    </div>
                </div>
            </div>
        </section>
<?php }
} ?>





<script>
    // JavaScript code to update countdown timer
    var countdownTimers = document.querySelectorAll(".countdown-timer");

    countdownTimers.forEach(function(timer) {
        var endDate = new Date(timer.getAttribute("data-end-date")).getTime();

        var updateTimer = setInterval(function() {
            var now = new Date().getTime();
            var timeRemaining = endDate - now;

            var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

            timer.querySelector(".days").textContent = days;
            timer.querySelector(".hours").textContent = hours;
            timer.querySelector(".minutes").textContent = minutes;
            timer.querySelector(".seconds").textContent = seconds;

            if (timeRemaining < 0) {
                clearInterval(updateTimer);
                timer.innerHTML = "Deal Expired";
            }
        }, 1000); // Update every 1 second
    });
</script>