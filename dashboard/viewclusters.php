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
        <button class="btn btn-sm btn-primary" id="download">Download Cluster information</button>
    </div>


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
                    <table class="table table-striped outcomes">
                        <caption>Outcomes</caption>
                        <tr>
                            <th>#</th>
                            <th>Project Outcome</th>
                            <th>Cluster</th>
                        </tr>
                        <?php foreach ($projectOutcomes as $k=>$projectOutcome) { ?>
                            <tr>
                                <td><?php echo ++$k ?></td>
                                <td><?php echo $projectOutcome['outcome'] ?? null ?></td>
                                <td><?php echo getclustername($projectOutcome['cluster_id']) ?></td>
                            </tr>
                        <?php } ?>
                    </table>

                    <table class="table table-striped outputs">
                        <caption>Outputs</caption>
                        <tr>
                            <th>#</th>
                            <th>Outcome ID</th>
                            <th>Project Output</th>
                            <th>Cluster</th>
                        </tr>
                        <?php foreach ($projectOutputs as $k=> $projectOutput) { ?>
                            <tr>
                                <td><?php echo ++$k ?></td>
                                <td><?php echo getoutcomename($projectOutput['outcome_id']) ?></td>
                                <td><?php echo $projectOutput['output'] ?? null ?></td>
                                <td><?php echo getclustername($projectOutput['cluster_id']) ?></td>
                            </tr>
                        <?php } ?>
                    </table>

                    
                    <table class="table table-striped indicators">
                        <caption>Output Indicators</caption>
                        <tr>
                            <th>#</th>
                            <th>Project Output indicator</th>
                            <th>Means of verification</th>
                            <th>Target</th>
                            <th>Indicator</th>
                            <th>Activities</th>
                        </tr>
                        <?php



                        $ik="1.0.9";
                        $k=getincrement($ik);

                        while ($outputIndicator=mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php

                                    echo getincrement($k);

                                    ?></td>
                                <td><?php echo getoutputname($outputIndicator['output_id']) ?></td>
                                <td><?php

                                    if (!is_null($outputIndicator['mov'])) {
                                        echo "<p>" . prntmov(json_decode($outputIndicator['mov']), $outputIndicator['id']) . "</p>";

                                    }?>
                                </td>
                                <td><?php echo $outputIndicator['target'] ?? null ?></td>
                                <td><?php echo $outputIndicator['indicator'] ?? null ?></td>
                                <td><?php if(!is_null($outputIndicator['activities'])) {
                                        foreach (json_decode($outputIndicator['activities']) as $activity) {
                                            echo "<p>".$activity."</p>" ?? null;
                                        }
                                    } ?>
                                </td>
                            </tr>
                            <?php  $k=getincrement($k++);} ?>
                    </table>

                </div>
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



</body>
</html>


