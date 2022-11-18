<?php
include '../config/config.php';
include '../controllers/authcontroller.php';
include '../controllers/session.php';
include '../controllers/helper.php';
include '../controllers/workplan.php'
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
        <td><?php echo $row['Fund_Code'];
        if ($_SESSION['role']=="admin") {
            echo "<br>";
            echo checkifprjassign($row['ID']);
            }?>
        </td>
        <td><?php echo $row['Title'] ?></td>
        <td><?php echo $row['organization'] ?></td>
        <td><?php echo date('d/M/Y',strtotime($row['Start_Date'])); ?></td>
        <td><?php echo date('d/M/Y',strtotime($row['End_Date'])); ?></td>
        <td><?php echo workplanactions($_SESSION['role'],$row['ID']) ?></td>
    </tr>
<?php                 $cnt = $cnt + 1;} ?>
    </tbody>

</table>
</div>
    </div>

    <div class="modal fade" id="assignstaff" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div  class="modal-body">
                    <form method="post" action="" class="">
                        <div class="form-group">
                            <label for="idd">Select Staff</label>
                            <select class="form-control" type="text" name="users[]" id="idd" multiple>
                            <option selected disabled>Select user</option>
                                <?php getstaff(); ?>
                            </select>
                        </div>

                        <input  type="hidden" name="prjid" id="id">
                        <div class="form-group mt-2">
                            <button type="submit" name="assign_prj" class="btn btn-success">Assign Staff</button>
                        </div>
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../css/scripts.php'; ?>
<?php include '../controllers/assignstaff.php' ?>
<script>
    $(document).ready(function(){


        $("#assignstaff").modal({
            keyboard: true,
            show: false,

        }).on("show.bs.modal", function(event){
            var a = $(event.relatedTarget); // button the triggered modal
            var id = a.data("id");




            //displays values to modal

            $(".modal-body #id").val( id );
            $(".modal-body #idd").val( id );



        });

    });
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

</body>
</html>


