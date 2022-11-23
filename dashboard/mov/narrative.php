<?php
include '../../config/config.php';
include '../../controllers/helper.php';
include '../../controllers/addnarrative.php';
include 'inc/header.php' ?>
    <title>Add Narrative</title>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css"/>
    <script src="js/projects.js"></script>
    <script src="js/general.js"></script>
    <script src="js/client.js"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

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
            font-size: 11.5px;
            color: #000;
        }

        .input-form {
            float: left;
            margin-bottom: 10px;
            width: 100%;
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
            padding: 0 0 0 0;
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

        .col3-button {
            background: Yellow;
            color: #000;
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

        .col0_2 {
            width: 30%;
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
            color: #000;
            width: 92%;

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

        /* RESET */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* STYLING */
        .container1 {

            color: #a2a2a2;
            font-family: "Nunito Sans", Arial, Helvetica, sans-serif;
        }

        .tabs-container {
            width: 100%;
            margin: auto;
        }

        /* Style the tabs */
        .tabs {
            margin-bottom: 28px;
            display: flex;
            margin-right: 20px;
        }

        .tabs a {
            cursor: pointer;
            padding: 12px 24px;
            text-align: center;
            font-weight: bold;
            transition: background 0.1s, color 0.1s;
            background: #075f96 !important;
            color: #fff;
            margin-left: 15px;
        }


        /* Change background color of tabs on hover */
        .tabs a:hover {
            background: linear-gradient(145deg, #f4f4f4, #cecece);
            color: #888;
        }

        .darkmode .tabs a:hover {
            background: #141414;
            color: #bbb;
        }

        /* Styling for active tab */
        .tabs a.active {
            color: #fff;
            cursor: default;
            padding: 14px 22px 10px 26px;
            background: #027a14 !important;
        }

        .darkmode .tabs a.active {
            background: #1A1B1F;
            color: #fff;
        }


        /* Style the tab content */
        .tabcontent {
            padding: 18px;
            display: none;
        }


        .content .active {
            display: block;
        }

        .tabcontent p {
            margin-bottom: 12px;
        }

        .tabcontent p:last-child {
            margin-bottom: 0;
        }

        .tabcontent .read-more-link a {
            color: #626262;
            text-decoration: none;
            font-size: 0.85em;
            font-weight: bold;
        }

        .darkmode .tabcontent .read-more-link a {
            color: #d4d4d4;
        }

        .icon {
            padding-left: 8px;
            font-size: 16px;
        }

        /* THE DARKMODE SWITCH */
        .dark-mode-switch {
            position: absolute;
            top: 16px;
            right: 16px;
        }

        .dark-mode-switch .switch {
            /*     margin-left: 4px; */
        }

        .switch-label {
            cursor: pointer;
            font-size: 0.85em;
        }

        /* the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 22px;
            margin-left: 4px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #1A1B1F;
            transition: .2s;
            box-shadow: 2px 2px 3px #ffffff,
            -2px -2px 3px #bebebe;
        }

        .darkmode .slider {
            box-shadow: 2px 2px 3px #34353a,
            -2px -2px 3px #000104;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 2px;
            background: #9294b8;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #f4f4f4;
        }

        input:checked + .slider:before {
            transform: translateX(21px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 11px;
        }

        .slider.round:before {
            border-radius: 50%;
        }


        /*==============================*/
        .small-screen {
            display: none;
            background-color: #f4f4f4;
            height: 100vh;
            color: #a2a2a2;
            font-family: "Nunito Sans", Arial, Helvetica, sans-serif;
        }

        .darkmode .small-screen {
            background-color: #1A1B1F;
            color: #8a8a8a;
        }

        .small-screen-content {
            width: 70%;
            margin: auto;
        }

        @media only screen and (max-width: 600px) {
            .container {
                display: none;
            }

            .small-screen {
                display: flex;
            }

            .tabcontent {
                display: block;
            }
        }


        label {
            display: inline-block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: 700;
            color: #000;
        }

        .table > caption + thead > tr:first-child > td, .table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > td, .table > thead:first-child > tr:first-child > th {
            border-top: 0;
            color: #000;
        }

        td {
            padding: 30px;
        }


    </style>
<?php include('inc/container.php'); ?>
    <div class="container">
        <form method="post" action="" enctype="multipart/form-data">


            <div class="row-title">Monthly Activity Updates.<br>
                NoFYL Internal Monitoring and Reporting Tool.
            </div>

            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Standard Activity:</label></div>

                <div class="col02-tab-text">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Activity Code: <br>
                                <input name="act_code" type="number"></th>
                            <th>Activity Name:<br> <textarea id="" name="activity" style="width:80%; height:50px;"></textarea>
                            </th>

                        </tr>
                        </thead>
                    </table>

                </div>


            </div>


            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Activity Description: </label></div>

                <div class="col02-tab-text"><textarea id="" name="act_desc" style="width:80%; height:200px;"></textarea></div>


            </div>

            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Activity Indicator:</label></div>

                <div class="col02-tab-text"><textarea  name=act_ind"" style="width:80%; height:50px;"></textarea></div>


            </div>

            <div class="row" style="padding-left:5%;">

                <div class="col02"></div>

                <div class="col02-tab-text">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Indicator Target: <br>
                                <input  name="ind_target" type="number"></th>
                            <th>Cumulative Target Reached:<br> <input
                                        name="cu_target"
                                        type="number"></th>
                            <th>Target Reached:<br> <input name="target" type="number"></th>
                        </tr>
                        </thead>
                    </table>
                </div>


            </div>


            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Reporting Period: </label></div>

                <div class="col02-tab-text">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>From: <br> <input name="fromD" type="date"></th>
                            <th>To:<br> <input name="toD" type="date"></th>
                        </tr>
                        </thead>
                    </table>
                </div>


            </div>


            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Name & Title of Reporter: </label></div>

                <div class="col02-tab-text">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name: <br> <input name="name" type="text" style="width:100%"></th>
                            <th>Title:<br> <input name="title" type="text" style="width:100%"></th>
                        </tr>
                        </thead>
                    </table>
                </div>


            </div>


            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Summary:</label></div>

                <div class="col02-tab-text"><textarea id="" name="summary" style="width:80%; height:100px;"></textarea></div>


            </div>


            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Key Achievements:</label></div>

                <div class="col02-tab-text"><textarea id="" name="achievement" style="width:80%; height:100px;"></textarea></div>


            </div>

            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Challenges: </label></div>

                <div class="col02-tab-text"><textarea id="" name="challenge" style="width:80%; height:100px;"></textarea></div>


            </div>


            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Recommendations:</label></div>

                <div class="col02-tab-text"><textarea id="" name="recommendation" style="width:80%; height:100px;"></textarea></div>


            </div>

            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Coordination & Advocacy:</label></div>

                <div class="col02-tab-text"><textarea id="" name="advocacy" style="width:80%; height:100px;"></textarea></div>


            </div>



            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Human Interest Stories:</label></div>

                <div class="col02-tab-text"><textarea id="" name="stories" style="width:80%; height:300px;"></textarea></div>


            </div>


            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Upload Photos:</label></div>

                <div class="col02-tab-text"><input type="file"  name="files"
                           accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*"
                            ></div>


            </div>


            <div class="row">

                <input type="submit" name="saveReport" value="Save Report"
                       style="width:20%; height:50px; background:#027a14 !important; color:#fff; border:none;">

            </div>

        </form>




    </div>
<?php include('inc/footer.php'); ?>