<?php
include '../config/config.php';
include '../controllers/auth.php';
include '../controllers/session.php';
include '../controllers/helper.php';
include '../controllers/coverpagecontroller.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NoFYl</title>
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
            padding: 15px 0 0 3%;
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
            font-size: 11.5px;
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
    </style>
</head>
<body>

<?php include 'navbar/topbar.php'?>
<div class="container mt-3">
    <h2>        NoFYL Project Documentation Portal
    </h2>
    <?php include 'navbar/tabs.php'?>
</div>
<div class="container mt-3">

    <form method="post" action="">
        <table class="table table-bordered">
            <tr>
                <th>Organization</th>
                <th>Allocation Type</th>
                <th>Primary Cluster</th>
                <th>Sub Cluster</th>
                <th>Percentage</th>
            </tr>
            <?php foreach ($clusters as $k => $cluster) { ?>
                <tr>
                    <td><?php echo $project->organization ?></td>
                    <td><?php echo $project->Allocation ?></td>
                    <td><?php echo $cluster['cluster_name'] ?></td>
                    <td><?php echo $cluster['subcluster_name'] ?></td>
                    <td><?php echo $cluster['percentage'] ?></td>
                </tr>
            <?php } ?>
        </table>



<div class="row">
    <h3 style="padding-left:3%;"><span style="color:#FF0000">*</span> Mandatory Fields</h3>
</div>

<div class="row-title">1. Project Information</div>
<table class="table table-bordered">
    <tr>
        <th>Project Title</th>
        <th>Project Fund Code</th>
        <th>Project Start Date</th>
        <th>Project End Date</th>
        <th>Project Duration</th>
    </tr>
    <tr>
        <td><?php echo $project->Title ?></td>
        <td><?php echo $project->Fund_Code ?></td>
        <td><?php echo $project->Start_Date ?></td>
        <td><?php echo $project->End_Date ?></td>
        <td><?php echo noweeks($project->Start_Date,$project->End_Date) ?></td>
    </tr>
    <tr>
        <td>Project Summary</td>
        <td colspan="4">
            <textarea name="summary"
                      style="width: 100%; height: auto"><?php echo $cover->project_summary ?? null ?></textarea>
        </td>
    </tr>
</table>
<div class="row">
    <div class="row-title">2. Country Context & Funding</div>

    <div class="row" style="padding-left:5%;">
        <label for="title">Specific Needs Assessment:</label>
        <textarea  name="needs_assessment"
                   style="width:80%; height:100px;"><?php echo $cover->needs_assessment ?? null ?></textarea>
    </div>

    <div class="row" style="padding-left:5%;">
        <label for="title">Grant Request Justification:</label>
        <textarea  name="justification"
                   style="width:80%; height:100px;"><?php echo $cover->justification ?? null ?></textarea>
    </div>

    <div class="row" style="padding-left:5%;">
        <label for="title">Link to Allocation Strategy:</label>
        <textarea  name="allocation_strategy"
                   style="width:80%; height:100px;"><?php echo $cover->allocation_strategy ?? null ?></textarea>
    </div>

    <div class="row">
        <input type="submit" name="saveCover" value="Save Cover Page" style="width:20%; height:50px; background:#027a14 !important; color:#fff; border:none;">
    </div>
    </form>

</div>



</body>
</html>


