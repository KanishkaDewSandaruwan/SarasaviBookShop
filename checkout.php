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
                        <h5 class="mt-6 mb-sm-4 display-4 fw-semi-bold lh-sm fs-4 fs-lg-6 fs-xxl-7 text-white">Check Out
                        </h5>

                    </div>
                </div>
            </div>
        </section>


        <section id="libraries">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <form action="" method="post">
                                <?php $total = $_REQUEST['total'] + $res['delivery_fee']; ?>
                                <div class="row">

                                    <div class="col-lg-5">
                                        <div class="row px-2">
                                            <div class="form-group col-md-6">
                                                <label class="form-control-label">Name on Card</label>
                                                <input type="text" id="holder_name" name="holder_name"
                                                    placeholder="D.P Samarasingha">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-control-label">Card Number</label>
                                                <input type="text" id="card_num" name="card_num"
                                                    placeholder="1111 2222 3333 4444">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="hidden" id="total" name="total"
                                                    value="<?php echo $total; ?>">
                                                <input type="hidden" id="customer_id" name="customer_id"
                                                    value="<?php echo $_SESSION['customer']; ?>">
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="form-group col-md-6">
                                                <label class="form-control-label">Expiration Date</label>
                                                <input type="text" id="expire" name="expire" placeholder="MM/YYYY">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-control-label">CVV</label>
                                                <input type="text" id="cvv" name="cvv" placeholder="***">
                                            </div>
                                        </div>
                                        <div class="row px-2 mt-5">
                                            <h6 class="text-primary ml-3">Delivery Information</h6>
                                        </div>
                                        <div class="row px-2 ">
                                            <div class="form-group col-md-12">
                                                <label class="form-control-label">Shipping Address</label>
                                                <textarea name="shipping_address" id="shipping_address" cols="30"
                                                    rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="form-group col-md-12">
                                                <label class="form-control-abel">Billing Address</label>
                                                <textarea name="billing_address" id="billing_address" cols="30"
                                                    rows="3"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <div class="row d-flex justify-content-between px-4">
                                            <div class="col-md-6">
                                                <p class="mb-1 text-left">Subtotal</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="mb-1 text-right">Rs. <?php echo $_REQUEST['total']; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between px-4">
                                            <div class="col-md-6">
                                                <p class="mb-1 text-left">Shipping</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="mb-1 text-right">Rs. <?php echo $res['delivery_fee']; ?></h6>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row d-flex justify-content-between px-4">
                                            <div class="col-md-6">
                                                <p class="mb-1 text-left">Subtotal</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="mb-1 text-right">Rs. <?php echo $total; ?>.00</h6>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100" type="button" onclick="checkOut(this.form)">
                                            <span>
                                                <span id="checkout">Checkout</span>
                                                <span id="check-amt"> Rs.
                                                    <?php echo $total; ?></span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ============================================-->


        </section>
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