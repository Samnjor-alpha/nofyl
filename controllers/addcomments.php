<?php
if (isset($_POST['addcomment'])){
    date_default_timezone_set('Africa/Nairobi');
    $userid=$project->prepared_by;
    $prjid=$_GET['id'];
    $comments=$_POST['comment'];
    $today=date("Y-m-d H:i:s");

    $sqlcomment="insert into wp_comments set prj_id='$prjid', comments='$comments',added_at='$today', added_by='".$_SESSION['user_id']."'";

    if (mysqli_query($conn, $sqlcomment)) {
        $location = 'viewproject.php?id=' . $prjid;
    if ($_SESSION['role']=='admin'){
        $to=implode(',',getassignedemailsall($prjid));
        sendemailnotification($to,$prjid);
    }else{
        $to=implode(',',getassignedemails($prjid,$_SESSION['user_id']));
        sendemailnotification($to,$prjid);
    }

        echo "<script>
toastr.success('Added successfully','Comment added');

setTimeout(function(){
            window.location.href = '$location';
         }, 2000);
</script>";

    }
}
if (isset($_GET['id'])&&isset($_GET['approve'])){
    global $conn;
    $user="update prj_init set prj_status='1' where ID='".$_GET['id']."'";

    if (mysqli_query($conn, $user)) {
$location=$_SERVER['SCRIPT_NAME'].'?id='.$_GET['id'].'';
        echo "<script>
toastr.success('Project approved','Approved');
window.location.href='$location';
</script>";

    }
}
if (isset($_POST['add_mov_cmnt'])){
    date_default_timezone_set('Africa/Nairobi');
$prjid=$_GET['id'];
    $movid=$_POST['mov_id'];
    $comments=$_POST['comment'];
    $today=date("Y-m-d H:i:s");

    $sqlcomment="insert into movs_cmnts set mov_id='$movid',prj_id='".$_GET['id']."', mov_comment='$comments',added_at='$today', added_by='".$_SESSION['user_id']."'";

    if (mysqli_query($conn, $sqlcomment)) {
        $location = 'viewclusters.php?id=' . $prjid;
           echo "<script>
toastr.success('Added successfully','Comment added');
            window.location.href = '$location';
         
</script>";

    }else{
        echo "<script>
toastr.error('An error occurred','Error');
            window.location.href = '$location';
         
</script>";
    }

}