<?php 

include_once "../DataBase/Connection.php";

if (isset($_POST['ExportData'])) {
    header("Content-type: text/csv; charset=utf-8");
    header("Content-Disposition: attachment; filename=OrdersBill.csv");
    $output =  fopen("php://output", "w");
    fputcsv($output, array('checkout_id','Firt_Name','Last_Name','Street1','Street2','PostCode','TownAndCity','Email','Number','status','order_id','Name','price','image','qty','total','pro_id','checkout_Id'));
    $sql = "SELECT * FROM checkout INNER JOIN orders ON orders.checkout_Id = checkout.checkout_id ORDER BY checkout.checkout_id DESC";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output,$row);
    }
    fclose($output);
}

?>