<?php
include '../config/config.php';
include '../controllers/auth.php';
include '../controllers/session.php';
include '../controllers/helper.php';
include '../controllers/workplan.php';
include '../controllers/users.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NoFYl</title>
    <?php include '../css/header.php'?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
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
    <?php if ($_SESSION['role']=="admin"){ ?>
    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add New user
    </button>
    <div class="offset-3 col-6 ">
        <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?> alert-dismissible fade show" role="alert">
                <i class="bi <?php echo $msg_icon ?> me-1"></i>
                <?php echo $msg?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
    <!-- Modal -->
    <?php } ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


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
                            <input type="password" name="password" class="form-control" required id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="cpassword" class="form-control" required id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Confirm Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select  name="urole" class="form-control form-select" required id="floatingPassword">
                                <option disabled selected>....</option>
                                <option value="admin">Admin</option>
                                <option value="employee">Employee</option>
                            </select>
                            <label for="floatingPassword">Select Role</label>
                        </div>
                        <div class="d-grid">
                            <button name="regBtn" class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Add User</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


    <div class="card mt-3">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Names</th>
                    <th>Email</th>
                    <th>Role</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $cnt=1;
                while($row=mysqli_fetch_assoc($getusers)){?>
                    <tr>
                        <td><?php echo $cnt?></td>
                        <td><?php echo $row['first_name']." ".$row['last_name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['role'] ?></td>

                    </tr>
                    <?php                 $cnt = $cnt + 1;} ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</body>
</html>


