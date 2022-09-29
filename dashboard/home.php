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


    <!-- Horizontal Form -->
    <div class="mt-4">
    <form>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-5  col-form-label">Organization:</label>
            <div class="col-sm-4">
                <input type="text" class="" id="inputText">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-5  col-form-label">Allocation:</label>
            <div class="col-sm-4">
                <input type="text" class="" id="inputText">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-5  col-form-label">Project Title:</label>
            <div class="col-sm-4">
                <input type="text" class="" id="inputText">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-5  col-form-label">
                Project Fund Code:</label>
            <div class="col-sm-4">
                <input type="text" class="" id="inputText">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-5  col-form-label">Project Start Date:</label>
            <div class="col-sm-4">
                <input type="text" class="" id="inputText">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-5  col-form-label">Project End  Date:</label>
            <div class="col-sm-4">
                <input type="text" class="" id="inputText">
            </div>
        </div>
    </form>
    </div>
</div>

</body>
</html>


