<!DOCTYPE html>
<html lang="en">

<?php include 'pages/head.php'; ?>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                             <a href="index.php"><img src="../img/Sarasavi-Logo-web-02.svg" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class="sidebar-item  ">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="customer.php" class='sidebar-link'>
                                <i class="bi bi-people"></i>
                                <span>Customer</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="category.php" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Category</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="author.php" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Author</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="products.php" class='sidebar-link'>
                                <i class="bi bi-book-fill"></i>
                                <span>Products</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
                            <a href="orders.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Orders</span>
                            </a>
                        </li>
                         
                        <li class="sidebar-item ">
                            <a href="settings.php" class='sidebar-link'>
                                <i class="bi bi-gear-fill"></i>
                                <span>Settings</span>
                            </a>
                        </li>

                         <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin'): ?>

                        <li class="sidebar-item">
                            <a href="employee.php" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Employee</span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <li class="sidebar-item">
                            <a href="logout.php" class='sidebar-link'>
                                <i class="bi bi-lock"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="row">
                    <div class="col-md-10">
                        <h3>Orders Statistics</h3>
                    </div>

                </div>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total Income</h6>
                                        <h6 class="font-extrabold mb-0">Rs. <?php 
                                            $data =  dataforCount('product_orders'); 
                                            if($row = mysqli_fetch_assoc($data)){
                                                echo $row['sum'];
                                            } ?>.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Categories</h6>
                                        <h6 class="font-extrabold mb-0">
                                            <?php echo dataCountWhere('category', 'is_deleted = 0 '); ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total Customers</h6>
                                        <h6 class="font-extrabold mb-0"><?php echo dataCount('customer'); ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Saved Products</h6>
                                        <h6 class="font-extrabold mb-0"><?php echo dataCount('products'); ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="row">
                    <?php
                    $getall = getAllOrders();

                    while ($row = mysqli_fetch_assoc($getall)) {
                        $order_id = $row['order_id'];
                    ?>
                    <div class="row" style="margin-top: 20px">
                        <article class="card m-5">
                            <header class="card-header text-white" style="background-color: #435ebe; color: #fff;">
                                Orders /
                                Tracking | ID #
                                <?php echo $row['order_id']; ?>
                            </header>
                            <div class="card-body" style="padding: 30px;">





                                <ul class="row">
                                    <?php
                        $getdetails = getAllOrderItemsBYOrder($row['order_id']);

                        while ($row2 = mysqli_fetch_assoc($getdetails)) {

                            $img = $row2['product_image'];
                            $img_src = "../server/uploads/products/" . $img; ?>
                                    <li class="col-md-4">
                                        <figure class="itemside mb-3">
                                            <div class="aside"><img src="<?php echo $img_src; ?>" class="img-sm border">
                                            </div>
                                            <figcaption class="info align-self-center">
                                                <p class="title">
                                                    <?php echo $row2['product_name']; ?> <br>
                                                    <?php echo $row2['product_highlight']; ?>
                                                </p> <span class="text-muted">Rs.
                                                    <?php echo $row2['product_price']; ?>
                                                </span>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <hr>
                                <div class="row mt-5">
                                    <?php if ($row['order_status'] != 5) { ?>
                                    <div class="track">

                                        <div class="step <?php if ($row['order_status'] == 1 || $row['order_status'] == 2 || $row['order_status'] == 3 || $row['order_status'] == 4) {
                                echo 'active';
                            } ?>">
                                            <span class="icon"> <i class="fa fa-check"></i> </span>
                                            <span class="text">Order confirmed</span>
                                        </div>
                                        <div class="step <?php if ($row['order_status'] == 2 || $row['order_status'] == 3 || $row['order_status'] == 4) {
                                echo 'active';
                            } ?>">
                                            <span class="icon"> <i class="fa fa-user"></i> </span>
                                            <span class="text">Prepare Order</span>
                                        </div>
                                        <div class="step <?php if ($row['order_status'] == 3 || $row['order_status'] == 4) {
                                echo 'active';
                            } ?>">
                                            <span class="icon"> <i class="fa fa-truck"></i> </span>
                                            <span class="text"> Shipped Order </span>
                                        </div>
                                        <div class="step <?php if ($row['order_status'] == 4) {
                                echo 'active';
                            } ?>">
                                            <span class="icon"> <i class="fa fa-box"></i> </span>
                                            <span class="text">Deliverd</span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <hr>
                                <div class="row border-primary">
                                    <div class="col-md-3"> <strong>Shipping TO</strong>
                                        <br>
                                        <?php echo $row['shipping_address']; ?>
                                    </div>
                                    <div class="col-md-3"> <strong>Billing TO</strong>
                                        <br>
                                        <?php echo $row['billing_address']; ?>
                                    </div>
                                    <div class="col-md-2"> <strong>Current Status</strong>
                                        <br>
                                        <?php if ($row['order_status'] == 1) {
                            echo 'Order confirmed';
                        } else if ($row['order_status'] == 2) {
                            echo 'Prepare Order';
                        } else if ($row['order_status'] == 3) {
                            echo 'Shipped Order';
                        } else if ($row['order_status'] == 4) {
                            echo 'Deliverd';
                        } else if ($row['order_status'] == 5) {
                            echo 'Canceled';
                        } ?>
                                    </div>
                                    <div class="col-md-2"> <strong>Tracking #</strong> <br>
                                        <?php if ($row['tracking'] != 'Pending') {
                            echo $row['tracking'];
                        } else {
                            echo "Pending";
                        } ?>
                                    </div>
                                    <div class="col-md-2"> <strong>Order Purchase Date</strong>
                                        <br>
                                        <?php echo $row['date_updated']; ?>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 30px;">

                                    <div class="col-md-3">
                                        <label for="order_status" class="form-label">Order Current State
                                            Change</label>
                                        <select
                                            onchange='updateData(this, "<?php echo $order_id; ?>","order_status", "product_orders", "order_id")'
                                            id="order_status <?php echo $order_id; ?>" class='form-control norad tx12'
                                            name="order_status" type='text'>
                                            <option value="1" <?php if ($row['order_status'] == "1")
                            echo "selected"; ?>>
                                                Order confirmed
                                            </option>
                                            <option value="2" <?php if ($row['order_status'] == "2")
                            echo "selected"; ?>>
                                                Prepare Order
                                            </option>
                                            <option value="3" <?php if ($row['order_status'] == "3")
                            echo "selected"; ?>>
                                                Shipped Order
                                            </option>
                                            <option value="4" <?php if ($row['order_status'] == "4")
                            echo "selected"; ?>>
                                                Deliverd
                                            </option>
                                            <option value="5" <?php if ($row['order_status'] == "5")
                            echo "selected"; ?>>
                                                Canceled
                                            </option>
                                        </select>
                                    </div>
                                    <?php if ($row['order_status'] != "5") { ?>
                                    <div class="col-md-3">

                                        <label for="tracking" class="form-label">Tracking Number</label>
                                        <input type="text"
                                            onchange='updateData(this, "<?php echo $order_id; ?>","tracking", "product_orders", "order_id")'
                                            class="form-control" name="tracking" value="<?php echo $row['tracking'] ?>"
                                            id="tracking<?php echo $row['order_id'] ?>">

                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </article>
                    </div>
                    <?php } ?>
                </section>
            </div>

            <?php include 'pages/footer.php'; ?>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>