<?php
include '../config/config.php';
include '../controllers/authcontroller.php';
include '../controllers/session.php';
include '../controllers/helper.php';
include '../controllers/viewproject.php';
include '../controllers/viewmeetings.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NoFYl</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/main.css">
    <link rel="stylesheet" href="assets/pdf.css">
    <script src="assets/pdf.js"></script>
    <link rel="icon" href="https://www.nofyl.org/wp-content/uploads/Nofyl_logo.png" sizes="32x32"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <?php include '../css/header.php'?>
    <style>
        .row {
            width: 100%;
            padding: 20px 0 20px 20px;
            border-bottom: 1px solid #ccc;
            font-size: 12px;
        }

        .col1 {
            width: 50%;
            float: left;
        }

        .col2 {
            width: 50%;
            float: left;
            font-size: 12px;
            padding-left: 3%;
        }

        .col3 {
            width: 20%;
            float: left;
        }

        .col4 {
            width: 40%;
            float: left;
        }

        h3 {
            font-weight: bold;
            margin: 0 0 20px;
            font-size: 15.5px;
            color: #000;
        }

        .input-form {
            float: right;
            margin-bottom: 10px;
        }

        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            border: none;
            padding-bottom: 22px;
        }

        .col02 {
            width: 30%;
            float: left;
            padding: 0 0 5% 0;
        }

        .col0_2 {
            width: 25%;
            height: 10px;
            float: left;
            padding: 10px 0 2% 2%;
            background: #e8e8e8;
        }

        select {
            width: 40%;
            height: 30px;
            font-size: 12px;
            background-color: transparent;
            border: #ccc solid 1px;
            padding: 0 1em 0 0;
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            cursor: inherit;
            line-height: inherit;

        }

        .row-title {
            width: 100%;
            padding: 20px 0 20px 20px;
            background: #075f96;
            color: #fff;
            font-size: 13px;
            font-weight: bold;
            margin: auto;
        }

        .col02-tab-text {
            width: 70%;
            float: left;
            padding: 0 0 5% 0;
            color: #000;
        }

        .col02-tab-button {
            width: 20%;
            float: left;
            padding: 0 0 5% 0;
        }

        .col2-button {
            background: #414141;
            color: #fff;
            border: none;
            padding: 6px;
            font-weight: bold;
        }

        .col2-buttonX {
            background: #c8060f;
            color: #fff;
            border: none;
            padding: 6px;
            font-weight: bold;
        }


    </style>
</head>
<body>


<div class="container mt-3">
    <?php include 'navbar/viewtabs.php'?>
    <div class="offset-10 fixed-top mt-5">
        <button class="btn btn-sm btn-primary" id="download">Download Documentation</button>
    </div>








        <div class="offset-3 col-6 ">
            <?php if (!empty($msg)): ?>
                <div class="alert <?php echo $msg_class ?> alert-dismissible fade show" role="alert">
                    <i class="bi <?php echo $msg_icon ?> me-1"></i>
                    <?php echo $msg?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
        <div id="print">

                    <div class="row">
                        <div class="offset-4 col-6">
                            <h3>

<?php echo $meetings->title ?></h3>
                            <h6><?= date('M d,Y',strtotime($meetings->posted_at)) ?></h6>
                        </div>
                    </div>

            <div class="row">

                <div>
                    <table class="table table-striped table-bordered" style="width:100%">

                        <thead>
                        <tr>
                            <th>Co chaired By: <?= $meetings->chairedby ?></th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Partners Present: <?php echo $meetings->members ?></th>


                        </tr>
                        </tbody>
                    </table>

                </div>
                <div>
                    <table class="table table-striped table-bordered" style="width:100%">

                        <thead>
                        <tr>
                            <th>Agenda</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($agendas as $agenda) {?>
                                     <tr>
                        <td><?php echo $agenda['agenda'] ?></td>


                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
                <div class="mb-1">
                    <?php foreach ($agendas as $agendaf) { ?>
                    <h3><?php echo $agendaf['agenda'] ?></h3>
                    <p><?php echo $agendaf['details'] ?></p>
                    <?php } ?>
                </div>
                <div class="mb-1">
                    <h3>Next Meeting</h3>
                    <h6><?php  echo date("D M d",strtotime($meetings->next_meeting)) ?></h6>
                </div>


            </div>

        </div>


    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Comments</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form method="post" action="" >


                        <div class="form-floating mb-3">
                            <textarea name="comment" class="form-control" id="floatingInput" required placeholder="name@example.com"></textarea>
                            <label for="floatingInput">Comment</label>
                        </div>

                        <div class="d-grid">
                            <button name="addcomment" class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Submit</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <script>

        function add_row() {
            $rowno = $("#employee_table tr").length;
            $rowno = $rowno + 1;
            $("#employee_table tr:last").after("<tr style='margin-top:10px; padding-top:10px;float: left;' id='row" + $rowno + "'><td style='width:50%;padding-left:3.5%;'><br><label style='position: relative;top: -52px;'>Primary Cluster:</label></td><td style='padding-left:8%;'><textarea id='' name='cluster_name[]' rows='2' cols='85' placeholder='Cluster Name'></textarea> <br><br> <label>Sub Cluster</label> <textarea id='' name='sub_cluster_name[]' rows='2' cols='50' placeholder='Sub Cluster Name'></textarea><br><br>  <label>Percentage</label><input type='number' id='' name='cluster_perc[]' placeholder='%' /></td><td><input type='button' value='X' class='col2-buttonX' onclick=delete_row('row" + $rowno + "')></td></tr>");
        }

        function delete_row(rowno) {
            $('#' + rowno).remove();
        }


    </script>
    <?php include '../controllers/addcomments.php' ?>


</body>
</html>
