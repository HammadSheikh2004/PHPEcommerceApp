<?php
include_once "../DataBase/Connection.php";

$sql = "UPDATE checkout SET status = 'read' WHERE status = 'unread'";
if ($conn->query($sql) === TRUE) {
    echo "Notifications marked as read.";
} else {
    echo "Error marking notifications as read: " . $conn->error;
}

mysqli_close($conn);


?>