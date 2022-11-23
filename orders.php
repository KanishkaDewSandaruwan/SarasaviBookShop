<?php include 'pages/assets.php'; ?>
<?php include 'pages/auth.php'; ?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Sarasavi Bookshop</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/Sarasavi-Logo-web-02.svg">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />

</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-3 backdrop"
            data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container-fluid"><a class="navbar-brand d-flex align-items-center fw-semi-bold fs-3" href="index.php">
                     <img class="me-3" width="100%" src="img/Sarasavi-Logo-web-02.svg" alt="" />
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base text-white">
                        <li class="nav-item"><a class="nav-link text-primary fw-medium active" aria-current="page"
                                href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-primary" href="books.php">Books</a></li>
                        <li class="nav-item"><a class="nav-link text-primary" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link text-primary" href="contact.php">Contact</a></li>
                        <?php if (isset($_SESSION['customer'])): ?>

                        <li class="nav-item"><a class="nav-link text-primary" href="profile.php">Profile</a></li>
                        <li class="nav-item"><a class="nav-link text-primary" href="admin/logout.php">Logout</a></li>
                        <?php else: ?>
                        <li class="nav-item"><a class="nav-link text-primary" href="admin/login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link text-primary" href="admin/register.php">Register</a>
                        </li>
                        <?php endif; ?>

                    </ul>
                    <form class="ps-lg-5">

                        <a class="btn btn-lg btn-primary rounded-pill bg-gradient font-base order-0" href="cart.php"><i
                                class="fas fa-cart-plus"></i> Cart</a>
                        <a class="btn btn-lg btn-primary rounded-pill bg-gradient font-base order-0"
                            href="orders.php"><i class="fas fa-file"></i> Order List</a>
                    </form>
                </div>
            </div>
        </nav>
        <section class="py-0 " style="margin-top: 5%; height: 350px;" id="home">
            <div class="bg-holder d-none d-md-block w-100"
                style="background-image:url('<?php echo $subheader_src; ?>');background-position:right bottom;background-size:cover; height: 200px !important; ">
            </div>
            <!--/.bg-holder-->

            <div class="bg-holder d-block d-md-none w-100"
                style="background-image:url('<?php echo $subheader_src; ?>');background-position:right top;background-size:cover; height: 200px !important;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row align-items-center min-vh-md-75">
                    <div class="col-md-7 col-lg-6 py-6 text-sm-start text-center">
                        <h5 class="mt-6 mb-sm-4 display-4 fw-semi-bold lh-sm fs-4 fs-lg-6 fs-xxl-7 text-white">Order list
                        </h5>

                    </div>
                </div>
            </div>
        </section>


        <section id="libraries" style="margin-top: -10%;">
            <div class="container-fluid py-5">


                <?php 
                $getall = getAllOrdersByCustomer($_SESSION['customer']);

                while($row=mysqli_fetch_assoc($getall)){ 
                $order_id = $row['order_id'];
                ?>
                <article class="card mt-5" >
                    <header class="card-header text-white bg-primary">
                        Orders / Tracking </header>
                    <div class="card-body">
                        <h6>Order ID: #<?php echo $row['order_id']; ?> </h6>
                        <article class="card">
                            <div class="card-body row">

                                <div class="col"> <strong>Shipping TO:</strong>
                                    <br><?php echo $row['shipping_address']; ?>
                                </div>
                                <div class="col"> <strong>Billing TO:</strong>
                                    <br><?php echo $row['billing_address']; ?>
                                </div>
                                <div class="col"> <strong>Current Status:</strong>
                                    <br>
                                    <?php if($row['order_status'] == 1){
                    echo 'Order confirmed';
                }else if($row['order_status'] == 2){
                    echo 'Prepare Order';
                } else if($row['order_status'] == 3){
                    echo 'Shipped Order';
                } else if($row['order_status'] == 4){
                    echo 'Deliverd';
                } else if($row['order_status'] == 5){
                    echo 'Canceled';
                } ?>
                                </div>
                                <div class="col"> <strong>Tracking #:</strong> <br>
                                    <?php if($row['tracking'] != 'Pending'){ echo $row['tracking']; }else{echo "Pending";}?>
                                </div>
                                <div class="col"> <strong>Order Purchase Date:</strong>
                                    <br><?php echo $row['date_updated']; ?>
                                </div>
                            </div>
                        </article>
                
                        <hr>
                        <ul class="row">
                            <?php 
                            $getdetails = getAllOrderItemsBYOrder($row['order_id']);

                            while($row2=mysqli_fetch_assoc($getdetails)){

                            $img = $row2['product_image'];
                            $img_src = "server/uploads/products/".$img;?>
                            <li class="col-md-4">
                                <figure class="itemside mb-3">
                                    <div class="aside"><img src="<?php echo $img_src; ?>" class="img-sm border">
                                    </div>
                                    <figcaption class="info align-self-center">
                                        <p class="title"><?php echo $row2['product_name']; ?> <br>
                                            <?php echo $row2['product_highlight']; ?></p> <span class="text-muted">Rs.
                                            <?php echo $row2['product_price']; ?> </span>
                                    </figcaption>
                                </figure>
                            </li>
                            <?php } ?>
                        </ul>
                        <hr>
                        <div class="row">

                            <?php if ($row['order_status'] != "5") { ?>
                            <div class="col-md-3">
                                <label for="order_status" class="form-label">Order Cancel</label>
                                <select
                                    onchange='updateDataFromHome(this, "<?php echo $order_id; ?>","order_status", "product_orders", "order_id")'
                                    id="order_status <?php echo $order_id; ?>" class='form-control norad tx12'
                                    name="order_status" type='text'>
                                    <option value="0">
                                        Select Cancel to Cancel Order
                                    </option>
                                    <option value="5" <?php if ($row['order_status']=="5") echo "selected"; ?>>
                                        Canceled
                                    </option>
                                </select>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </article>
                <?php } ?>



            </div>
        </section>


        <!-- ============================================-->

        <!-- <section> close ============================-->
        <!-- ============================================-->



        <?php include 'pages/footer.php'; ?>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
</body>

</html>