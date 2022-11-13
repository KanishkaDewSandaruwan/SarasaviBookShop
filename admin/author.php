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

                        <li class="sidebar-item">
                            <a href="category.php" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Category</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
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
                        <h3>Author Statistics</h3>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AuthorModal">Add
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

                                        <th>Author Name</th>
                                        <th>Author Email</th>
                                        <th>Author Phone</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                        <th>Author Name</th>
                                        <th>Author Email</th>
                                        <th>Author Phone</th>
                                        <th>Date</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                $getall = getAllAuthor();

                                while($row=mysqli_fetch_assoc($getall)){ 
                                  $author_id = $row['author_id'];
                                  ?>


                                    <tr>
                                    <td>
                                            <div class="form-group">
                                                <input id="author_name  <?php echo $author_id; ?>" type="text" name="author_name"
                                                    onchange="updateData(this, '<?php echo $author_id; ?>', 'author_name', 'author', 'author_id');"
                                                    value="<?php echo $row['author_name']; ?>"
                                                    data-parsley-trigger="change" required=""
                                                    placeholder="Enter Author Name" autocomplete="off"
                                                    class="form-control">
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group">
                                                <input id="author_email  <?php echo $author_id; ?>" type="text" name="author_email"
                                                    onchange="updateData(this, '<?php echo $author_id; ?>', 'author_email', 'author', 'author_id');"
                                                    value="<?php echo $row['author_email']; ?>"
                                                    data-parsley-trigger="change" required=""
                                                    placeholder="Enter Author Email" autocomplete="off"
                                                    class="form-control">
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group">
                                                <input id="author_phone  <?php echo $author_id; ?>" type="text" name="author_phone"
                                                    onchange="updateData(this, '<?php echo $author_id; ?>', 'author_phone', 'author', 'author_id');"
                                                    value="<?php echo $row['author_phone']; ?>"
                                                    data-parsley-trigger="change" required=""
                                                    placeholder="Enter Author Phone" autocomplete="off"
                                                    class="form-control">
                                            </div>
                                        </td>
                                        <td><?php echo $row['date_updated']; ?></td>
                                        </td>
                                        <td> <button type="button"
                                                onclick="deleteData(<?php echo $row['author_id']; ?>,'author', 'author_id')"
                                                class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
                                            </button>

                                        </td>
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
<div class="modal fade" id="AuthorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Author</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                <div class="modal-body bg-white">
                    <form action="" method="post" id="basicform" data-parsley-validate="">
                        <div class="col-md-12 mt-3">
                            <input type="text" class="form-control" name="author_name" id="author_name"
                                placeholder="Author Name" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input type="text" class="form-control" name="author_email" id="author_email"
                                placeholder="Author Email" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input type="text" class="form-control" name="author_phone" id="author_phone"
                                placeholder="Author Phone" required>
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