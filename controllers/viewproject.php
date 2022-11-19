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
function getassignedemailsall($prjid): array
{
    global $conn;
    $getemails=mysqli_query($conn,"select * from project_users inner join pm_users where 
                                                    project_users.prj_id='$prjid' and
                                                    project_users.user_id=pm_users.id
                                                    ");

    $returnData = array();
    $index = 0;
    while($row = $getemails->fetch_assoc()){
        $returnData[$index] = $row['email'];
        $index++;
    }
    return $returnData;

}
function getassignedemails($prjid,$userid): array
{
    global $conn;
    $getemails=mysqli_query($conn,"select * from project_users inner join pm_users where 
                                                    project_users.prj_id='$prjid' and
                                                    project_users.user_id=pm_users.id
and 
                                                    pm_users.id!='$userid'
                                                    ");

    $returnData = array();
    $index = 0;
    while($row = $getemails->fetch_assoc()){
        $returnData[$index] = $row['email'];
        $index++;
    }
    return $returnData;

}
function getprojectcode($prjid){
    global $conn;
    $getdata=mysqli_query($conn,"select Fund_Code from prj_init where ID='$prjid'");

return mysqli_fetch_assoc($getdata)['Fund_Code'];
}

function sendemailnotification($to,$projectid){
    $mail = getMail();
    $mail->From = EMAIL_SMTP_USERNAME;
    $mail->FromName = "NOFYL";

    $addresses = explode(',', $to);
    foreach ($addresses as $address) {
        $mail->addBCC($address);
    }



    $mail->WordWrap = 50;                                 // set word wrap to 50 characters
    // optional name
    $mail->IsHTML(true);                                  // set email format to HTML

    $mail->Subject = "NEW COMMENT ON YOUR ASSIGNED PROJECT";
    $mail->Body    = "<div>
<p>A comment has been added to the project assigned.Login to your account and make the changes suggested</p>
<br>
<b>Project Code:</b>".getprojectcode($projectid).";

</div>";


    if(!$mail->Send())
    {

        return true;
    }else{
        return false;
    }
}
