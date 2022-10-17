<?php
if (isset($_GET['id']) && !empty($_GET['id'])){
    $prjid=$_GET['id'];
}else{
    header('Location:home.php');
}
$project = [];
$cover = [];
$clusters = [];
$framework = [];
$clusters=mysqli_query($conn,"select * from clusters where project_id='$prjid'");
$resultcover=mysqli_query($conn,"select * from cover_pages where project_id='$prjid'");
$cover= $resultcover->fetch_object();
$resultframework=mysqli_query($conn,"select * from frameworks where project_id='$prjid'");
$framework=$resultframework->fetch_object();
$resultproject=mysqli_query($conn,"select * from prj_init where ID='$prjid'");
$project = $resultproject->fetch_object();
