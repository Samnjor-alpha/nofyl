<?php
include '../config/config.php';
include '../controllers/authcontroller.php';
include '../controllers/session.php';
include '../controllers/helper.php';
include '../controllers/frameworkcontroller.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NoFYl</title>
    <?php include '../css/header.php'?>
    <script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<style>

    /* Important part */
    .modal-dialog{
        overflow-y: initial !important
    }
    .modal-body{
        height: 80vh;
        overflow-y: auto;
    }
    select[multiple], select[size] {
        height: 200px;
        width: 100%;
        position: relative;
        left: -50%;
    }

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
        padding: 0 0 5% 0;
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

<body>

<?php include 'navbar/topbar.php'?>
<div class="container mt-3">
    <h2>        NoFYL Project Documentation Portal
    </h2>
    <?php include 'navbar/tabs.php'?>
    <form method="post" action="">
        <div class="row">
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
                        <td><?php echo $cluster['cluster_name'] ?? null ?></td>
                        <td><?php echo $cluster['subcluster_name'] ?? null ?></td>
                        <td><?php echo $cluster['percentage'] ?? null ?></td>
                    </tr>
                <?php } ?>
                <!-- project info -->
                <table class="table table-bordered">
                    <tr>
                        <th>Project Title</th>
                        <th>Project Fund Code</th>
                        <th>Project Start Date</th>
                        <th>Project End Date</th>
                        <th>Project Duration</th>
                    </tr>
                    <tr>
                        <td><?php echo $project->Title ??null ?></td>
                        <td><?php echo $project->Fund_Code ?? null ?></td>
                        <td><?php echo $project->Start_Date ?? null ?></td>
                        <td><?php echo $project->End_Date ?? null ?></td>
                        <td><?php echo noweeks($project->Start_Date,$project->End_Date) ?></td>
                    </tr>
                </table>
                <!-- end project info -->
            </table>
        </div>

        <div class="row">

            <h3 style="padding-left:3%;"><span style="color:#FF0000">*</span> Mandatory Fields</h3>

        </div>

        <div class="row-title">Clusters</div>

        <div class="row" style="padding-left:5%;">
<div class="offset-3 col-4">

    <select class="form-select form-control" onchange='this.form.submit()' name="clusters" id="clusters">
        <option>Select cluster to fill</option>
        <?php foreach ($clusters as $ki=> $cluster) {
            $xi = $ki+1;
            $id = $cluster['cluster_id']; ?>

            <option value="<?php echo $id ?>"><?php echo $cluster['cluster_name'] ?></option>


        <?php } ?>
    </select>
</div>


        </div>

        <div class="row">


<?php

if (isset($_POST['clusters'])){?>
            <div id="container1" class="container1">
                <h3 class="text-center text-primary">Selected:<?php echo  getclustername($_POST['clusters']) ?></h3>
                                <div class="col02-tab-text">
                                    <table id="employee_table_outcome" align=center>
                                        <input name="cid" type="hidden" value="<?php echo $_POST['clusters']?>">
                                        <tr id="row_out">

                                    </table>


                                </div>

                                <div class="col02-tab-button">


                                </div>

                                <table id="employee_table_outcome" align=center>
                                    <tr id="row_out">

                                </table>


                                <table id="employee_table_ind" align=center>
                                    <tr id="row_ind">

                                </table>

                                <table id="employee_table_ver" align=center>
                                    <tr id="row_act">

                                </table>


                                <table id="employee_table_act" align=center>
                                    <tr id="row_act">

                                </table>

                                <table id="employee_table" align=center>

                                    <tr id="row1">
                                    </tr>
                                </table>


                                <input type="button" onclick="add_row_outcome();" value="+ Add a New Outcome"
                                       class="col2-button">
                            </div>


    <div class="row">
        <input type="submit" name="saveClusters" value="Save Cluster info"
               style="width:20%; height:50px; background:#027a14 !important; color:#fff; border:none;">

    </div>



<?php }else{?>
            <h3 class="text-center text-danger">*Select clusters to fill</h3>
            <?php } ?>
                    </div>



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
                                    <td><a data-toggle="modal" class="text-primary btn btn-sm"  data-target="#viewoutcome"   data-outcome="<?= $projectOutcome['outcome'] ?>"  data-id="<?=$projectOutcome['id'] ?>" title="Add multiple outputs"><?php echo $projectOutcome['outcome'] ?? null ?></a></td>
                                    <td><?php echo getclustername($projectOutcome['cluster_id']) ?></td>
                                </tr>
                            <?php } ?>
                        </table>

                        <table class="table table-striped outputs">
                            <caption>Outputs</caption>
                            <tr>
                                <th>#</th>
                                <th>Outcome</th>
                                <th>Project Output</th>
                                <th>Cluster</th>
                            </tr>
                            <?php foreach ($projectOutputs as $k=> $projectOutput) { ?>
                                <tr>
                                    <td><?php

                                        echo ++$k ?></td>
                                    <td><?php echo getoutcomename($projectOutput['outcome_id']) ?></td>
                                    <td><?=
                                       getoutputs($projectOutput['outcome_id']);
                                          ?></td>
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

                            $cnt=-1;

                                $ik=clusterindex($projectOutputss,"0",$cnt);
$k=getincrement($ik);



                            while ($outputIndicator=mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php

                                        echo getincrement(clusterindex($projectOutputss,$outputIndicator['output_id'],$cnt));


                                         ?></td>
                                    <td><?php echo getoutputname($outputIndicator['output_id']) ?></td>
                                    <td><?php

                                            if (!is_null($outputIndicator['mov'])) {

                                                echo "<p>" . getallmovs($outputIndicator['output_id']) . "</p>";
                                            }
//                                        }else {
//                                        echo "<strong class='text-success'>Verified!</strong>";
//                                        }
                                        ?>
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
                            <?php  $k=getincrement($k++);
                            $cnt++;} ?>
                        </table>

                    </div>




    </form>

</div>
<div class="modal modal-xl fade" id="viewoutcome" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Output</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div  class="modal-body">
                <form method="post" action="" class="">
                    <input  type="hidden" name="outcome_id" id="idd">
                    <div class="form-group">
                        <label for="dname">Outcome Name:</label>
<!--                        <input disabled class="form-control" type="text" readonly  name="outcome" id="dname">-->
                        <span class="text-capitalize" id="dname"></span>
                    </div>
<div class="row form-group">
    <div id="container1" class="container1">

        <table id="employee_table_outcome" align=center>
            <tr id="row_out">

        </table>


        <table id="employee_table_ind" align=center>
            <tr id="row_ind">

        </table>

        <table id="employee_table_ver" align=center>
            <tr id="row_act">

        </table>


        <table id="employee_table_act" align=center>
            <tr id="row_act">

        </table>

        <table id="employee_table" align=center>

            <tr id="row1">
            </tr>
        </table>


        <input type="button" onclick="add_rowO();" value="+ Add a New Output"
               class="col2-button">
    </div>
</div>


                    <div class="form-group mt-2">
                        <button type="submit" name="add_output" class="btn btn-success">Save</button>
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
        $("#employee_table tr:last").after("<tr style='border-top: 1px solid #ccc; margin-top:0px; padding-top:0px;float: left;' id='row" + $rowno + "'><td><h3>Output </h3><textarea  name='output[]' rows='4' cols='100'> </textarea> </td><td><input type='button' value='X' class='col2-buttonX' onclick=delete_row('row" + $rowno + "')><td><input type='button' value='+ Add Indicator' class='col2-button' onclick='add_indicator();'></td></tr>");
    }

    function delete_row(rowno) {
        $('#' + rowno).remove();
    }


    function add_indicator() {
        $rowno_ind = $("#employee_table_ind tr").length;
        $rowno_ind = $rowno_ind + 1;
        $("#employee_table tr:last").after("<tr style='border-top: 1px solid #ccc; margin-top:5px; padding-top:0px;float: left; color:#000;' id='row_ind" + $rowno_ind + "'><h3>Output X</h3><td style='font-weight:bold;'>Code<br><br><?php echo $project->Fund_Code ?? null ?></td><td style='font-weight:bold;'><?php echo  getclustername($_POST['clusters']) ?></td><td style='font-weight:bold;'>Indicator<textarea  name='indicator[text][]' rows='5' cols='20'> </textarea></td><td style='font-weight:bold;'>Means of Verification<br><select name='indicator[mov][]' id='mov' multiple><option value='mov0'>Select</option><option value='mov1'>Coordination Meeting Minutes</option><option value='mov2'>Photos</option><option value='mov3'>Participant List</option><option value='mov4'>Monthly Service Mapping Report</option><option value='mov5'>Monthly Service Monitoring Report</option><option value='mov6'>Training Report</option><option value='mov7'>Awareness Activity Narrative Report</option><option value='mov8'>Safety Audit Training Report</option><option value='mov9'>Safety Audit Report</option><option value='mov10'>Cash For Work Monitoring Report</option><option value='mov11'>Cash For work Narrative Report</option><option value='mov12'>Money Transfer Statement</option><option value='mov13'>Activity Monitoring Report</option><option value='mov14'>CFM Intake Forms</option><option value='mov15'>Narrative Report </option><option value='mov16'>Decongestion Coordination Meeting Minutes</option><option value='mov17'>Human Interest Stories</option><option value='mov18'>Activity Monitoring Report</option><option value='mov19'>Land Tenure Documents</option><option value='mov20'>Beneficiary List</option><option value='mov21'>Post Eviction Monitoring Report</option><option value='mov22'>Money Transfer Statement</option><option value='mov23'>Assessment Report</option><option value='mov24'>Quarterly Assessment Report</option><option value='mov25'>Quarterly Eviction Dashboards</option></select></td><td style='font-weight:bold;'>Total End-Cycle Target<br><br><input type='text' name='indicator[target][]' ></td><td><input type='button' value='X' class='col2-buttonX' onclick=delete_row_ind('row_ind" + $rowno_ind + "')></td><td><input type='button' value='+ Add Activity' class='col2-button' onclick='add_activity();'></td></tr>");
    }

    function delete_row_ind(rowno) {
        $('#' + $rowno).remove();
    }


    function add_activity() {
        $row_act = $("#employee_table_act tr").length;
        $row_act = $row_act + 1;
        $("#employee_table tr:last").after("<tr style='border-top: 1px solid #ccc; margin-top:0px; padding-top:0px;float: left;' id='row_act" + $row_act + "'><td><label>Activity</label></td><td><textarea  name='activity[]' rows='3' cols='150'> </textarea></td></tr>");
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
    function add_rowO() {
        $rowout = $("#employee_table_outcome tr").length;

        $rowout = $rowout + 1;


        $("#employee_table tr:last").after("<tr style='border-top: 1px solid #ccc; margin-top:0px; padding-top:0px;float: left;' id='row_out" + $rowout + "'>" +
            "<td><h3>Output<p id='no'></p></h3><textarea  name='output[]' rows='4' cols='100'></textarea> </td><td><input type='button' value='X' class='col2-buttonX' onclick=delete_row_out('row_out" + $rowout + "')><td>  <input type='button' onclick='add_indicator();' value='+ Add Indicators' class='col2-button'></td></tr>");
    }
    function add_row_outcome() {
        $rowout = $("#employee_table_outcome tr").length;

        $rowout = $rowout + 1;


        $("#employee_table tr:last").after("<tr style='border-top: 1px solid #ccc; margin-top:0px; padding-top:0px;float: left;' id='row_out" + $rowout + "'>" +
            "<td><h3>Outcome<p id='no'></p></h3><textarea  name='outcome[]' rows='4' cols='100'></textarea> </td><td><input type='button' value='X' class='col2-buttonX' onclick=delete_row_out('row_out" + $rowout + "')><td>  <input type='button' onclick='add_row();' value='+ Add Output' class='col2-button'></td></tr>");
    }
    function delete_row_out(rowno) {
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
        $(".modal-body #dname").text( dname );


    });

    });



</script>
</body>
</html>


