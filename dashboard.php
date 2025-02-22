<?php
include_once("./database/constants.php");
// Ensure the session is started

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

    <!-- External Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/97c02f89cd.js"></script>

    <!-- Custom Scripts -->
    <script type="text/javascript" src="./js/main.js"></script>
    <script type="text/javascript" src="./js/manage.js"></script>
</head>

<body>

    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
    <?php include_once("./templates/catagory.php"); ?>
    <?php include_once("./templates/brand.php"); ?>
    <?php include_once("./templates/product.php"); ?>
    <?php include_once("./templates/update_profile.php"); ?>

    <br /><br />
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mx-auto">
                    <img class="card-img-top mx-auto" style="width:60%;" src="./images/download.png" alt="Profile Image">
                    <div class="card-body">
                        <h4 class="card-title">Profile Info</h4>
                        <p class="card-text"><i class="fa fa-user text-success"></i> Name: <?php echo $_SESSION["username"]; ?></p>
                        <p class="card-text"><i class="fa fa-user text-danger"></i> User Type: <?php echo $_SESSION["usertype"]; ?></p>
                        <p class="card-text"><i class="fa fa-clock-o text-info"></i> Last Login: <?php echo $_SESSION["last_login"]; ?></p>
                        <a href="#" eid="<?php echo $_SESSION["userid"]; ?>" class="btn btn-primary edit_profile" data-toggle="modal" data-target="#form_pro"> 
                            <i class="fas fa-edit"></i> Edit Profile
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="jumbotron">
                    <h1 class="text-center text-primary">Welcome, <?php echo $_SESSION["username"]; ?> </h1>
                    <div class="text-center">
                        <iframe src="http://free.timeanddate.com/clock/i71t13mj/n73/szw110/szh110/hbw0/hfc000/cf100/hgr0/fav0/fiv0/mqcfff/mql15/mqw4/mqd94/mhcfff/mhl15/mhw4/mhd94/mmv0/hhcbbb/hmcddd/hsceee" frameborder="0" width="110" height="110"></iframe>
                    </div>
                    <br>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            <div class="card bg-dark text-light text-left">
                                <div class="card-body">
                                    <h4 class="card-title">New Orders</h4>
                                    <p class="card-text">Create invoices and new orders here.</p>
                                    <a href="new_order.php" class="btn btn-primary"><i class="fab fa-first-order"></i> New Orders</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card bg-dark text-light">
                                <div class="card-body">
                                    <h4 class="card-title">Sales</h4>
                                    <p class="card-text">Check invoices and order details here.</p>
                                    <a href="sales.php" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Sales</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-4 py-2">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h4 class="card-title">Categories</h4>
                        <p class="card-text">Manage categories and add new parent/subcategories.</p>
                        <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
                        <a href="manage_categories.php" class="btn btn-primary"><i class="fa fa-tasks"></i> Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-2">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h4 class="card-title">Brands</h4>
                        <p class="card-text">Manage and add new brands here.</p>
                        <a href="#" data-toggle="modal" data-target="#brand" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
                        <a href="manage_brand.php" class="btn btn-primary"><i class="fa fa-tasks"></i> Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-2">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h4 class="card-title">Products</h4>
                        <p class="card-text">Manage and add new products here.</p>
                        <a href="#" data-toggle="modal" data-target="#product" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
                        <a href="manage_product.php" class="btn btn-primary"><i class="fa fa-tasks"></i> Manage</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
