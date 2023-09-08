<?php
include_once "../DataBase/Connection.php";
include_once "Header.php";
include_once "NotAccess.php";
?>

<div class="container mt-3">
    <div class="row d-flex justify-content-center bg-white shadow rounded mb-4">
        <div class="col-md-12">
            <div class="h3 text-center text-primary p-2">Orders</div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row d-flex justify-content-end mb-2">
        <div class="h5">
            <form action="Export.php" method="post">
                <input type="submit" name="ExportData" class="text-primary bg-white p-2 border-primary" value="Export Order's Data">
            </form>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Street no. 1</th>
                <th scope="col">Street no. 2</th>
                <th scope="col">Post Code</th>
                <th scope="col">Town and City</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Quantity</th>
                <th scope="col">Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM checkout INNER JOIN orders ON orders.checkout_Id = checkout.checkout_id ORDER BY checkout.checkout_id DESC";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($order = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <th scope="row"><?php echo $order['checkout_id'] ?></th>
                        <td><?php echo $order['Firt_Name'] ?></td>
                        <td><?php echo $order['Street1'] ?></td>
                        <td><?php echo $order['Street2'] ?></td>
                        <td><?php echo $order['PostCode'] ?></td>
                        <td><?php echo $order['TownAndCity'] ?></td>
                        <td><?php echo $order['Email'] ?></td>
                        <td><?php echo $order['Number'] ?></td>
                        <td><?php echo $order['Name'] ?></td>
                        <td><?php echo $order['price'] ?></td>
                        <td><img src="Products_Image/<?php echo $order['image'] ?>" width="70px" height="70px" alt="<?php echo $order['Name'] ?>"> <?php echo $order['image'] ?></td>
                        <td><?php echo $order['qty'] ?></td>
                        <td><?php echo $order['total'] ?></td>

                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>





<script>
    $(document).ready(function() {
        let table = new DataTable('#myTable', {
            responsive: true,
        });
    })
</script>




<?php include_once "Footer.php"; ?>