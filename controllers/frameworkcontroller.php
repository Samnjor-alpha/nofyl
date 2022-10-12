<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $prjid = $_GET['id'];
} else {
    header('Location:home.php');
}
$project = [];
$cover = [];
$clusters = [];
$clusters = mysqli_query($conn, "select * from clusters where project_id='$prjid'");
$resultproject = mysqli_query($conn, "select * from prj_init where ID='$prjid'");
$project = $resultproject->fetch_object();
