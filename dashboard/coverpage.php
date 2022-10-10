<?php
include '../config/config.php';
include '../controllers/auth.php';
include '../controllers/session.php';
include '../controllers/helper.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NoFYl</title>
<?php include '../css/header.php'?>
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

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

        </table>
        <div class="row">
            <h5><span style="color:#FF0000">*</span> Mandatory Fields</h5>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Project Summary</td>
                <td colspan="4">
            <textarea name="summary" style="width: 100%; height: auto">
                <?php echo $cover->project_summary ?? null ?>
            </textarea>
                </td>
            </tr>
        </table>
        <div class="row">
            <div class="row-title">2. Country Context & Funding</div>

            <div class="row" style="padding-left:5%;">
                <label for="title">Specific Needs Assessment:</label>
                <textarea id="" name="needs_assessment" >

        </textarea>
            </div>

            <div class="row" style="padding-left:5%;">
                <label for="title">Grant Request Justification:</label>
                <textarea id="" name="justification" >

        </textarea>
            </div>

            <div class="row" style="padding-left:5%;">
                <label for="title">Link to Allocation Strategy:</label>
                <textarea id="" name="allocation_strategy" >

        </textarea>
            </div>

            <div class="row   col-3 mt-3" style="margin-left: 25px">
                <button name="saveCover"  class="btn btn-lg btn-success">Save Cover Page</button>
            </div>
    </form>
    <div class="row" style="padding-left:5%;">
        <label for="title">Comments for Cover Page:</label>
        <form method="post" action="">
            <textarea id="" name="comments" ><?php echo $cover->comments ?? null ?></textarea>
            <br>
            <input type="submit" class="btn btn-secondary" name="saveComment" value="Save Comment">
        </form>
    </div>


</div>
</body>
</html>


