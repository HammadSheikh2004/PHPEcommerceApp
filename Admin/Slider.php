<?php
include "Header.php";
include_once "NotAccess.php";
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center mb-3">Insert Slider</h2>
            <form class="forms-sample" method="POST" action="SliderQuery.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Image">Choose Image</label>
                    <input type="file" class="form-control" name="file" id="Image">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Description</label>
                    <input type="text" class="form-control" name="desc" id="exampleInputName1" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">sale</label>
                    <input type="text" class="form-control" name="sale" id="exampleInputName1" placeholder="Name">
                </div>

                <button type="submit" name="insertSlider" class="btn btn-primary mr-2">Insert Slider</button>

            </form>
        </div>
    </div>
</div>










<?php
include "Footer.php";
?>