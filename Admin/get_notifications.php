<?php
include_once "../DataBase/Connection.php";


$sql = "SELECT COUNT(*) as count FROM checkout WHERE status = 'unread'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $count = $row['count'];
} else {
    $count = 1;
}

$conn->close();

// Return the count in JSON format
header('Content-Type: application/json');
echo json_encode(['count' => $count]);

?>
