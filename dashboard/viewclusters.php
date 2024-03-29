<?php
include '../config/config.php';
include '../controllers/authcontroller.php';
include '../controllers/session.php';
include '../controllers/helper.php';
include '../controllers/viewproject.php';
include '../controllers/frameworkcontroller.php'
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
    <script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    <?php if (checkapproval($_GET['id']) && $_SESSION['role']=='admin'){ ?>
        <div class="offset-10 fixed-top mt-5">
            <a href="?id=<?= $_GET['id'] ?>&&approve" class="btn btn-sm btn-danger">Approve Project</a>
        </div>
    <?php }elseif(!checkapproval($_GET['id'])){ ?>
    <div class="offset-10 fixed-top mt-5">
        <button class="btn btn-sm btn-primary" id="download">Download Cluster information</button>
    </div>
<?php } ?>

    <div id="print">
        <h3><?php echo $project->Title ?> Documentation</h3>
        <div class="row">
            <h3>Project Details</h3>
            <div>
                <table class="table table-striped table-bordered" style="width:100%">

                    <thead>
                    <tr>
                        <th>Organization</th>
                        <th>Title</th>
                        <th>Allocation</th>
                        <th>Fund Code</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $project->organization ?></td>
                        <td><?php echo $project->Title ?></td>
                        <td><?php echo $project->Allocation ?></td>
                        <td><?php echo $project->Fund_Code ?></td>

                    </tr>
                    </tbody>
                </table>

            </div>
            <div>
                <table class="table table-striped table-bordered" style="width:100%">

                    <thead>
                    <tr>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Duration</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $project->Start_Date ?></td>
                        <td><?php echo $project->End_Date ?></td>
                        <td><?php echo noweeks($project->Start_Date,$project->End_Date) ?></td>

                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="">
                <h3>Clusters</h3>
                <table class="table table-bordered">
                    <tr>

                        <th>Primary Cluster</th>
                        <th>Sub Cluster</th>
                        <th>Percentage</th>
                    </tr>
                    <?php foreach ($clusters as $k => $cluster) { ?>
                        <tr>

                            <td><?php echo $cluster['cluster_name'] ?></td>
                            <td><?php echo $cluster['subcluster_name'] ?></td>
                            <td><?php echo $cluster['percentage'] ?>%</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="">
                <h3>Means of verification</h3>
                <div class="row">


                    <table class="table table-striped outputs">

                        <tr>
                            <th>#</th>
                            <th>Outcome ID</th>
                            <th>Output</th>
                            <th>Cluster</th>
                        </tr>
                        <?php foreach ($projectOutputs as $k=> $projectOutput) { ?>
                            <tr>
                                <td><?php echo ++$k ?></td>
                                <td><?php echo getoutcomename($projectOutput['outcome_id']) ?></td>
                                <td><?=
                                    getoutputs($projectOutput['outcome_id']);
                                    ?></td>
                                <td><?php echo getclustername($projectOutput['cluster_id']) ?></td>
                            </tr>
                        <?php } ?>
                    </table>

                    
                    <table class="table table-striped indicators">
                        
                        <tr>
                            <th>#</th>
                            <th>Output</th>
                            <th>Means of verification</th>
                            <th>Target</th>

                            <th>Activities</th>
                        </tr>
                        <?php





                        while ($outputIndicator=mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php

                                    echo getindexmov(getoutcomeid($outputIndicator['output_id']));

                                    ?></td>
                                <td><?php echo $outputIndicator['indicator'] ?? null ?></td>
                                <td><?php

                                    if (!is_null($outputIndicator['mov'])) {

                                         prntallmovs($outputIndicator['output_id']);

                                    }?>
                                </td>
                                <td><?php echo $outputIndicator['target'] ?? null ?></td>

                                <td><?php if(!is_null(json_decode($outputIndicator['activities']))) {
                                        foreach (json_decode($outputIndicator['activities']) as $activity) {?>
                                            <a  data-toggle='modal' data-act='<?= $activity?>' data-id='<?= $outputIndicator['output_id'] ?>' class='text-primary btn btn-sm'  data-target='#editact' title='Edit Activity'><?= $activity ?></a>


                                        <?php    }
                                    }else{?>
                                        <a data-toggle='modal' class='text-primary btn btn-sm'  data-id='<?= $outputIndicator['output_id'] ?>' data-target='#addact' title='Add Activity'><i class="text-danger">Add Activity</i></a>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php
                                } ?>
                    </table>

                </div>
            </div>
        </div>

    </div>



</div>
<div class="modal  fade" id="viewoutput" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Indicators</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="modal-body" class="modal-body">
                <form method="post" action="" class="">
                    <input  type="hidden" name="outputid" id="idd">
                    <div class="form-group">
                        <label for="dname">Output Name:</label>
                        <!--                        <input disabled class="form-control" type="text" readonly  name="outcome" id="dname">-->
                        <span class="text-capitalize" id="dname"></span>
                    </div>
                    <div class="container mt-4">

                        <div class="form-group">
                            <label for="ind">
                                Indicator
                            </label>
                            <textarea class="form-control" name='indicator' id='mov'></textarea>
                        </div>
                        <div class="form-group">
                            <label for="ind">
                                Means of Verification
                            </label>
                            <select class="form-control" name='mov[]' id='mov' multiple><option value='mov0'>Select</option><option value='mov1'>Coordination Meeting Minutes</option><option value='mov2'>Photos</option><option value='mov3'>Participant List</option><option value='mov4'>Monthly Service Mapping Report</option><option value='mov5'>Monthly Service Monitoring Report</option><option value='mov6'>Training Report</option><option value='mov7'>Awareness Activity Narrative Report</option><option value='mov8'>Safety Audit Training Report</option><option value='mov9'>Safety Audit Report</option><option value='mov10'>Cash For Work Monitoring Report</option><option value='mov11'>Cash For work Narrative Report</option><option value='mov12'>Money Transfer Statement</option><option value='mov13'>Activity Monitoring Report</option><option value='mov14'>CFM Intake Forms</option><option value='mov15'>Narrative Report </option><option value='mov16'>Decongestion Coordination Meeting Minutes</option><option value='mov17'>Human Interest Stories</option><option value='mov18'>Activity Monitoring Report</option><option value='mov19'>Land Tenure Documents</option><option value='mov20'>Beneficiary List</option><option value='mov21'>Post Eviction Monitoring Report</option><option value='mov22'>Money Transfer Statement</option><option value='mov23'>Assessment Report</option><option value='mov24'>Quarterly Assessment Report</option><option value='mov25'>Quarterly Eviction Dashboards</option></select>
                        </div>
                        <div class="form-group">
                            <label for="ind">
                                Target
                            </label>
                            <input  type="number" class="form-control" name='target' id='mov'/>
                        </div>
                        <div class="form-group">
                            <label for="ind">
                                Activity
                            </label>
                            <textarea class="form-control" name='activity' id='mov'></textarea>
                        </div>
                    </div>



                    <div class="form-group mt-2">
                        <button type="submit" name="add_indout" class="btn btn-success">Save</button>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal  fade" id="viewoutcome" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="dname" class="modal-title">Add Comment</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div  class="modal-body">
                <form method="post" action="" class="">
                    <input  type="hidden" name="mov_id" id="idd">
                    <div class="form-group">
                        <label>Comment:</label>
                        <textarea name="comment" class="form-control" id="comment"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" name="add_mov_cmnt" class="btn btn-sm btn-success">Add Comment</button>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal  fade" id="addact" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Activity</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div  class="modal-body">
                <form method="post" action="" class="">
                    <input  type="hidden" name="outcome_id" id="idd">
                    <textarea name="activity" class="form-control" id="addact_txt"></textarea>
                    <div class="form-group mt-2">
                        <button type="submit" name="add_act" class="btn btn-success">Add</button>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal  fade" id="editact" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Activity</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div  class="modal-body">
                <form method="post" action="" class="">
                    <input type="hidden"   name="outcome_id" id="idd">
                    <textarea class="form-control"  name="activity" id="editact_txt"></textarea>
                    <div class="form-group mt-2">
                        <button type="submit" name="update_act" class="btn btn-success">Update</button>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script>

    function add_row() {
        $rowno = $("#employee_table tr").length;
        $rowno = $rowno + 1;
        $("#employee_table tr:last").after("<tr style='margin-top:10px; padding-top:10px;float: left;' id='row" + $rowno + "'><td style='width:50%;padding-left:3.5%;'><br><label style='position: relative;top: -52px;'>Primary Cluster:</label></td><td style='padding-left:8%;'><textarea id='' name='cluster_name[]' rows='2' cols='85' placeholder='Cluster Name'></textarea> <br><br> <label>Sub Cluster</label> <textarea id='' name='sub_cluster_name[]' rows='2' cols='50' placeholder='Sub Cluster Name'></textarea><br><br>  <label>Percentage</label><input type='number' id='' name='cluster_perc[]' placeholder='%' /></td><td><input type='button' value='X' class='col2-buttonX' onclick=delete_row('row" + $rowno + "')></td></tr>");
    }

    function delete_row(rowno) {
        $('#' + rowno).remove();
    }


        $(document).ready(function(){
        $("#updatedriver").modal({
            keyboard: true,
            show: false,

        }).on("show.bs.modal", function(event){
            var button = $(event.relatedTarget); // button the triggered modal
            var tripid = button.data("id");



            //displays values to modal

            $(".modal-body #id").val( tripid );

        });
            $("#addact").modal({
                keyboard: true,
                show: false,

            }).on("show.bs.modal", function(event){
                var button = $(event.relatedTarget); // button the triggered modal
                var id = button.data("id");




                //displays values to modal

                $(".modal-body #idd").val( id );



            });
            $("#editact").modal({
                keyboard: true,
                show: false,

            }).on("show.bs.modal", function(event){
                var button = $(event.relatedTarget); // button the triggered modal
                var id = button.data("id");
                var activity = button.data("act");



                //displays values to modal

                $(".modal-body #idd").val( id );

                $(".modal-body #editact_txt").val( activity );

            });
        $("#viewdriver").modal({
        keyboard: true,
        show: false,

    }).on("show.bs.modal", function(event){
        var button = $(event.relatedTarget); // button the triggered modal
        var id = button.data("id");
        var dname = button.data("dname");



        //displays values to modal

        $(".modal-body #id").val( id );
        $(".modal-body #id").val( id );
        $(".modal-body #name").val( dname );

    });
        $("#viewoutcome").modal({
        keyboard: true,
        show: false,

    }).on("show.bs.modal", function(event){
        var button = $(event.relatedTarget); // button the triggered modal
        var id = button.data("id");
        var dname = button.data("outcome");



        //displays values to modal

        $(".modal-body #id").val( id );
        $(".modal-body #idd").val( id );

        $(".modal-header #dname").text( "Add comment for "+dname );


    });
            $("#viewoutput").modal({
                keyboard: true,
                show: false,

            }).on("show.bs.modal", function(event){
                var button = $(event.relatedTarget); // button the triggered modal
                var id = button.data("id");
                var dname = button.data("output");



                //displays values to modal

                $(".modal-body #id").val( id );
                $(".modal-body #idd").val( id );
                $(".modal-body #dname").text( dname );


            });

    });



</script>
<?php include '../controllers/addcomments.php'?>


</body>
</html>


