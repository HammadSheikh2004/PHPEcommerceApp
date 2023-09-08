<?php
include_once "Header.php";
include_once "NotAccess.php";
include_once "../DataBase/Connection.php";
?>

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
        $sql = "SELECT * FROM slider ORDER BY Id DESC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <th scope="row"><?php echo $data['Id']; ?></th>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['desc']; ?></td>
                    <td><?php echo $data['sale']; ?></td>
                    <td><img src="Slider_Images/<?php echo $data['image']; ?>"></td>
                    <td>
                        <a href="Edit_Slider.php?Edit_Home_Pro=<?php echo $data['Id']; ?>" class="badge badge-primary">Edit Product</a>

                        <a href="SliderQuery.php?Delete_Home_Pro=<?php echo $data['Id']; ?>" class="badge badge-primary">Delete Product</a>
                    </td>
                </tr>

        <?php
            }
        }
        ?>
    </tbody>
</table>




<?php
include_once "Footer.php";
?>