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
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
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
                            <a href="editor.php" class='sidebar-link'>
                                <i class="bi bi-pencil-fill"></i>
                                <span>Editor</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
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
                        <h3>Settings</h3>
                    </div>

                </div>
            </div>
            <div class="page-content">
                <section class="row">
                    <h6>ACCOUNT SETTINGS</h6>
                    <hr>
                    <p>Change Password <a data-bs-toggle="modal" data-bs-target="#ChangePasswordModal"
                            href="">Change</a> </p>
                    <h6 class="mt-5">HEADER INFORMATION</h6>
                    <hr>
                    <?php
                    $setting = getAllSettings();
                    if($res = mysqli_fetch_assoc($setting)){
                        
                        $img = $res['header_image'];
                        $img_src = "../server/uploads/settings/".$img;

                        $imgs = $res['sub_image'];
                        $imgs_src = "../server/uploads/settings/".$imgs;
                ?>


                    <div class="col-md-12 mt-3">
                        <label for="validationCustom01" class="form-label">Header Title</label>
                        <input type="text" onchange='settingsUpdate(this, "header_title")'
                            value="<?php echo $res['header_title']; ?>" class="form-control" name="category_name"
                            id="validationCustom01" placeholder="Header Title" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="product_desc" class="form-label">Header Description</label>
                        <textarea onchange='settingsUpdate(this, "header_desc")' class="form-control" id="header_desc"
                            required rows="3"><?php echo $res['header_desc']; ?></textarea>
                    </div>
                    <form class="mt-3" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name="field" id="field" value="header_image">
                            <label for="formFile" class="form-label">Header Image file</label>
                            <input class="form-control" onchange="uploadSettingImage(this.form);" name="file"
                                type="file" id="formFile">
                        </div>

                    </form>
                    <img class="mt-2" width="200px" src='<?php echo $img_src; ?>'>

                    <form class="mt-3" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name="field" id="field" value="sub_image">
                            <label for="formFile" class="form-label">Sub header Image file</label>
                            <input class="form-control" onchange="uploadSettingImage(this.form);" name="file"
                                type="file" id="formFile">
                        </div>

                    </form>
                    <img class="mt-2" width="200px" src='<?php echo $imgs_src; ?>'>



                    <?php } ?>


                    <h6 class="mt-5">ABOUT SETTINGS</h6>
                    <hr>
                    <?php
                                            $setting = getAllSettings();
                                            if($res = mysqli_fetch_assoc($setting)){

                                                $about = $res['about_image'];
                                                $about_src = "../server/uploads/settings/".$about;
                                        ?>


                    <div class="col-md-12 mt-3">
                        <label for="validationCustom01" class="form-label">About Title</label>
                        <input type="text" onchange='settingsUpdate(this, "about_title")'
                            value="<?php echo $res['about_title']; ?>" class="form-control" id="about_title"
                            placeholder="About Title" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="product_desc" class="form-label">About Description</label>
                        <textarea onchange='settingsUpdate(this, "about_desc")' class="form-control" id="about_desc"
                            required rows="3"><?php echo $res['about_desc']; ?></textarea>

                        <form class="mt-3" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="hidden" name="field" id="field" value="about_image">
                                <label for="formFile" class="form-label">About Image file</label>
                                <input class="form-control" onchange="uploadSettingImage(this.form);" name="file"
                                    type="file" id="formFile">
                            </div>

                        </form>
                        <img class="mt-2" width="200px" src='<?php echo $about_src; ?>'>


                        <?php } ?>


                        <h6 class="mt-5">CONTACT SETTINGS</h6>
                        <hr>
                        <?php
                                            $setting = getAllSettings();
                                            if($res = mysqli_fetch_assoc($setting)){ ?>

                        <div class="col-md-12 mt-3">
                            <label for="validationCustom01" class="form-label">Company Phone
                                Number</label>
                            <input type="text" onchange='settingsUpdate(this, "company_phone")'
                                value="<?php echo $res['company_phone']; ?>" class="form-control" id="company_phone"
                                placeholder="Company Phone Number" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="validationCustom01" class="form-label">Company Email
                                Address</label>
                            <input type="text" onchange='settingsUpdate(this, "company_email")'
                                value="<?php echo $res['company_email']; ?>" class="form-control" id="company_email"
                                placeholder="Company Email Address" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="validationCustom01" class="form-label">Company Address</label>
                            <input type="text" onchange='settingsUpdate(this, "company_address")'
                                value="<?php echo $res['company_address']; ?>" class="form-control" id="company_address"
                                placeholder="Company Address" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="validationCustom01" class="form-label">Facebook Link</label>
                            <input type="text" onchange='settingsUpdate(this, "link_facebook")'
                                value="<?php echo $res['link_facebook']; ?>" class="form-control" id="link_facebook"
                                placeholder="Facebook Link" required>
                            <a href="<?php echo $res['link_facebook']; ?>"><?php echo $res['link_facebook']; ?></a>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="validationCustom01" class="form-label">Twitter Link</label>
                            <input type="text" onchange='settingsUpdate(this, "link_twiiter")'
                                value="<?php echo $res['link_twiiter']; ?>" class="form-control" id="link_twiiter"
                                placeholder="Twitter Link" required>
                            <a href="<?php echo $res['link_twiiter']; ?>"><?php echo $res['link_twiiter']; ?></a>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="validationCustom01" class="form-label">Instragram Link</label>
                            <input type="text" onchange='settingsUpdate(this, "link_instragram")'
                                value="<?php echo $res['link_instragram']; ?>" class="form-control" id="link_instragram"
                                placeholder="Instragram Link" required>
                            <a href="<?php echo $res['link_instragram']; ?>"><?php echo $res['link_instragram']; ?></a>
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

<!-- Modal -->
<div class="modal fade" id="ChangePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                <div class="modal-body bg-white">
                    <form action="" method="post" id="basicform" data-parsley-validate="">


                            <div class="col-md-12 mt-1">
                                <input type="password" class="form-control" name="current_password"
                                    id="current_password" placeholder="Current Password" required>
                            </div>

                            <div class="col-md-12 mt-3">
                                <input type="password" class="form-control" name="new_password" id="new_password"
                                    placeholder="New Password" required>
                            </div>

                            <div class="col-md-12 mt-3">
                                <input type="password" class="form-control" name="confirm_new_password"
                                    id="confirm_new_password" placeholder="Confirm New Password" required>
                            </div>

                            <div class="col-md-12 mt-3">
                                <input type="hidden" class="form-control" name="email"
                                    value="<?php echo $_SESSION['admin']; ?>" id="email">
                            </div>

                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="changePasswordAdmin(this.form)" name="submit" class="btn btn-primary">Save
                        changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

</html>