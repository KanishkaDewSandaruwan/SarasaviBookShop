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

                        <li class="sidebar-item">
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
                        <li class="sidebar-item active">
                            <a href="employee.php" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Employee</span>
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
                        <h3>Employee Statistics</h3>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EmployeeModal">Add
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

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>NIC</th>
                                        <th>Address</th>
                                        <th>Gender</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>NIC</th>
                                        <th>Address</th>
                                        <th>Gender</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                $getall = getAlleditor();

                                while($row=mysqli_fetch_assoc($getall)){ 
                                  $editor_id = $row['editor_id'];
                                  ?>


                                    <tr>

                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['nic']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php if ($row['gender']=="1"){ echo "Male"; }else{ echo "Female";} ?>
                                        </td>
                                        <td> <a href="empolyee_edit.php?editor_id=<?php echo $editor_id; ?>"
                                                class="btn btn-darkblue"> <i class="fa-solid fa-edit"></i>
                                            </a>

                                            <button type="button"
                                                onclick="deleteData(<?php echo $row['editor_id']; ?>,'editor', 'editor_id')"
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
<div class="modal fade" id="EmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                <div class="modal-body bg-white">
                    <form action="" method="post" id="basicform" data-parsley-validate="">
                        <div class="form-group mt-2">
                            <label for="inputName">Name</label>
                            <input id="inputName" type="text" name="name" data-parsley-trigger="change" required=""
                                placeholder="Enter Full Name" autocomplete="off" class="form-control">
                        </div>

                        <div class="form-group mt-2">
                            <label for="inputEmail">Email address</label>
                            <input id="inputEmail" type="email" name="email" data-parsley-trigger="change" required=""
                                placeholder="Enter email" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="inputPhone">Phone Number</label>
                            <input id="inputPhone" type="text" name="phone" data-parsley-trigger="change" required=""
                                placeholder="Enter Phone Number" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="inputNIC">NIC</label>
                            <input id="inputNIC" type="text" name="nic" data-parsley-trigger="change" required=""
                                placeholder="Enter NIC Number" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="inputAddress">Address</label>
                            <input id="inputAddress" type="text" name="address" data-parsley-trigger="change"
                                required="" placeholder="Enter Address" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="inputGender">Gender</label>
                            <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                                <option value="1" selected>Male</option>
                                <option value="0">Female</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="inputPassword">Password</label>
                            <input id="inputPassword" type="password" name="password" placeholder="Password" required=""
                                class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="inputRepeatPassword">Repeat Password</label>
                            <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword" type="password"
                                required="" name="conf_password" placeholder="Password" class="form-control">
                        </div>

                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="addEmployee(this.form)" name="submit" class="btn btn-primary">Save
                        changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

</html>