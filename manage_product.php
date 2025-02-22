<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
    header("location: index.php"); // Redirect to login page using a relative path
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

    <!-- Custom Scripts -->
    <script type="text/javascript" src="./js/manage.js"></script>
</head>

<body>

    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
    <br /><br />

    <!-- Update Products Modal -->
    <?php include_once("./templates/update_products.php"); ?>

    <div class="container">
        <br />
        <div class="form-group">
            <form class="form-inline md-form form-sm mt-0">
                <i class="fas fa-search fa-2x text-danger" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" name="search_text" id="search_text" type="text" placeholder="Search for Products" aria-label="Search">
            </form>
        </div>
        <br />
        <div id="cat"></div>
    </div>

    <script>
        $(document).ready(function() {

            load_data();

            function load_data(query) {
                $.ajax({
                    url: "./includes/fetch_pro.php",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#cat').html(data);
                    }
                });
            }

            $('#search_text').keyup(function() {
                var search = $(this).val();
                if (search !== '') {
                    load_data(search);
                } else {
                    load_data();
                }
            });
        });
    </script>

</body>

</html>
