<?php
include_once("./database/constants.php");
session_start(); // Ensure session is started

if (!isset($_SESSION["userid"])) {
    header("location: index.php"); // Redirect to the login page using a relative path
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventory Management System</title>

    <!-- External Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/97c02f89cd.js"></script>

    <!-- External Stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./includes/style.css">

    <!-- Custom Script -->
    <script type="text/javascript" src="./js/manage.js"></script>
</head>

<body>

    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
    <br /><br />
    <div class="container">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>NO:</th>
                    <th>Category</th>
                    <th>Parent</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="get_category">
                <!-- Category rows will be populated dynamically -->
            </tbody>
        </table>
    </div>

    <!-- Update Category Modal -->
    <?php include_once("./templates/update_catagory.php"); ?>

</body>

</html>
