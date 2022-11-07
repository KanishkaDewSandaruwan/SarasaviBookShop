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

                        <li class="sidebar-item active">
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
                        <li class="sidebar-item">
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
                        <h3>Category Statistics</h3>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CategoryModal">Add
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
                                        <th>Category Name</th>
                                        <th>Image</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Image</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                            $getall = getAllCategory();

                            while($row=mysqli_fetch_assoc($getall)){

                                $cat_id = $row['cat_id'];
                                $img = $row['cat_image'];
                                $img_src = "../server/uploads/category/".$img;?>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input id="cat_name  <?php echo $cat_id; ?>" type="text" name="cat_name"
                                                    onchange="updateData(this, '<?php echo $cat_id; ?>', 'cat_name', 'category', 'cat_id');"
                                                    value="<?php echo $row['cat_name']; ?>"
                                                    data-parsley-trigger="change" required=""
                                                    placeholder="Enter Category Name" autocomplete="off"
                                                    class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <script
                                                src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
                                            </script>

                                            <img id="images<?php echo $cat_id; ?>"
                                                onclick="upImage(<?php echo $cat_id; ?>)" width="200px"
                                                src='<?php echo $img_src; ?>'>
                                            <form class="w-10" enctype="multipart/form-data" method="POST">
                                                <div class="mb-3">
                                                    <input class="form-control" value="<?php echo $row['cat_id'] ?>"
                                                        name="id" type="hidden" id="id">
                                                    <input class="form-control" value="cat_id" name="id_fild"
                                                        type="hidden" id="id_fild">
                                                    <input class="form-control" value="category" name="table"
                                                        type="hidden" id="table">
                                                    <input class="form-control" value="cat_image" name="field"
                                                        type="hidden" id="field">
                                                    <input style="display: none;" onchange="uploadImage(this.form);"
                                                        class="form-control" name="file" type="file"
                                                        id="formFile<?php echo $cat_id; ?>">
                                                </div>
                                            </form>

                                        </td>
                                        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin'): ?>

                                        <td><button type="button"
                                                onclick="deleteDataCategory(<?php echo $row['cat_id']; ?>,'category', 'cat_id')"
                                                class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i> Delete
                                            </button></td>
                                        <?php endif; ?>
                                    </tr>

                                    <?php } ?>

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
<div class="modal fade" id="CategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                <div class="modal-body bg-white">
                    <form action="" method="post" id="basicform" data-parsley-validate="">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="category_name" id="cat_name"
                                placeholder="Category Name" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input class="form-control" name="file" type="file" id="file">
                        </div>

                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="addAuthor(this.form)" name="submit" class="btn btn-primary">Save
                        changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
</html>