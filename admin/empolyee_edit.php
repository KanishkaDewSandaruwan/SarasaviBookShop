<!DOCTYPE html>
<html lang="en">

<?php include 'pages/head.php'; ?>
<?php include 'super_admin.php'; ?>

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
                        <li class="sidebar-item">
                            <a href="orders.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Orders</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
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
                        <h3>Employee Edit</h3>
                    </div>

                </div>
            </div>
            <div class="page-content">
                <section class="row">
                    <?php 
                if (isset($_REQUEST['editor_id'])) {
                    $getall = geteditorByID($_REQUEST['editor_id']);
                    $row = mysqli_fetch_assoc($getall);
                    $editor_id = $row['editor_id']; ?>


                    <div class="form-group mt-2">
                        <label for="inputName">Name</label>
                        <input id="inputName" type="text" name="name" data-parsley-trigger="change"
                            onchange="updateData(this, '<?php echo $editor_id; ?>', 'name', 'editor', 'editor_id');"
                            value="<?php echo $row['name']; ?>" required="" placeholder="Enter Full Name"
                            autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group mt-2">
                        <label for="inputEmail">Email address</label>
                        <input id="inputEmail" type="email" name="email" data-parsley-trigger="change"
                            onchange="updateData(this, '<?php echo $editor_id; ?>', 'email', 'editor', 'editor_id');"
                            value="<?php echo $row['email']; ?>" required="" placeholder="Enter email"
                            autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="inputPhone">Phone Number</label>
                        <input id="inputPhone" type="text" name="phone" data-parsley-trigger="change" required=""
                            placeholder="Enter Phone Number" autocomplete="off"
                            onchange="updateData(this, '<?php echo $editor_id; ?>', 'phone', 'editor', 'editor_id');"
                            value="<?php echo $row['phone']; ?>" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="inputNIC">NIC</label>
                        <input id="inputNIC" type="text" name="nic" data-parsley-trigger="change"
                            onchange="updateData(this, '<?php echo $editor_id; ?>', 'nic', 'editor', 'editor_id');"
                            value="<?php echo $row['nic']; ?>" required="" placeholder="Enter NIC Number"
                            autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="inputAddress">Address</label>
                        <input id="inputAddress" type="text" name="address" data-parsley-trigger="change"
                            onchange="updateData(this, '<?php echo $editor_id; ?>', 'address', 'editor', 'editor_id');"
                            value="<?php echo $row['address']; ?>" required="" placeholder="Enter Address"
                            autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="inputGender">Gender</label>
                        <select onchange='updateData(this, "<?php echo $editor_id; ?>","gender", "editor", "editor_id")'
                            id="gender <?php echo $editor_id; ?>" class='form-control norad tx12' name="gender"
                            type='text'>
                            <option value="1" <?php if ($row['gender']=="1") echo "selected"; ?>>
                                Male</option>
                            <option value="0" <?php if ($row['gender']=="0") echo "selected"; ?>>
                                Female</option>
                        </select>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="row mt-2">
                            <a href="employee.php" class="btn btn-info">Back</a>
                        </div>
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