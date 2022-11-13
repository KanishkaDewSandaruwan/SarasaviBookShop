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
                        <h3>Products Statistics</h3>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ProductsModal">Add
                            New</button>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                        <th>Price (Rs.)</th>
                                        <th>Qty</th>
                                        <th>Date Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $getall = getAllItems();
                                while ($row = mysqli_fetch_assoc($getall)) {
                                    $pid = $row['pid'];
                                    $img = $row['product_image'];
                                    $img_src = "../server/uploads/products/" . $img; ?>
                                    <tr >
                                        <td>
                                            <h6 class="mt-3">Name</h6>
                                            <?php echo $row['product_name']; ?><br>
                                            <h6 class="mt-3">Highlight</h6>
                                            <?php echo $row['product_highlight']; ?><br>
                                            <h6 class="mt-3">Description</h6>
                                            <?php echo $row['product_description']; ?>
                                        </td>
                                        <td><img width="150px" src='<?php echo $img_src; ?>'></td>

                                        <td>
                                            <h6 class="mt-3">Category</h6>
                                            <select
                                                onchange="updateData(this, '<?php echo $pid; ?>', 'cat_id', 'products', 'pid');"
                                                id="cat_id <?php echo $pid; ?>" class='form-control norad tx12'
                                                name="cat_id" type='text'>
                                                <?php 
                                                    $getallCat = getAllCategories();
                                                    while($row2=mysqli_fetch_assoc($getallCat)){ ?>

                                                <option value="<?php echo $row2['cat_id']; ?>"
                                                    <?php if ($row['cat_id']== $row2['cat_id']) echo "selected"; ?>>
                                                    <?php echo $row2['cat_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <h6 class="mt-3">Author</h6>
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

                                            
                                            <h6 class="mt-3">Active</h6>
                                            <select
                                                onchange="updateData(this, '<?php echo $pid; ?>', 'product_active', 'products', 'pid');"
                                                id="product_active <?php echo $pid; ?>" class='form-control norad tx12'
                                                name="product_active" type='text'>
                                                <option value="1"
                                                    <?php if ($row['product_active'] == "1" ) echo "selected" ; ?>>
                                                    Active
                                                </option>
                                                <option value="0"
                                                    <?php if ($row['product_active'] == "0" ) echo "selected" ; ?>>
                                                    Deactive
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control"
                                                onchange="updateData(this, '<?php echo $pid; ?>', 'product_price', 'products', 'pid');"
                                                name="product_price" id="product_price <?php echo $pid; ?>"
                                                value="<?php echo $row['product_price']; ?>">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control"
                                                onchange="updateData(this, '<?php echo $pid; ?>', 'product_qty', 'products', 'pid');"
                                                name="product_qty" id="product_qty <?php echo $pid; ?>"
                                                value="<?php echo $row['product_qty']; ?>">
                                        </td>
                                        
                                        <td>
                                            <?php echo $row['date_updated']; ?>
                                        </td>
                                        <td>

                                            <a href="prodcuts_edit.php?pid=<?php echo $row['pid']; ?>"
                                                class="btn btn-darkblue">
                                                <i class="fa-solid fa-pen-to-square"></i> </a>
                                            <?php if ($row['product_active']=="0"): ?>
                                            <button type="button"
                                                onclick="deleteData(<?php echo $row['pid']; ?>,'products', 'pid')"
                                                class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
                                            </button>
                                            <?php endif ?>

                                        </td>
                                        <?php } ?>
                                    </tr>
                                </tbody>


                            </table>

                        </div>
                    </div>
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

<!-- Modal -->
<div class="modal fade" id="ProductsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                <div class="modal-body bg-white">
                    <form action="" method="post" id="basicform" data-parsley-validate="">
                        <div class="col-md-12 mt-3">
                            <input type="text" class="form-control" name="product_name" id="product_name"
                                placeholder="Products Name" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input type="text" class="form-control" name="product_description" id="product_description"
                                placeholder="Product Description" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <select id="cat_id" class='form-control norad tx12' name="cat_id" type='text'>
                                <?php $getall = getAllCategory();
                                                while($row=mysqli_fetch_assoc($getall)){ ?>
                                <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-12 mt-3">
                            <select id="author_id" class='form-control norad tx12' name="author_id" type='text'>
                                <?php $getall = getAllAuthor();
                                                while($row=mysqli_fetch_assoc($getall)){ ?>
                                <option value="<?php echo $row['author_id'] ?>"><?php echo $row['author_name'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input type="text" class="form-control" name="product_highlight" id="product_highlight"
                                placeholder="Product Highlight" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input type="number" class="form-control" name="product_price" id="product_price"
                                placeholder="Product Price" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input type="text" class="form-control" name="product_qty" id="product_qty"
                                placeholder="Quntity" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <select id="product_active" class='form-control norad tx12' name="product_active"
                                type='text'>
                                <option value="1"> Active</option>
                                <option value="0"> Deactive</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-3 mt-3">
                            <input class="form-control" name="file" type="file" id="file">
                        </div>

                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="addItems(this.form)" name="submit" class="btn btn-primary">Save
                        changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

</html>