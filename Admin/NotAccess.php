<?php
if (!$_SESSION['AdminEmail']) {
    echo "<script>window.location.assign('SignIn.php')</script>";
}

?>
