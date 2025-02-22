<?php
include_once("./database/constants.php");

if (isset($_SESSION["userid"])) {
    session_destroy();
}

// Redirect to login page using a relative path
header("location: index.php");
exit();
?>
