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