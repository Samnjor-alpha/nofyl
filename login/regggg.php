<?php
include '../config/config.php';
include '../controllers/authcontroller.php';
?>
<html lang="">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php include '../css/header.php' ?>
    <style>
        body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-10 col-lg-7 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">NoFyl Portal Log in</h5>



                    <form method="post" action="" >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="fname" class="form-control" id="floatingInput" required placeholder="First Name">
                                    <label for="floatingInput">First Name</label>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="lname" class="form-control" id="floatingInput" required placeholder="Last Name">
                                    <label for="floatingInput">Last Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" required placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" required id="pwd" placeholder="Password">
                            <label for="pwd">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="cpassword" class="form-control" required id="cpwd" placeholder="Password">
                            <label for="cpwd">Confirm Password</label>
                        </div>
                        <div class="form-floating mb-3">
                                <select  name="urole" class="form-control form-select" required id="floatingPassword">
                            <option disabled selected>....</option>
                                <option value="admin">Admin</option>
                                <option value="supervisor">Supervisor</option>
                                <option value="staff">Staff</option>
                            </select>
                            <label for="floatingPassword">Select Role</label>
                        </div>
                        <div class="row mb-2">
                            <div class="col-8">
                                <input type="checkbox" onclick="showpassword()"> Show Password
                            </div>
                        </div>
                        <div class="d-grid">
                            <button name="regBtn" class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                                up</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../css/scripts.php';
include '../controllers/auth.php';
?>
</body>
</html>