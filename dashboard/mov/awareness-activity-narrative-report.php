<?php
include '../../config/config.php';
include '../../controllers/helper.php';
include '../../controllers/awareness.php';
include 'inc/header.php';
include '../../controllers/authcontroller.php';
include '../../controllers/session.php'; ?>
    <title>Awareness Activity Report</title>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css"/>
    <script src="js/projects.js"></script>
    <script src="js/general.js"></script>
    <script src="js/client.js"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
<?php include '../../css/header.php'?>

    <style>
        .row {
            width: 100%;
            padding: 20px 0 20px 20px;
            border-bottom: 1px solid #ccc;
            
        }

        .col1 {
            width: 50%;
            float: left;
        }

        .col2 {
            width: 50%;
            float: left;
            
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

        <div class="col-4 mb-4">
            <?php
            if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'supervisor') {
                echo "<a data-toggle='modal' class='btn btn-primary btn-sm'  data-target='#viewoutcome' data-id='" . $_GET['id'] . "'>Add Comment</a>";

            }

            ?>
        </div>
        <form action="" method="post">


            <div class="row-title">Awareness Activity Narrative Report</div>

            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Report Title:</label></div>



                <div class="col02-tab-text"><textarea id="" name="title" style="width:80%; height:30px;"><?php echo $row['title'] ?? null ?></textarea></div>


            </div>


            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Reporting Period:</label></div>

                <div class="col02-tab-text">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>From <br> <input value="<?php echo $row['fromD'] ?? null ?>" name="from" type="date"></th>
                            <th>To<br> <input type="date" value="<?php echo $row['toD'] ?? null ?>" name="to"></th>

                        </tr>
                        </thead>
                    </table>

                </div>


            </div>

            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Outcome:</label></div>

                <div class="col02-tab-text"><textarea id="" name="outcome" style="width:80%; height:100px;"><?php echo $row['outcome'] ?? null ?></textarea></div>


            </div>

            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Output:</label></div>

                <div class="col02-tab-text"><textarea id="" name="output" style="width:80%; height:70px;"><?php echo $row['output'] ?? null ?></textarea></div>


            </div>


            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Target:</label></div>

                <div class="col02-tab-text">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Indicator Target <br> <input value="<?php echo $row['ind_target'] ?? null ?>" name="ind_target" type="number"></th>
                            <th>Cumulative Reached<br> <input value="<?php echo $row['cu_reached'] ?? null ?>" name="cu_target" type="number"></th>
                            <th>Target Reached<br> <input value="<?php echo $row['target'] ?? null ?>" name="target" type="number"></th>

                        </tr>
                        </thead>
                    </table>

                </div>


            </div>


            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Target Reached by District:</label></div>

                <div class="col02-tab-text">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>District <br> <input value="<?php echo $row['district'] ?? null ?>"  name="district" type="text"></th>
                            <th>Men<br> <input type="number" value="<?php echo $row['men'] ?? null ?>" name="men"></th>
                            <th>Women<br> <input type="number" value="<?php echo $row['women'] ?? null ?>" name="women"></th>
                            <th>Boys<br> <input type="number" value="<?php echo $row['boys'] ?? null ?>" name="boys"></th>
                            <th>Girls <br> <input type="number" value="<?php echo $row['girls'] ?? null ?>" name="girls"></th>


                        </tr>
                        </thead>
                    </table>
                </div>


            </div>


            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Aim of
                        Awareness:</label></div>

                <div class="col02-tab-text"><textarea id="" name="awareness" style="width:80%; height:100px;"><?php echo $row['aim_aware'] ?? null ?></textarea></div>


            </div>


            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Why the Need for Awareness:</label></div>

                <div class="col02-tab-text"><textarea id="" name="n_awareness" style="width:80%; height:100px;"><?php echo $row['need_aware'] ?? null ?></textarea></div>


            </div>

            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Achievements:</label></div>

                <div class="col02-tab-text"><textarea id="" name="achievements" style="width:80%; height:100px;"><?php echo $row['achievements'] ?? null ?></textarea></div>


            </div>


            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Awareness Methodologies:</label></div>

                <div class="col02-tab-text"><textarea id="" name="methodologies" style="width:80%; height:100px;"><?php echo $row['methodologies'] ?? null ?></textarea></div>


            </div>

            <div class="row" style="padding-left:5%;">

                <div class="col02"><label for="title">Awareness Outcomes:</label></div>

                <div class="col02-tab-text"><textarea id="" name="aware_outcome" style="width:80%; height:100px;"><?php echo $row['outcomes'] ?? null ?></textarea></div>


            </div>







    <div class="row">
<?php if (mysqli_num_rows($awareness)<1){ ?>
        <input type="submit" value="Save Report"
               name="saveReport"
               style="width:20%; height:50px; background:#027a14 !important; color:#fff; border:none;">
<?php }else { ?>
        <input type="hidden" name="aid" value="<?= $row['id'] ?>">
    <input type="submit" value="Update Report"
           name="updateReport"
           style="width:20%; height:50px; background:#027a14 !important; color:#fff; border:none;">
        <?php } ?>
    </div>

    </form>
    </div>

    <script>


        function add_row() {
            add
            $rowno = $("#employee_table tr").length;
            $rowno = $rowno + 1;
            $("#employee_table tr:last").after("<tr style='border-top: 1px solid #ccc; margin-top:0px; padding-top:0px;float: left;' id='row" + $rowno + "'><td><h3>Output X</h3><textarea  name='name[]' rows='4' cols='100'> </textarea> </td><td><input type='button' value='X' class='col2-buttonX' onclick=delete_row('row" + $rowno + "')><td><input type='button' value='+ Add Indicator' class='col2-button' onclick='add_indicator();'></td></tr>");
        }

        function delete_row(rowno) {
            $('#' + rowno).remove();
        }


        function add_indicator() {
            $rowno_ind = $("#employee_table_ind tr").length;
            $rowno_ind = $rowno_ind + 1;
            $("#employee_table tr:last").after("<tr style='border-top: 1px solid #ccc; margin-top:5px; padding-top:0px;float: left; color:#000;' id='row_ind" + $rowno_ind + "'><h3>Output X</h3><td style='font-weight:bold;'>Code<br><br>X</td><td style='font-weight:bold;'>Cluster<br><br>X</td><td style='font-weight:bold;'>Indicator<br><br><textarea  name='name[]' rows='5' cols='40'> </textarea></td><td style='font-weight:bold;'>Means of Verification<br><select name='mov' id='mov'><option value='mov0'>Select</option><option value='mov1'>Coordination Meeting Minutes</option><option value='mov2'>Photos</option><option value='mov3'>Participant List</option><option value='mov4'>Monthly Service Mapping Report</option><option value='mov5'>Monthly Service Monitoring Report</option><option value='mov6'>Training Report</option><option value='mov7'>Awareness Activity Narrative Report</option><option value='mov8'>Safety Audit Training Report</option><option value='mov9'>Safety Audit Report</option><option value='mov10'>Cash For Work Monitoring Report</option><option value='mov11'>Cash For work Narrative Report</option><option value='mov12'>Money Transfer Statement</option><option value='mov13'>Activity Monitoring Report</option><option value='mov14'>CFM Intake Forms</option><option value='mov15'>Narrative Report </option><option value='mov16'>Decongestion Coordination Meeting Minutes</option><option value='mov17'>Human Interest Stories</option><option value='mov18'>Activity Monitoring Report</option><option value='mov19'>Land Tenure Documents</option><option value='mov20'>Beneficiary List</option><option value='mov21'>Post Eviction Monitoring Report</option><option value='mov22'>Money Transfer Statement</option><option value='mov23'>Assessment Report</option><option value='mov24'>Quarterly Assessment Report</option><option value='mov25'>Quarterly Eviction Dashboards</option></select></td><td style='font-weight:bold;'>Total End-Cycle Target<br><br><input type='text'></td><td><input type='button' value='X' class='col2-buttonX' onclick=delete_row_ind('row_ind" + $rowno_ind + "')></td><td><input type='button' value='+ Add Activity' class='col2-button' onclick='add_activity();'></td></tr>");
        }

        function delete_row_ind(rowno) {
            $('#' + $rowno).remove();
        }


        function add_activity() {
            $row_act = $("#employee_table_act tr").length;
            $row_act = $row_act + 1;
            $("#employee_table tr:last").after("<tr style='border-top: 1px solid #ccc; margin-top:0px; padding-top:0px;float: left;' id='row_act" + $row_act + "'><td><label>Activity</label></td><td><textarea  name='name[]' rows='3' cols='150'> </textarea></td></tr>");
        }

        function delete_row_act(row_act) {
            $('#' + $row_act).remove();
        }


        function add_ver() {
            $row_ver = $("#employee_table_ver tr").length;
            $row_ver = $row_ver + 1;
            $("#employee_table tr:last").after("<tr style='border-top: 1px solid #ccc; margin-top:0px; padding-top:0px;float: left;' id='row" + $row_ver + "'><td><label>Text:</label></td><td><textarea  name='name[]' rows='7' cols='100'> </textarea></td><td><label>Upload Files:</label></td><td><input type='file' id='myFile' name='filename'></td><td><input type='button' value='X' class='col2-buttonX' onclick=delete_row_ver('row" + $row_ver + "')></td></tr>");
        }

        function delete_row_ver(row_ver) {
            $('#' + $row_ver).remove();
        }


        function add_row_outcome() {
            $rowout = $("#employee_table_outcome tr").length;
            $rowout = $rowout + 1;
            $("#employee_table tr:last").after("<tr style='border-top: 1px solid #ccc; margin-top:0px; padding-top:0px;float: left;' id='row_out" + $rowout + "'><td><h3>Agenda Title:</h3><textarea  name='name[]' rows='2' cols='30'> </textarea> </td><td><h3>Details:</h3><textarea  name='name[]' rows='7' cols='100'> </textarea> </td><td><input type='button' value='X' class='col2-buttonX' onclick=delete_row_out('row_out" + $rowout + "')></tr>");
        }

        function delete_row_out(rowno) {
            $('#' + rowno).remove();
        }


        // DOM Elements
        const tabs = document.querySelectorAll('.tab')
        const tabContents = document.querySelectorAll('.tabcontent')
        const darkModeSwitch = document.querySelector('#dark-mode-switch')

        // Functions
        const activateTab = tabnum => {

            tabs.forEach(tab => {
                tab.classList.remove('active')
            })

            tabContents.forEach(tabContent => {
                tabContent.classList.remove('active')
            })

            document.querySelector('#tab' + tabnum).classList.add('active')
            document.querySelector('#tabcontent' + tabnum).classList.add('active')
            localStorage.setItem('jstabs-opentab', JSON.stringify(tabnum))

        }

        // Event Listeners
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                activateTab(tab.dataset.tab)
            })
        })

        darkModeSwitch.addEventListener('change', () => {
            document.querySelector('body').classList.toggle('darkmode')
            localStorage.setItem('jstabs-darkmode', JSON.stringify(!darkmode))
        })

        // Retrieve stored data
        let darkmode = JSON.parse(localStorage.getItem('jstabs-darkmode'))
        const opentab = JSON.parse(localStorage.getItem('jstabs-opentab')) || '3'

        // and..... Action!
        if (darkmode === null) {
            darkmode = window.matchMedia("(prefers-color-scheme: dark)").matches // match to OS theme
        }
        if (darkmode) {
            document.querySelector('body').classList.add('darkmode')
            document.querySelector('#dark-mode-switch').checked = 'checked'
        }
        activateTab(opentab)


    </script>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


<?php
include 'addcomment.php';
include '../../controllers/addcomments.php';
include('inc/footer.php');
?>