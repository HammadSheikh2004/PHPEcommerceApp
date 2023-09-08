<?php
include_once "../DataBase/Connection.php";
include_once "../dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = '';

if (isset($_GET['id'])) {
    $checkoutId = $_GET['id'];
    $sql = "SELECT * FROM checkout INNER JOIN orders ON orders.checkout_Id = checkout.checkout_id WHERE checkout.checkout_id = '$checkoutId'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $html .= '
    <tr>
        <th scope="row">' . $row['checkout_id'] . '</th>
        <td>' . $row['Firt_Name'] . '</td>
        <td>' . $row['Street1'] . '</td>
        <td>' . $row['Street2'] . '</td>
        <td>' . $row['PostCode'] . '</td>
        <td>' . $row['TownAndCity'] . '</td>
        <td>' . $row['Email'] . '</td>
        <td>' . $row['Number'] . '</td>
        <td>' . $row['Name'] . '</td>
        <td>' . $row['price'] . '</td>
        <td>' . $row['qty'] . '</td>
        <td>' . $row['total'] . '</td>
    </tr>
    ';
    }
}

$tableMarkup = '
<html>
<head>
</head>
<body>
<table class="table">
    <thead class="text-center">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Street no. 1</th>
            <th scope="col">Street no. 2</th>
            <th scope="col">Post Code</th>
            <th scope="col">Town and City</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Product Quantity</th>
            <th scope="col">Total Price</th>
        </tr>
    </thead>
    <tbody class="text-center border border-warning">
        ' . $html . '
    </tbody>
</table>
</body>
</html>
';

$dompdf->loadHtml($tableMarkup);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Orders.pdf", array('Attachment' => 1));

?>