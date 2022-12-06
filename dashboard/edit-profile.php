<?php
include '../config/config.php';
include '../controllers/authcontroller.php';
include '../controllers/session.php';
include '../controllers/helper.php';
include '../controllers/workplan.php';
include '../controllers/editprofilecontroller.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NoFYl</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <?php include '../css/header.php'?>
</head>
<body>

<?php include 'navbar/topbar.php'?>
<div class="container mt-3">
    <h2>        NoFYL Project Documentation Portal
    </h2>

</div>
<div class="container mt-3">
    <?php include 'navbar/worktabs.php'?>
    <!-- Button trigger modal -->




    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <div class="offset-3 col-6">
                    <form method="post" action="" >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="fname" class="form-control" id="floatingInput" disabled value="<?= $rowpr['first_name']?>" placeholder="First Name">
                                    <label for="floatingInput">First Name</label>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" disabled value="<?= $rowpr['last_name']?>" name="lname" class="form-control" id="floatingInput" required placeholder="Last Name">
                                    <label for="floatingInput">Last Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" value="<?= $rowpr['email'] ?>" class="form-control" id="floatingInput" required placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>

                        <div class="d-grid">
                            <button name="update_user" class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Update Email</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
<?php include '../css/scripts.php';

include '../controllers/auth.php'?>
</body>
</html>


