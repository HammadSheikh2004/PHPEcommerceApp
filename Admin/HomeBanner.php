<?php
include_once "Header.php";
include_once "NotAccess.php";
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center mb-3">Insert Home Banner</h2>
            <form class="forms-sample" method="POST" action="HomeBannerQuery.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Image">Choose Image</label>
                    <input type="file" class="form-control" name="file" id="Image">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Banner Text</label>
                    <input type="text" class="form-control" name="text" id="exampleInputName1" placeholder="Banner Text">
                </div>
                <button type="submit" name="insertHomeBanner" class="btn btn-primary mr-2">Insert banner</button>
            </form>
        </div>
    </div>
</div>

<?php
include_once "Footer.php";
?>