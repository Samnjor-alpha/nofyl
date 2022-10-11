<?php
include '../config/config.php';
include '../controllers/auth.php';
include '../controllers/session.php';
include '../controllers/helper.php';
include '../controllers/prjinit.php'
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

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }

        tr {
            padding-top: 30px;
            float: left;
            width: 100%;
        }

    </style>
</head>
<body>

<?php include 'navbar/topbar.php'?>
<div class="container mt-3">
    <h2>        NoFYL Project Documentation Portal
       </h2>
    <?php include 'navbar/tabs.php'?>





    <div class="row">

        <form method="POST" action="">
            <h3>Northern Frontier Youth League – Project Initiation Form</h3>
            <div class="row">
                <div class="col2"><label>Organization:</label></div>
                <div class="col2"><input type="text" name="organization" value="<?php echo $project->organization ?? null ?>" placeholder="organization"/></div>
            </div>

            <div class="row">
                <div class="col2"><label>Allocation:</label></div>
                <div class="col2"><input type="text" name="allocation" value="<?php echo $project->Allocation ?? null ?>" placeholder="Allocation"/></div>
            </div>


            <div class="row">
                <div class="col2"><label>Project Title:</label></div>
                <div class="col2"><input type="text" id="" name="title" value="<?php echo $project->Title ?? null ?>" /></div>
            </div>

            <div class="row">
                <div class="col2"><label>Project Fund Code:</label></div>
                <div class="col2"><input type="text" id="" name="fund_code" rows="1" cols="85" placeholder="0000" value="<?php echo $project->Fund_Code ?? null ?>" /></div>
            </div>

            <div class="row">
                <div class="col2"><label>Project Start Date:</label> <input type="date" id="" name="start_date_int" value="<?php echo $project->Start_Date ?? null ?>"/></div>
                <div class="col2"><label for="category">Project End Date:</label><input type="date" id="" name="end_date_int" value="<?php echo $project->End_Date ?? null ?>" ></div>
            </div>

            <?php if(!empty($clusters)) {
                foreach ($clusters as $k => $cluster) { ?>
                    <div class="row">
                        <div class="col2"><label>Primary Cluster:</label></div>
                        <div class="col2">
                            <input id="" name="cluster_name[]" placeholder="Cluster Name" value="<?php echo $clusters[$k]['cluster_name'] ?? null ?>" />
                            <br><br>

                            <label>Sub Cluster</label>
                            <input id="" name="sub_cluster_name[]" placeholder="Sub Cluster Name" value="<?php echo $clusters[$k]['subcluster_name'] ?? null ?>" /> <br><br>

                            <label>Percentage</label>
                            <input type="number" id="" name="cluster_perc[]" placeholder="%" value="<?php echo $clusters[$k]['percentage'] ?? null ?>" />
                        </div>
                    </div>
                <?php } } else { ?>
                <div class="row">
                    <div class="col2"><label>Primary Cluster:</label></div>
                    <div class="col2">
                        <textarea id="" name="cluster_name[]" rows="2" cols="85" placeholder="Cluster Name"></textarea>
                        <br><br>

                        <label>Sub Cluster</label>
                        <textarea id="" name="sub_cluster_name[]" rows="2" cols="50" placeholder="Sub Cluster Name"></textarea> <br><br>

                        <label>Percentage</label>
                        <input type="number" id="" name="cluster_perc[]" placeholder="%"/>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <table id="employee_table" align=left>

                    <tr id="row1">

                    </tr>
                </table>


                    <input type="button" onclick="add_row();" value="+ Add Another Primary Cluster" class="col-3 col2-button">

            </div>


                <button name="prj_init" style="width:20%; height:50px; margin-top:20px; background:#075f96; color:#fff; border:none;">Create Project</button>


        </form>


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


