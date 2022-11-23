<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'pages/head.php'; ?>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5" style="font-size: 15px;">Input your data to register to our website.
                    </p>

                    <form action="" method="post">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" name="name" placeholder="jhondoe">
                            <label for="floatingText">Full name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" name="phone"
                                placeholder="0753664078">
                            <label for="floatingText">Phone Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" name="nic"
                                placeholder="862545789V">
                            <label for="floatingText">NIC Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" name="address"
                                placeholder="Address">
                            <label for="floatingText">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                                <option value="1" selected>Male</option>
                                <option value="0">Female</option>
                            </select>
                            <label for="floatingText">Gender</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="conf_password" id="conf_password"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <button type="button" onclick="addCustomer(this.form)"
                            class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="login.php">Sign In</a></p>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">

                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>