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

$resultcomment=mysqli_query($conn,"select * from project_grants where prj_id='$prjid'");
$comments=$resultcomment->fetch_object();

if (isset($_POST['grant'])){
    $userid=$project->prepared_by;
    $prjid=$_GET['id'];
    $comment=$_POST['comment'];
    $sqlcomment="insert into project_grants set user_id='$userid',prj_id='$prjid', edit='1', comments='$comment'";

    if (mysqli_query($conn, $sqlcomment)){
        $msg = "Comment added and permission granted successfully";
        $msg_class = "alert-success";
        $msg_icon = "bi-check-circle";
        header("refresh:2;url=viewproject.php?id=$prjid");
    }
}

function checkcomment($id): bool
{
    global $conn;
    $getdata=mysqli_query($conn,"select * from project_grants where prj_id='$id'");
    if (mysqli_num_rows($getdata)>0){
        return true;
    }else{
        return false;
    }
}