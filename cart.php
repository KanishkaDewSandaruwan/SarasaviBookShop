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
                        <h5 class="mt-6 mb-sm-4 display-4 fw-semi-bold lh-sm fs-4 fs-lg-6 fs-xxl-7 text-white">Shopping Cart
                        </h5>

                    </div>
                </div>
            </div>
        </section>


        <section id="libraries">
            <div class="container-fluid">
                <div class="row align-items-start"></div>
                <div class="col-12 col-sm-12 items">
                    <?php
                    $getall = getAllCart($_SESSION['customer']);
                    $count = mysqli_num_rows($getall);
                    $total = 0;

                    if($count > 0){

                    while ($row = mysqli_fetch_assoc($getall)) {
                        $pid = $row['pid'];
                        $sub_total = $row['qty'] * $row['price'];
                        $total = $total + $sub_total;
                        $img = $row['product_image'];
                        $img_src = "server/uploads/products/" . $img; ?>

                    <!--1-->
                    <div class="cartItem row align-items-start">
                        <div class="col-3 mb-2">
                            <img class="w-50" src="<?php echo $img_src; ?>" alt="art image">
                        </div>
                        <div class="col-5 mb-2">
                            <h3 class=""><?php echo $row['product_name']; ?></h3>
                            <p class="pl-1 mb-0"><?php echo $row['product_highlight']; ?></p>
                        </div>
                        <div class="col-2">
                            <p id="cartItem1Price">Rs. <?php echo $sub_total; ?>.00</p>
                        </div>
                        <div class="col-2">
                            <p class="cartItemQuantity p-1 text-center">
                                <input type="number" name="qty" id="qty <?php echo $row['cart_id']; ?>"
                                    onchange="qtryChange(this, '<?php echo $row['cart_id']; ?>', 'qty');"
                                    value="<?php echo $row['qty']; ?>" class="form-control text-center">
                            </p>
                        </div>
                    </div>
                    <hr>

                    <?php } }else{ ?>
                    <h1>Cart is empty</h1>
                    <?php } ?>

                </div>
                <div class="col-12 col-sm-4 p-3 proceed form" style="margin-left : 70%">
                    <div class="row m-0">
                        <div class="col-sm-8 p-0">
                            <h6>Subtotal</h6>
                        </div>
                        <div class="col-sm-4 p-0">
                            <p id="subtotal">Rs. <?php echo $total; ?>.00</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mx-0 mb-2">
                        <div class="col-sm-8 p-0 d-inline">
                            <h5>Total</h5>
                        </div>
                        <div class="col-sm-4 p-0">
                            <p id="total">Rs. <?php echo $total; ?>.00</p>
                        </div>
                    </div>
                    <?php if($total > 0) :?>
                    <a href="checkout.php?total=<?php echo $total; ?>"><button id="btn-checkout"
                    class="btn btn-primary"><span>Checkout</span></button></a>
                    <?php endif; ?>
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
<style>
#cart {
    max-width: 1440px;
    padding-top: 60px;
    margin: auto;
}

.form div {
    margin-bottom: 0.4em;
}

.cartItem {
    --bs-gutter-x: 1.5rem;
}

.cartItemQuantity,
.proceed {
    background: #f4f4f4;
}

.items {
    padding-right: 30px;
}

#btn-checkout {
    min-width: 100%;
}

/* stasysiia.com */
@import url("https://fonts.googleapis.com/css2?family=Exo&display=swap");

/* yukito bloody */
.back {
    position: relative;
    top: -30px;
    font-size: 16px;
    margin: 10px 10px 3px 15px;
}

.inline {
    display: inline-block;
}

.shopnow,
.contact {
    background-color: #000;
    padding: 10px 20px;
    font-size: 30px;
    color: white;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.5s;
    cursor: pointer;
}

.shopnow:hover {
    text-decoration: none;
    color: white;
    background-color: #c41505;
}

/* for button animation*/
.shopnow span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: all 0.5s;
}

.shopnow span:after {
    content: url("https://badux.co/smc/codepen/caticon.png");
    position: absolute;
    font-size: 30px;
    opacity: 0;
    top: 2px;
    right: -6px;
    transition: all 0.5s;
}

.shopnow:hover span {
    padding-right: 25px;
}

.shopnow:hover span:after {
    opacity: 1;
    top: 2px;
    right: -6px;
}

.ma {
    margin: auto;
}

.price {
    color: slategrey;
    font-size: 2em;
}

#mycart {
    min-width: 90px;
}

#cartItems {
    font-size: 17px;
}

#product .container .row .pr4 {
    padding-right: 15px;
}

#product .container .row .pl4 {
    padding-left: 15px;
}
</style>

</html>