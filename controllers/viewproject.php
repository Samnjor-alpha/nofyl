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
$comments=[];
$clusters=mysqli_query($conn,"select * from clusters where project_id='$prjid'");
$resultcover=mysqli_query($conn,"select * from cover_pages where project_id='$prjid'");
$cover= $resultcover->fetch_object();
$resultframework=mysqli_query($conn,"select * from frameworks where project_id='$prjid'");
$framework=$resultframework->fetch_object();
$resultproject=mysqli_query($conn,"select * from prj_init where ID='$prjid'");
$project = $resultproject->fetch_object();

$resultcomment=mysqli_query($conn,"select * from wp_comments where prj_id='$prjid'");
$assigned=mysqli_query($conn,"select * from project_users where prj_id='$prjid'");

if (isset($_POST['grant'])){
    $userid=$project->prepared_by;
    $prjid=$_GET['id'];

    $sqlcomment="insert into project_grants set user_id='$userid',prj_id='$prjid', edit='1', granted_by='".$_SESSION['user_id']."'";

    if (mysqli_query($conn, $sqlcomment)){
        $msg = "permission granted successfully";
        $msg_class = "alert-success";
        $msg_icon = "bi-check-circle";
        header("refresh:2;url=viewproject.php?id=$prjid");
    }
}

if (isset($_POST['revoke'])){

    $prjid=$_GET['id'];

    $sqlcomment="delete from  project_grants where prj_id='$prjid'";

    if (mysqli_query($conn, $sqlcomment)){
        $msg = "permission Revoked successfully";
        $msg_class = "alert-success";
        $msg_icon = "bi-check-circle";
        header("refresh:2;url=viewproject.php?id=$prjid");
    }
}
function checkcomment($id): bool
{
    global $conn;
    $getdata=mysqli_query($conn,"select * from wp_comments where prj_id='$id'");
    if (mysqli_num_rows($getdata)>0){
        return true;
    }else{
        return false;
    }
}
function checkgrants($id): bool
{
    global $conn;
    $getdata=mysqli_query($conn,"select * from project_grants where prj_id='$id'");
    if (mysqli_num_rows($getdata)>0){
        return true;
    }else{
        return false;
    }
}


