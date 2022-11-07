<?php include 'pages/assets.php'; ?>
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
                        <h5 class="mt-6 mb-sm-4 display-4 fw-semi-bold lh-sm fs-4 fs-lg-6 fs-xxl-7 text-white">Book List</h5>

                    </div>
                </div>
            </div>
        </section>


        <section id="libraries">

            <div class="container bg-white">
                    <h1 style="font-weight : bold">Our Book Collection ...</h1>
                <div class="row">
                    <?php
                if(isset($_REQUEST['cat_id']) && $_REQUEST['cat_id'] != ""){
                    $getallCp = getAllProductItemsByCategory($_REQUEST['cat_id']);
                }else{
                    $getallCp = getAllProductItems();
                }


                while ($row2 = mysqli_fetch_assoc($getallCp)) {
                    $pid = $row2['pid'];
                    $img = $row2['product_image'];
                    $img_src = "server/uploads/products/" . $img;?>

                    <div
                        class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                        <a href="">
                            <div class="product"> <img
                                    src="<?php echo $img_src; ?>"
                                    alt="">
                            </div>
                        </a>
                        <!-- <div class="tag bg-red">sale</div> -->
                        <div class="title text-primary pt-4 pb-1"><b><?php echo $row2['product_name']; ?></b></div>
                        <div class="price text-danger">Rs. <?php echo $row2['product_price']; ?>.00</div>
                        <div class="title">Category : <?php $value = getAllCategoryByID($row2['cat_id']);
                                    $row3 = mysqli_fetch_assoc($value);
                                    echo $row3['cat_name']; ?></div>
                        <div class="title">Author : <?php $value = getAllAuthorBYID($row2['author_id']);
                                    $row3 = mysqli_fetch_assoc($value);
                                    echo $row3['author_name']; ?></div>

                        <div class="w-100 mt-2"><button  type="button"  onclick="addtoCartProduct(<?php echo $pid; ?>, <?php echo $row2['product_price']; ?>)" class="btn btn-primary w-100">Add to Cart</button></div>

                    </div>
                    <?php } ?>


                </div>

            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>

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