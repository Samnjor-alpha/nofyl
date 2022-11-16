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
    <?php include '../css/header.php'; ?>
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
                    <div>
                        <?php if (!empty($msg)): ?>
                            <div class="alert <?php echo $msg_class ?> alert-dismissible fade show" role="alert">
                                <i class="bi <?php echo $msg_icon ?> me-1"></i>
                                <?php echo $msg?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    </div>

                    <form method="post" action="" >
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" required placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" required id="pwd" placeholder="Password">
                            <label for="pwd">Password</label>
                        </div>
                        <div class="row mb-2">
                            <div class="col-8">
                                <input type="checkbox" onclick="showpassword()"> Show Password
                            </div>
                        </div>

                        <div class="d-grid">
                            <button name="loginBtn" class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                                in</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../css/scripts.php';
include '../controllers/auth.php';?>
</body>
</html>