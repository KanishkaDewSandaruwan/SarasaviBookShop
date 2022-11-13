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
                        <li class="sidebar-item active">
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
                        <h3>Products Edit</h3>
                    </div>
                   
                </div>
            </div>
            <div class="page-content">
                <section class="row">
                <?php 
                    if (isset($_REQUEST['pid'])) {
                        $getall = getAllItemsByID($_REQUEST['pid']);
                        $row = mysqli_fetch_assoc($getall);
                        $pid = $row['pid'];
                        $img = $row['product_image'];
                        $img_src = "../server/uploads/products/" . $img;
                            ?>
                            <form class="form-horizontal form-label-left" novalidate>
    

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="product_name" class="form-control col-md-7 col-xs-12"
                                            data-validate-length-range="6" data-validate-words="2" name="product_name"
                                            onchange="updateData(this, '<?php echo $pid; ?>', 'product_name', 'products', 'pid');"
                                            value="<?php echo $row['product_name']; ?>" required="required"
                                            placeholder="Product Name e.g Table" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                        for="product_description">Product Description
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="product_description" name="product_description"
                                            onchange="updateData(this, '<?php echo $pid; ?>', 'product_description', 'products', 'pid');"
                                            value="<?php echo $row['product_description']; ?>"
                                            required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                        for="product_highlight">Product Highlight
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="product_highlight" name="product_highlight"
                                            onchange="updateData(this, '<?php echo $pid; ?>', 'product_highlight', 'products', 'pid');"
                                            value="<?php echo $row['product_highlight']; ?>" required="required"
                                            class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_price">Product
                                        Price
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="product_price" name="product_price" required="required"
                                            onchange="updateData(this, '<?php echo $pid; ?>', 'product_price', 'products', 'pid');"
                                            value="<?php echo $row['product_price']; ?>" data-validate-minmax="10,100"
                                            class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Quntity
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="product_qty" name="product_qty" required="required"
                                            onchange="updateData(this, '<?php echo $pid; ?>', 'product_qty', 'products', 'pid');"
                                            value="<?php echo $row['product_qty']; ?>"
                                            class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_active">Active
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select
                                            onchange="updateData(this, '<?php echo $pid; ?>', 'product_active', 'products', 'pid');"
                                            id="product_active <?php echo $pid; ?>" class='form-control norad tx12'
                                            name="product_active" type='text'>
                                            <option value="1"
                                                <?php if ($row['product_active'] == "1" ) echo "selected" ; ?>> Active
                                            </option>
                                            <option value="0"
                                                <?php if ($row['product_active'] == "0" ) echo "selected" ; ?>>
                                                Deactive
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_id">Category
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select
                                            onchange='updateData(this, "<?php echo $pid; ?>","cat_id", "products", "pid")'
                                            id="cat_id <?php echo $pid; ?>" class='form-control norad tx12'
                                            name="cat_id" type='text'>
                                            <?php 
                                        $getallCat = getAllCategory();
                                        while($row2=mysqli_fetch_assoc($getallCat)){ ?>

                                            <option value="<?php echo $row2['cat_id']; ?>"
                                                <?php if ($row['cat_id']== $row2['cat_id']) echo "selected"; ?>>
                                                <?php echo $row2['cat_name']; ?></option>
                                            <?php } ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author_id">Author
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select
                                            onchange="updateData(this, '<?php echo $pid; ?>', 'author_id', 'products', 'pid');"
                                            id="author_id <?php echo $pid; ?>" class='form-control norad tx12'
                                            name="author_id" type='text'>
                                            <?php 
                                                    $getallCat = getAllAuthor();
                                                    while($row2=mysqli_fetch_assoc($getallCat)){ ?>

                                                <option value="<?php echo $row2['author_id']; ?>"
                                                <?php if ($row['author_id']== $row2['author_id']) echo "selected"; ?>>
                                                <?php echo $row2['author_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password2"
                                        class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <form enctype="multipart/form-data" method="POST">
                                            <div class="mb-3">
                                                <input class="form-control" value="<?php echo $row['pid'] ?>" name="id"
                                                    type="hidden" id="id">
                                                <input class="form-control" value="pid" name="id_fild" type="hidden"
                                                    id="id_fild">
                                                <input class="form-control" value="products" name="table" type="hidden"
                                                    id="table">
                                                <input class="form-control" value="product_image" name="field"
                                                    type="hidden" id="field">
                                                <input onchange="uploadImageProducts(this.form);" class="form-control"
                                                    name="file" type="file" id="formFile">
                                            </div>

                                            <img width="100px" src='<?php echo $img_src; ?>'>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="products.php" class="btn btn-primary">Back to Product List</a>
                                       
                                    </div>
                                </div>
                            </form>
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