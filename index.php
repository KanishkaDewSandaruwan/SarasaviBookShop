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
        <section class="py-0 " style="margin-top: 5%;" id="home">
            <div class="bg-holder d-none d-md-block w-100"
                style="background-image:url('<?php echo $header_src; ?>');background-position:right bottom;background-size:cover;">
            </div>
            <!--/.bg-holder-->

            <div class="bg-holder d-block d-md-none w-100"
                style="background-image:url('<?php echo $header_src; ?>');background-position:right top;background-size:cover;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row align-items-center min-vh-md-75">
                    <div class="col-md-7 col-lg-6 py-6 text-sm-start text-center">
                        <h1 class="mt-6 mb-sm-4 display-4 fw-semi-bold lh-sm fs-4 fs-lg-6 fs-xxl-7 text-dark">
                            <?php echo $res['header_title']; ?></h1>
                        <p class="mb-4 fs-1"><?php echo $res['header_desc']; ?></p>
                    </div>
                </div>
            </div>
        </section>


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-auto mb-5 mb-md-7">
                        <h1 class="fw-semi-bold text-warning">Our <span class="text-1100">Book Categories</span></h1>
                    </div>
                </div>
                <div class="row">
                    <?php 
              $getall = getAllCategories();

              while($row=mysqli_fetch_assoc($getall)){ 
                  $cat_id = $row['cat_id'];
                  $img = $row['cat_image'];
                  $img_src = "server/uploads/category/".$img;

              $getallCp2 = getAllProductItemsByCategory($cat_id);
              if ($row2 = mysqli_fetch_assoc($getallCp2)) {
                  ?>

                    <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center mt-5" style="height: 300px;">
                        <a href="books.php?cat_id=<?php echo $cat_id; ?>">
                            <div class="px-0 px-lg-3"><img class="img-fluid mb-2" style="width: 100%; height: 100%; "
                                    src="<?php echo $img_src; ?>" width="100" alt="..." />
                                <h3 class="h5 mb-4 font-base"><?php echo $row['cat_name']; ?></h3>
                            </div>
                        </a>
                    </div>
                    <?php } } ?>

                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-8" id="books">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-12 text-center mb-7">
                        <h1 class="fw-semi-bold text-warning">Our<span class="text-1100"> Book Collection</span></h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="accordion" id="accordionExample">
                            <?php
                $getallCp = getAllProductItems();
                $count = 0;
                while ($row2 = mysqli_fetch_assoc($getallCp)) {
                    $pid = $row2['pid'];
                    $img = $row2['product_image'];
                    $img_src = "server/uploads/products/" . $img;
                    if($count < 6){ ?>

                            <div class="accordion-item mb-5 border border-x-0 border-bottom-0 border-200">
                                <div class="accordion-header" id="heading<?php echo $pid; ?>">
                                    <div class="accordion-button" role="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse<?php echo $pid; ?>" aria-expanded="true"
                                        aria-controls="collapse<?php echo $pid; ?>">
                                        <div class="row w-100 justify-content-center">
                                            <div class="col-sm-8 font-base"><span
                                                    class="mb-0 fw-bold text-start fs-1 text-1200"><?php echo $row2['product_name']; ?></span>
                                                <p class="my-2"> Category : <?php $value = getAllCategoryByID($row2['cat_id']);
                                    $row3 = mysqli_fetch_assoc($value);
                                    echo $row3['cat_name']; ?></p>
                                                <p class="my-2"> Author : <?php $value = getAllAuthorBYID($row2['author_id']);
                                    $row3 = mysqli_fetch_assoc($value);
                                    echo $row3['author_name']; ?></p>
                                            </div>

                                            <div class="col-4 col-sm-4 text-end">
                                                <h5 class="mb-0 font-base fw-bold">Rs.
                                                    <?php echo $row2['product_price']; ?>.00</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-collapse collapse shadow-lg show" id="collapse<?php echo $pid; ?>"
                                    aria-labelledby="heading<?php echo $pid; ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row justify-content-center-center">
                                            <div class="col-12 col-sm-2"><img class="img-fluid d-block mx-auto mx-sm-0"
                                                    src="<?php echo $img_src; ?>" width="130" alt="..." /></div>
                                            <div class="col-12 col-sm-9 mt-4 mt-sm-0 d-sm-block d-flex flex-column">
                                                <ul>
                                                    <li class="fw-semi-bold text-black">
                                                        <?php echo $row2['product_highlight']; ?></li>
                                                </ul>
                                                <p><?php echo $row2['product_description']; ?> </p>
                                                <button type="button"
                                                    onclick="addtoCartProduct(<?php echo $pid; ?>, <?php echo $row2['product_price']; ?>)"
                                                    class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } $count++; } ?>


                        </div>
                    </div>
                    <div class="col-lg-12 d-flex justify-content-center">
                        <a class="btn btn-lg btn-primary rounded-pill font-base" href="books.php">Find More Books</a>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->
        <section id="libraries">
            <div class="bg-holder"
                style="background-image:url(assets/img/illustrations/libraries-bg.png);background-position:left bottom;background-size:contain;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row g-xl-0 align-items-center">
                    <div class="col-md-5 col-lg-7 text-xl-center"><img class="img-fluid mb-5 mb-md-0"
                            src="<?php echo $about_src; ?>" width="620" alt="" /></div>
                    <div class="col-md-7 col-lg-4 text-center text-md-start offset-lg-1 offset-xxl-0">
                        <h1 class="fw-semi-bold text-warning">Our <span
                                class="text-1100"><?php echo $res['about_title']; ?></span></h1>
                        <p class="pt-3 lh-lg"><?php echo $res['about_desc']; ?></p>

                    </div>
                </div>
            </div>
        </section>



        <?php  include 'pages/footer.php'; ?>
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