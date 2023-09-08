<?php
include_once "../DataBase/Connection.php";
include_once "Header.php";
include_once "NotAccess.php";

if (isset($_REQUEST['deal'])) {


    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $desc = $_REQUEST['desc'];
    $sale = $_REQUEST['sale'];
    $endDate = $_REQUEST['endDate'];
    $isHidden = $_REQUEST['is_hidden'];

    // Check if a new image file is uploaded
    if ($_FILES['file']['name']) {
        $fileName = $_FILES['file']['name'];
        $tempName = $_FILES['file']['tmp_name'];
        $path = "Products_Image/" . $fileName;
        $upload = move_uploaded_file($tempName, $path);

        // Update the deal with the new image
        $sql = "UPDATE `dealsection` SET `Deal_Image`='$fileName', `Deal_Name`='$name', `Deal_Desc`='$desc', `Deal_Sale`='$sale', `Deal_Ending_Date`='$endDate', `ststus`='$isHidden' WHERE Deal_Id = $id";
    } else {
        // Update the deal without changing the image
        $sql = "UPDATE `dealsection` SET `Deal_Name`='$name', `Deal_Desc`='$desc', `Deal_Sale`='$sale', `Deal_Ending_Date`='$endDate', `ststus`='$isHidden' WHERE Deal_Id = $id";
    }
    mysqli_query($conn, $sql);
}

?>

<div class="container">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-3 text-primary">Deal Section</h2>
                    <form class="forms-sample" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = "SELECT * FROM `dealsection` WHERE Deal_Id = $id";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                        ?>
                            <div class="form-group">
                                <label for="Image">Choose Image</label>
                                <input type="file" class="form-control" name="file" id="Image">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="hidden" name="id" value="<?php echo $row['Deal_Id'] ?>">
                                <input type="text" class="form-control" name="name" value="<?php echo $row['Deal_Name'] ?>" id="exampleInputName1" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Description</label>
                                <input type="text" class="form-control" name="desc" value="<?php echo $row['Deal_Desc'] ?>" id="exampleInputName1" placeholder="Description">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Sale</label>
                                <input type="text" class="form-control" name="sale" value="<?php echo $row['Deal_Sale'] ?>" id="exampleInputName1" placeholder="Sale">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Ending Date</label>
                                <input type="date" class="form-control" name="endDate" value="<?php echo $row['Deal_Ending_Date'] ?>" id="exampleInputName1">
                            </div>
                            <div class="form-group">
                                <label for="is_hidden">Hide/Show:</label>
                                <select name="is_hidden" id="is_hidden" required>
                                    <option value="0" <?php if ($row['ststus'] == 0) echo 'selected="selected"'; ?>>Show</option>
                                    <option value="1" <?php if ($row['ststus'] == 1) echo 'selected="selected"'; ?>>Hide</option>
                                </select>
                            </div>
                            <button type="submit" name="deal" class="btn btn-primary mr-2">Deal Update</button>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Sales</th>
                    <th scope="col">Images</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql1 = "SELECT * FROM dealsection";
                $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) > 0) {
                    while ($data = mysqli_fetch_assoc($result1)) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $data['Deal_Id']; ?></th>
                            <td><?php echo $data['Deal_Name']; ?></td>
                            <td><?php echo $data['Deal_Desc']; ?></td>
                            <td><?php echo $data['Deal_Sale']; ?></td>
                            <td><?php echo $data['Deal_Ending_Date']; ?></td>
                            <td><img src="Products_Image/<?php echo $data['Deal_Image']; ?>"></td>
                            <td>
                                <a href="DealSection.php?id=<?php echo $data['Deal_Id']; ?>" class="badge badge-primary">Update Deal</a>
                            </td>
                        </tr>

                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</div>

<?php include_once "Footer.php"; ?>