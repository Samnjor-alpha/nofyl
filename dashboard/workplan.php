<?php
include '../config/config.php';
include '../controllers/auth.php';
include '../controllers/session.php';
include '../controllers/helper.php';
include '../controllers/workplan.php'
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
    <?php include 'navbar/worktabs.php' ?>


    <div class="card mt-3">
        <div class="card-body">
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>#</th>
        <th>Fund Code</th>
        <th>Project Title</th>
        <th>Organisation</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $cnt=1;
    while($row=mysqli_fetch_assoc($projects)){?>
    <tr>
        <td><?php echo $cnt?></td>
        <td><?php echo $row['Fund_Code'] ?></td>
        <td><?php echo $row['Title'] ?></td>
        <td><?php echo $row['organization'] ?></td>
        <td><?php echo $row['Start_Date'] ?></td>
        <td><?php echo $row['End_Date'] ?></td>
        <td><?php echo workplanactions($_SESSION['role'],$row['ID']) ?></td>
    </tr>
<?php                 $cnt = $cnt + 1;} ?>
    </tbody>
    <tfoot>
    <tr>
        <th>#</th>
        <th>Fund Code</th>
        <th>Project Title</th>
        <th>Organisation</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Action</th>

    </tr>
    </tfoot>
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


