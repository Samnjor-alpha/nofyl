<?php
include '../config/config.php';
include '../controllers/authcontroller.php';
include '../controllers/session.php';
include '../controllers/helper.php';
include '../controllers/viewproject.php';
include '../controllers/activitymonitor.php'
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
        p {


            font-size: 13px;
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









    <div id="print">

        <div class="row row-title">
            <div class="offset-4 col-6">
                NoFYL Internal Monitoring and Reporting Tool
            </div>
        </div>

        <div class="row">
            <div class="col-2"><h6>Reporting Period:</h6></div>
            <div class="col-10"><p><?= date("M Y",strtotime($acc_monitor->fromD))." to ".date("M Y",strtotime($acc_monitor->toD))?></p></div>


            <div class="col-2"><h6>Program:</h6></div>
            <div class="col-10"><p><?= $acc_monitor->programme?></p></div>


            <div class="col-2"><h6>Filled By:</h6></div>
            <div class="col-10"><p><?= $acc_monitor->filledby ?></p></div>
        </div>

        <div class="row">
            <div class="col-4">
                <h6>A:SUMMARY FOR THE QUARTER</h6>
            </div>

            <div class="col-8">
                <?= $acc_monitor->summary ?>
            </div>
        </div>


        <div class="row">
            <div class="col-3"><h6>Achieved Results:</h6></div>
            <div class="col-3"><p><?= "<h6>Activity:</h6>".$acc_monitor->activity ?></p></div>
            <div class="col-3"><p><?= "<h6>Deliverables in Reporting Period:</h6>".$acc_monitor->deliverables ?></p></div>
            <div class="col-3"><p><?= "<h6>Status Update:</h6>".$acc_monitor->s_update ?></p></div>
        </div>
        <div class="row-title"><h6>Training for the period:</h6></div>
        <div class="row">
            <div class="col-3"><h6>Day month:</h6><?= date("M Y",strtotime($acc_monitor->daymonth)); ?></div>
            <div class="col-3"><h6>Training Topic:</h6><p><?= $acc_monitor->training ?></p></div>
            <div class="col-3"><h6>Training Participants:</h6><p><?= $acc_monitor->participants ?></p></div>
            <div class="col-3"><h6>Training Participants:</h6><p><?= $acc_monitor->no_participants ?></p></div>
        </div>


    </div>


</div>


</body>
</html>
