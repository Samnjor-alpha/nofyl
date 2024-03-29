<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';
/**
 */
function getMail(): PHPMailer
{
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail = new PHPMailer(true);


    $mail->IsSMTP();
    $mail->SMTPDebug =false;
    $mail->SMTPAuth = EMAIL_SMTP_AUTH;
    $mail->SMTPSecure = EMAIL_SMTP_ENCRYPTION;
    $mail->Host = EMAIL_SMTP_HOST;
    $mail->Port = EMAIL_SMTP_PORT; // or 587

    $mail->Username = EMAIL_SMTP_USERNAME;
    $mail->Password = EMAIL_SMTP_PASSWORD;


    return $mail;
}

function active($currect_page): void
{
    $url_array =  explode('/', $_SERVER['PHP_SELF']) ;
    $url = end($url_array);
    if($currect_page == $url){
        echo 'active'; //class name in css
    }
}
function noweeks($startDate,$endDate)
{


// Declare and define two dates
$date1 = strtotime($startDate);
$date2 = strtotime($endDate);

// Formulate the Difference between two dates
$diff = abs($date2 - $date1);

// To get the year divide the resultant date into
// total seconds in a year (365*60*60*24)
$years = floor($diff / (365 * 60 * 60 * 24));

// To get the month, subtract it with years and
// divide the resultant date into
// total seconds in a month (30*60*60*24)
$months = floor(($diff - $years * 365 * 60 * 60 * 24)
    / (30 * 60 * 60 * 24));

// To get the day, subtract it with years and
// months and divide the resultant date into
// total seconds in a days (60*60*24)
$days = floor($diff  / (60 * 60 * 24));

 $weeks=floor($diff/(60 * 60 *24*7));

    $months = floor($days/30);

    if ($days<28){
    return $weeks."weeks";
}else{
    return $months." months";
}
//// Print the result
//printf("%d years, %d months, %d days", $years, $months,
//    $days);
}
function getclustername( $clusters)
{
    global $conn;
    $select=mysqli_query($conn,"select cluster_name from clusters where cluster_id='$clusters'");
    return mysqli_fetch_assoc($select)['cluster_name'];

}
function getoutcomename( $id)
{
    global $conn;
    $select=mysqli_query($conn,"select outcome from project_outcomes where id='$id'");
    return mysqli_fetch_assoc($select)['outcome'];

}
function checkmov( $output_id)
{
    global $conn;
    $check=mysqli_query($conn, "SELECT upload_status FROM output_indicators where id='$output_id'");
    $status=mysqli_fetch_assoc($check)['upload_status'];
    if ($status=='1'){
        return true;
    }else{

        return false;
    }

}
function getprojectid($indicatorid){
    global $conn;
    $getid=mysqli_query($conn, "select project_id from output_indicators where id='$indicatorid'");
    return mysqli_fetch_assoc($getid)['project_id'];
}
function getoutputname($id){
    global $conn;
    $getid=mysqli_query($conn, "select output from project_outputs where id='$id'");
    return mysqli_fetch_assoc($getid)['output'];
}
function mov($mov,$indicatorid): string
{

    if ($mov=='mov1'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."'  >Upload Coordination Meeting Minutes</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."' title='Coordination Meeting Minutes'  >Verified</a>";
        }

    }elseif($mov=='mov2'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/photos.php?id=".$indicatorid."'  >Upload Photos</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/photos.php?id=".$indicatorid."' title='Photos'>Verified</a>";
        }

    }elseif ($mov=='mov3'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/participant-list.php?id=".$indicatorid."'  >Upload Participant List</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/participant-list.php?id=".$indicatorid."' title='Participant List'  >Verified</a>";
        }

    }elseif ($mov=='mov4'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/monthly-service-mapping-report.php?id=".$indicatorid."'  >Upload Monthly Service Mapping Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/monthly-service-mapping-report.php?id=".$indicatorid."'  >Verified</a>";
        }

    }elseif ($mov=='mov5'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/monthly-service-monitoring-report.php?id=".$indicatorid."'  >Upload Monthly Service Monitoring Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/monthly-service-monitoring-report.php?id=".$indicatorid."' title='Monthly Service monitoring'   >Verified</a>";
        }

    }elseif ($mov=='mov6'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/training-report.php?id=".$indicatorid."'  >Upload Training Report</a>";
        }else{
            return "<a class='text-success' class='text-success' href='../dashboard/mov/training-report.php?id=".$indicatorid."' title='Training Report'  >Verified</a>";
        }

    }elseif ($mov=='mov7'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/awareness-activity-narrative-report.php?id=".$indicatorid."'  >Upload Awareness Activity Narrative Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/awareness-activity-narrative-report.php?id=".$indicatorid."' title='Awareness Activity Report'  >Verified</a>";
        }

    }elseif ($mov=='mov8'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/safety-audit-training-report.php?id=".$indicatorid."'  >Upload Safety Audit Training Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/safety-audit-training-report.php?id=".$indicatorid."' title='Safety Audit Training Report'  >Verified</a>";
        }

    }elseif ($mov=='mov9'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/safety-audit-report.php?id=".$indicatorid."'  >Upload Safety Audit Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/safety-audit-report.php?id=".$indicatorid."'  >Verified</a>";
        }

    }elseif ($mov=='mov10'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."'  >Upload Cash For Work Monitoring Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."' title='Cash For Work Monitoring Report' >Verified</a>";
        }

    }elseif ($mov=='mov11'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."'  >Upload Cash For work Narrative Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."' title='Cash for work Narrative Report'  >Verified</a>";
        }

    }elseif ($mov=='mov12'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."'  >Upload Money Transfer Statement</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."' title='Money Transfer Statement' >Verified</a>";
        }

    }elseif ($mov=='mov13'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."'  >Upload Activity Monitoring Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."' title='Activity Monitoring Report'  >Verified</a>";
        }


    }elseif ($mov=='mov14'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/cfm-intake-forms.php?id=".$indicatorid."'  >Upload CFM Intake Forms</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/cfm-intake-forms.php?id=".$indicatorid."' title='CFM Intake Forms'  >Verified!</a>";
        }

    }elseif ($mov=='mov15'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/narrative.php?id=".$indicatorid."'  >Upload Narrative Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/narrative.php?id=".$indicatorid."' title='Narrative Report' >Verified!</a>";
        }

    }elseif ($mov=='mov16'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."'  >Upload Decongestion Coordination Meeting Minutes</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."'  title='Decongestion Coordination Meeting minutes' >Verified!</a>";
        }

    }elseif ($mov=='mov17'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/narrative.php?id=".$indicatorid."'  >Upload Human Interest Stories</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/narrative.php?id=".$indicatorid."' title='Human Interest Stories'  >Verified</a>";
        }

    }elseif ($mov=='mov18'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."'  >Upload Activity Monitoring Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."' title='Activity Monitoring Report'  >Verified!</a>";
        }

    }elseif ($mov=='mov19'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/land-tenure-documents.php?id=".$indicatorid."'  >Upload Land Tenure Documents</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/land-tenure-documents.php?id=".$indicatorid."' title='Land Tenure Documents'  >Verified!</a>";
        }

    }elseif ($mov=='mov20'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/beneficiary-list.php?id=".$indicatorid."'  >Upload Beneficiary List</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/beneficiary-list.php?id=".$indicatorid."' title='Beneficiary List'  >Verified</a>";
        }

    }elseif ($mov=='mov21'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/post-eviction-monitoring-report.php?id=".$indicatorid."'  >Upload Post Eviction Monitoring Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/post-eviction-monitoring-report.php?id=".$indicatorid."' title='Post Eviction Monitoring Report'  >Verified</a>";
        }

    }elseif ($mov=='mov22'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."'  >Upload Money Transfer Statement</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."' title='Money Transfer Statement' >Verified</a>";
        }

    }elseif ($mov=='mov23'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/assessment-report.php?id=".$indicatorid."'  >Upload Assessment Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/assessment-report.php?id=".$indicatorid."' title='Assessment Report' >Verified</a>";

        }

    }elseif ($mov=='mov24'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/quarterly-assessment-report.php?id=".$indicatorid."'  >Upload Quarterly Assessment Report</a>";
        }else{
            return "Verified";
        }

    }elseif ($mov=='mov25'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/quarterly-eviction-dashboards.php?id=".$indicatorid."'  >Upload Quarterly Eviction Dashboards</a>";
        }else{
            return "Verified";
        }

    }else{
        return "Unknown MOV";
    }
}
function prntmov($mov,$indicatorid): string
{

    if ($mov=='mov1'){
        return "Coordination Meeting Minutes";
    }elseif($mov=='mov2'){
        return "Photos";
    }elseif ($mov=='mov3'){
        return "Participant List";
    }elseif ($mov=='mov4'){
        return "Monthly Service Mapping Report";
    }elseif ($mov=='mov5'){
        return "Monthly Service Monitoring Report";
    }elseif ($mov=='mov6'){
        return "Training Report";
    }elseif ($mov=='mov7'){
        return "Awareness Activity Narrative Report";
    }elseif ($mov=='mov8'){
        return "Safety Audit Training Report";
    }elseif ($mov=='mov9'){
        return "Safety Audit Report";
    }elseif ($mov=='mov10'){
        return "Cash For Work Monitoring Report";
    }elseif ($mov=='mov11'){
        return "Cash For work Narrative Report";
    }elseif ($mov=='mov12'){
        return "Money Transfer Statement";
    }elseif ($mov=='mov13'){
        return "Activity Monitoring Report";
    }elseif ($mov=='mov14'){
        return "CFM Intake Forms";
    }elseif ($mov=='mov15'){
        return "Narrative Report";
    }elseif ($mov=='mov16'){
        return "Decongestion Coordination Meeting Minutes";
    }elseif ($mov=='mov17'){
        return "Human Interest Stories";
    }elseif ($mov=='mov18'){
        return "Activity Monitoring Report";
    }elseif ($mov=='mov19'){
        return "Land Tenure Documents";
    }elseif ($mov=='mov20'){
        return "Beneficiary List";
    }elseif ($mov=='mov21'){
        return "Post Eviction Monitoring Report";
    }elseif ($mov=='mov22'){
        return "Money Transfer Statement";
    }elseif ($mov=='mov23'){
        return "Assessment Report";
    }elseif ($mov=='mov24'){
        return "Quarterly Assessment Report";
    }elseif ($mov=='mov25'){
        return "Quarterly Eviction Dashboards";
    }else{
        return "Unknown MOV";
    }
}
function mediamov($mov,$indicatorid): string
{

    if ($mov=='mov1'){
        return "<a  title='Click to Download' href='../dashboard/meeting-minutes.php?id=".$indicatorid."'  > Coordination Meeting Minutes</a>";
    }elseif($mov=='mov2'){
        return "<a title='Click to Download' href='..//dashboard/mov/photos.php?id=".$indicatorid."'> Photos</a>";
    }elseif ($mov=='mov3'){
        return "<a title='Click to Download' href='..//dashboard/mov/participant-list.php?id=".$indicatorid."'  > Participant List</a>";
    }elseif ($mov=='mov4'){
        return "<a title='Click to Download' href='..//dashboard/mov/monthly-service-mapping-report.php?id=".$indicatorid."'  > Monthly Service Mapping Report</a>";
    }elseif ($mov=='mov5'){
        return "<a title='Click to Download' href='..//dashboard/mov/monthly-service-monitoring-report.php?id=".$indicatorid."'  > Monthly Service Monitoring Report</a>";
    }elseif ($mov=='mov6'){
        return "<a title='Click to Download' href='..//dashboard/training-report.php?id=".$indicatorid."'  > Training Report</a>";
    }elseif ($mov=='mov7'){
        return "<a title='Click to Download' href='..//dashboard/awareness-activity-narrative-report.php?id=".$indicatorid."'  > Awareness Activity Narrative Report</a>";
    }elseif ($mov=='mov8'){
        return "<a title='Click to Download' href='..//dashboard/mov/safety-audit-training-report.php?id=".$indicatorid."'  > Safety Audit Training Report</a>";
    }elseif ($mov=='mov9'){
        return "<a title='Click to Download' href='..//dashboard/mov/safety-audit-report.php?id=".$indicatorid."'  > Safety Audit Report</a>";
    }elseif ($mov=='mov10'){
        return "<a title='Click to Download' href='..//dashboard/cash-for-work-monitoring-report.php?id=".$indicatorid."'  > Cash For Work Monitoring Report</a>";
    }elseif ($mov=='mov11'){
        return "<a title='Click to Download' href='..//dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."'  > Cash For work Narrative Report</a>";
    }elseif ($mov=='mov12'){
        return "<a title='Click to Download' href='..//dashboard/mov/money-transfer-statement.php?id=".$indicatorid."'  > Money Transfer Statement</a>";
    }elseif ($mov=='mov13'){
        return "<a title='Click to Download' href='..//dashboard/activity-monitoring-report.php?id=".$indicatorid."'  > Activity Monitoring Report</a>";
    }elseif ($mov=='mov14'){
        return "<a title='Click to Download' href='..//dashboard/mov/cfm-intake-forms.php?id=".$indicatorid."'  > CFM Intake Forms</a>";
    }elseif ($mov=='mov15'){
        return "<a title='Click to Download' href='..//dashboard/narrative.php?id=".$indicatorid."'  > Narrative Report</a>";
    }elseif ($mov=='mov16'){
        return "<a title='Click to Download' href='..//dashboard/mov/meeting-minutes.php?id=".$indicatorid."'  > Decongestion Coordination Meeting Minutes</a>";
    }elseif ($mov=='mov17'){
        return "<a title='Click to Download' href='..//dashboard/narrative.php?id=".$indicatorid."'  > Human Interest Stories</a>";
    }elseif ($mov=='mov18'){
        return "<a title='Click to Download' href='..//dashboard/activity-monitoring-report.php?id=".$indicatorid."'  > Activity Monitoring Report</a>";
    }elseif ($mov=='mov19'){
        return "<a title='Click to Download' href='..//dashboard/mov/land-tenure-documents.php?id=".$indicatorid."'  > Land Tenure Documents</a>";
    }elseif ($mov=='mov20'){
        return "<a title='Click to Download' href='..//dashboard/mov/beneficiary-list.php?id=".$indicatorid."'  > Beneficiary List</a>";
    }elseif ($mov=='mov21'){
        return "<a title='Click to Download' href='..//dashboard/post-eviction-monitoring-report.php?id=".$indicatorid."'  > Post Eviction Monitoring Report</a>";
    }elseif ($mov=='mov22'){
        return "<a title='Click to Download' href='..//dashboard/mov/money-transfer-statement.php?id=".$indicatorid."'  > Money Transfer Statement</a>";
    }elseif ($mov=='mov23'){
        return "<a title='Click to Download' href='..//dashboard/mov/assessment-report.php?id=".$indicatorid."'  > Assessment Report</a>";
    }elseif ($mov=='mov24'){
        return "<a title='Click to Download' href='..//dashboard/mov/quarterly-assessment-report.php?id=".$indicatorid."'  > Quarterly Assessment Report</a>";
    }elseif ($mov=='mov25'){
        return "<a title='Click to Download' href='..//dashboard/mov/quarterly-eviction-dashboards.php?id=".$indicatorid."'  > Quarterly Eviction Dashboards</a>";
    }
}

function previewdoc($link,$file): string
{
//    $im = new Imagick();
//    $im->setResolution(300, 300);     //set the resolution of the resulting jpg
//    $im->readImage($file[0]);    //[0] for the first page
//    $im->setImageFormat('jpg');
//    header('Content-Type: image/jpeg');
    return "<a href='$link$file' target='_blank'>Preview Attachment</a>";
}

function workplanactions($role,$prjid){
    if($role=="admin"){
        return '<a href="viewproject.php?id='.$prjid.'"><i class="fas fa-eye" title="View Project"></i></a> 
| <a href="home.php?id='.$prjid.'"><i class="far fa-edit text-success" title="Edit Project"></i></a>
|<a data-toggle="modal" data-id="'.$prjid.'"  data-target="#assignstaff"> <i class="fas fa-user-plus" title="Assign Users"></i></a>
| <a href="?destroy='.$prjid.'"><i class="fas fa-trash-alt text-danger" title="Delete"></i></a>';
    }elseif ($role == 'staff'  && getpermissiontoedit($prjid,$_SESSION['user_id'])){
        return '<a href="viewproject.php?id='.$prjid.'"><i class="fas fa-eye" title="View Project"></i></a>  
| <a href="clusters.php?id='.$prjid.'"><i class="far fa-edit text-success" title="Edit Project"></i></a>
<a  href="wpcomments.php?id='.$prjid.'"><sup class="badge badge-danger text-white">'.countchanges($prjid).'</sup></a>';
    }elseif ($role == 'supervisor' && getpermissiontoedit($prjid,$_SESSION['user_id'])){
        return '<a href="viewproject.php?id='.$prjid.'"><i class="fas fa-eye" title="View Project"></i></a>  
<a  href="wpcomments.php?id='.$prjid.'"><sup class="badge badge-danger text-white">'.countchanges($prjid).'</sup></a>';
    }
    elseif ($role == 'staff'|| $role == 'supervisor'){
        return '<a href="viewproject.php?id='.$prjid.'"><i class="fas fa-eye" title="View Project"></i></a';
    }
}
function getpreparedby($id): string
{
    global $conn;
    $getuser=mysqli_query($conn, "select first_name,last_name from pm_users where id='$id'");
    $row=mysqli_fetch_assoc($getuser);
    return $row['first_name']." ".$row['last_name'];
}
function countchanges($prjid){
    global $conn;
    $getdata=mysqli_query($conn,"select count(*) as t_changes from wp_comments where prj_id='$prjid'");

    return mysqli_fetch_assoc($getdata)['t_changes'];
}
function getpermissiontoedit($prjid,$userid): bool
{
    global $conn;
    $getdata=mysqli_query($conn,"select * from project_users where prj_id='$prjid' and user_id='$userid'");
    if (mysqli_num_rows($getdata)>0){
        return true;
    }else{
        return false;
    }

}


function getincrement($index): string
{

    $indexed = explode( ".", $index ); // array( "1", "9", "9" )
    if ( ++$indexed[2] > 9 ) { // if last incremented number is greater than 9 reset to 0
        $indexed[2] = 0;
        if ( ++$indexed[1] > 9 ) { // if second incremented number is greater than 9 reset to 0
            $indexed[1] = 0;
            ++$indexed[0]; // incremented first number
        }
    }
    return implode( ".", $indexed ); // implode array back to string


}

















function clusterindex($projectOutputs,$output_id,$cnt)
{
    global $conn;
    $sql = "select * from project_outputs where project_id='" . $_GET['id'] . "' group by outcome_id";
    if ($result = $conn->query($sql)) {
        $projectOutputss = $result->fetch_all(MYSQLI_BOTH);
        foreach ($projectOutputs as $k => $projectOutput) {
           $kl= count($projectOutputss);


        $k = ++$k;

        if ($projectOutput['id'] == $output_id) {
           //$kd= count(getcoutput($output_id));
            if ($k>$kl){

                $ind = "$kl.0.$cnt";

            }else{
                $ind = "$k.0.$cnt";
            }
//            $ind = "$k.0.$cnt";

            $indexed = explode(".", $ind); // array( "1", "9", "9" )
            if (++$indexed[2] > 9) { // if last incremented number is greater than 9 reset to 0
                $indexed[2] = 0;
                if (++$indexed[1] > 9) { // if second incremented number is greater than 9 reset to 0
                    $indexed[1] = 0;
                    ++$indexed[0]; // incremented first number
                }
            }
            return implode(".", $indexed);

        }

    }


    }
}

function getcoutput($output_id)
{
    global $conn;
    $sql = "select * from output_indicators where output_id='$output_id' group by output_id";
    if ($result = $conn->query($sql)) {
     return  $result->fetch_all(MYSQLI_BOTH);}
    }
function getstaff(): void
{
    global $conn;
    $getuser=mysqli_query($conn, "select id,first_name,last_name,role from pm_users where role!='admin'");
    while ($row=mysqli_fetch_assoc($getuser)){
        echo"
        <option value='".$row['id']."'>".$row['first_name'].' '.$row['last_name']."-".showuserrole($row['role'])."</option>
        ";
    }

}

function showuserrole($role): string
{
if($role=="supervisor"){
    return "<i class='badge badge-success'>Supervisor</i>";
}else if($role=="staff"){
    return "<i class='badge badge-primary'>Staff</i>";
}else{
    return "<i class='badge badge-danger'>$role</i>";
}
}
function checkifprjassign($prjid): string
{
    global $conn;
    $getdata=mysqli_query($conn,"select * from project_users where prj_id='$prjid'");

    if(mysqli_num_rows($getdata)>0){
        return "<i class='badge badge-success'>Assigned</i>";
    }else{
        return "<i class='badge badge-danger'>Not Assigned</i>";
    }
}
function checkassigned($id,$prj): bool
{
    global $conn;
    $getuser=mysqli_query($conn,"select * from project_users where prj_id='$prj' and user_id='$id'");
    if (mysqli_num_rows($getuser)>0){
        return true;
    }else{
        return false;
    }
}

function checkapproval($prjid): bool
{
    global $conn;
    $getdata=mysqli_query($conn,"select prj_status from prj_init where ID='$prjid'");
    $status=mysqli_fetch_assoc($getdata)['prj_status'];
    if($status=='0'){
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
function sendAssignnotification($to,$projectid): bool
{
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

    $mail->Subject = "NEW PROJECT ALERT";
    $mail->Body    = "<div>
<p>A new project has being assigned.Login to your account and add MOVS</p>
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

function checkvariable($no,$no2): bool
{

    $value=$no;
    if ($value!==$no2){
        return true;
    }else{
        return false;
    }

}

function getallmovs($id): void
{
    global $conn;
    $sql=mysqli_query($conn,"select id,mov from output_indicators where output_id='$id'");
    while($outputIndicator=mysqli_fetch_assoc($sql)){

        // $movarray[]=$outputIndicator['mov'];
        $movs="";



            $movs .=  mov(json_decode($outputIndicator['mov']), $outputIndicator['id'])."||";


        echo $movs;

    }

}
function prntallmovs($id): void
{
    global $conn;
    $sql=mysqli_query($conn,"select id,mov from output_indicators where output_id='$id'");
    while($outputIndicator=mysqli_fetch_assoc($sql)){

        // $movarray[]=$outputIndicator['mov'];
        $movs=" ";
        $movsa=" ";

            $movs .= prntmov(json_decode($outputIndicator['mov']), $outputIndicator['id'])." || " ;
        $movsa .= mova(json_decode($outputIndicator['mov']), $outputIndicator['id'])." || " ;
if ($_SESSION['role']=='admin' || $_SESSION['role']=='supervisor'){
    echo $movsa;
}else{
    echo $movs;
}

    }

}
function  getoutputs($id): string
{

    global $conn;
    $sql=mysqli_query($conn,"select * from project_outputs where outcome_id='$id'");
    $outputs="";
    while ($row=mysqli_fetch_assoc($sql)){

        $outputs.="|| "."<a  data-toggle='modal'
                                 class='text-primary btn btn-sm'
                                 data-target='#viewoutput'
                                 data-output='".$row['output']."'
                                 data-id='".$row['id']."'
                                 title='Add multiple outputs'
                                >".$row['output']."</a>"." ";
    }
    return $outputs;
}
function mova($mov,$indicatorid): string
{

    if ($mov=='mov1'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."'  >Upload Coordination Meeting Minutes</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."' title='Coordination Meeting Minutes'  >View</a>";
        }

    }elseif($mov=='mov2'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/photos.php?id=".$indicatorid."'  >Upload Photos</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/photos.php?id=".$indicatorid."' title='Photos'>View</a>";
        }

    }elseif ($mov=='mov3'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/participant-list.php?id=".$indicatorid."'  >Upload Participant List</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/participant-list.php?id=".$indicatorid."' title='Participant List'  >View</a>";
        }

    }elseif ($mov=='mov4'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/monthly-service-mapping-report.php?id=".$indicatorid."'  >Upload Monthly Service Mapping Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/monthly-service-mapping-report.php?id=".$indicatorid."'  >View</a>";
        }

    }elseif ($mov=='mov5'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/monthly-service-monitoring-report.php?id=".$indicatorid."'  >Upload Monthly Service Monitoring Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/monthly-service-monitoring-report.php?id=".$indicatorid."' title='Monthly Service monitoring'   >View</a>";
        }

    }elseif ($mov=='mov6'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/training-report.php?id=".$indicatorid."'  >Upload Training Report</a>";
        }else{
            return "<a class='text-success' class='text-success' href='../dashboard/mov/training-report.php?id=".$indicatorid."' title='Training Report'  >View</a>";
        }

    }elseif ($mov=='mov7'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/awareness-activity-narrative-report.php?id=".$indicatorid."'  >Upload Awareness Activity Narrative Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/awareness-activity-narrative-report.php?id=".$indicatorid."' title='Awareness Activity Report'  >View</a>";
        }

    }elseif ($mov=='mov8'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/safety-audit-training-report.php?id=".$indicatorid."'  >Upload Safety Audit Training Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/safety-audit-training-report.php?id=".$indicatorid."' title='Safety Audit Training Report'  >View</a>";
        }

    }elseif ($mov=='mov9'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/safety-audit-report.php?id=".$indicatorid."'  >Upload Safety Audit Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/safety-audit-report.php?id=".$indicatorid."'  >View</a>";
        }

    }elseif ($mov=='mov10'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."'  >Upload Cash For Work Monitoring Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."' title='Cash For Work Monitoring Report' >View</a>";
        }

    }elseif ($mov=='mov11'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."'  >Upload Cash For work Narrative Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."' title='Cash for work Narrative Report'  >View</a>";
        }

    }elseif ($mov=='mov12'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."'  >Upload Money Transfer Statement</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."' title='Money Transfer Statement' >View</a>";
        }

    }elseif ($mov=='mov13'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."'  >Upload Activity Monitoring Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."' title='Activity Monitoring Report'  >View</a>";
        }


    }elseif ($mov=='mov14'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/cfm-intake-forms.php?id=".$indicatorid."'  >Upload CFM Intake Forms</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/cfm-intake-forms.php?id=".$indicatorid."' title='CFM Intake Forms'  >View!</a>";
        }

    }elseif ($mov=='mov15'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/narrative.php?id=".$indicatorid."'  >Upload Narrative Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/narrative.php?id=".$indicatorid."' title='Narrative Report' >View!</a>";
        }

    }elseif ($mov=='mov16'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."'  >Upload Decongestion Coordination Meeting Minutes</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."'  title='Decongestion Coordination Meeting minutes' >View!</a>";
        }

    }elseif ($mov=='mov17'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/narrative.php?id=".$indicatorid."'  >Upload Human Interest Stories</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/narrative.php?id=".$indicatorid."' title='Human Interest Stories'  >View</a>";
        }

    }elseif ($mov=='mov18'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."'  >Upload Activity Monitoring Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."' title='Activity Monitoring Report'  >View!</a>";
        }

    }elseif ($mov=='mov19'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/land-tenure-documents.php?id=".$indicatorid."'  >Upload Land Tenure Documents</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/land-tenure-documents.php?id=".$indicatorid."' title='Land Tenure Documents'  >View!</a>";
        }

    }elseif ($mov=='mov20'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/beneficiary-list.php?id=".$indicatorid."'  >Upload Beneficiary List</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/beneficiary-list.php?id=".$indicatorid."' title='Beneficiary List'  >View</a>";
        }

    }elseif ($mov=='mov21'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/post-eviction-monitoring-report.php?id=".$indicatorid."'  >Upload Post Eviction Monitoring Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/post-eviction-monitoring-report.php?id=".$indicatorid."' title='Post Eviction Monitoring Report'  >View</a>";
        }

    }elseif ($mov=='mov22'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."'  >Upload Money Transfer Statement</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."' title='Money Transfer Statement' >View</a>";
        }

    }elseif ($mov=='mov23'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/assessment-report.php?id=".$indicatorid."'  >Upload Assessment Report</a>";
        }else{
            return "<a class='text-success' href='../dashboard/mov/assessment-report.php?id=".$indicatorid."' title='Assessment Report' >View</a>";

        }

    }elseif ($mov=='mov24'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/quarterly-assessment-report.php?id=".$indicatorid."'  >Upload Quarterly Assessment Report</a>";
        }else{
            return "View";
        }

    }elseif ($mov=='mov25'){
        if (!checkmov($indicatorid)){
            return "<a href='../dashboard/mov/quarterly-eviction-dashboards.php?id=".$indicatorid."'  >Upload Quarterly Eviction Dashboards</a>";
        }else{
            return "View";
        }

    }else{
        return "Unknown MOV";
    }
}
function  getindexmov($cid)
{
    global $conn;
    $sql=mysqli_query($conn,"select indexmov from project_outcomes where id='$cid'");
    return mysqli_fetch_assoc($sql)['indexmov'];
}
function getclusterid($outcome_id)
{
    global $conn;
    $sql=mysqli_query($conn,"select cluster_id from project_outcomes where id='$outcome_id'");
    return mysqli_fetch_assoc($sql)['cluster_id'];

}
function getclusteridbyoutput($output_id)
{
    global $conn;
    $sql=mysqli_query($conn,"select cluster_id from project_outputs where id='$output_id'");
    return mysqli_fetch_assoc($sql)['cluster_id'];

}
function getoutputtarget($id){
    global $conn;
    $sql=mysqli_query($conn,"select target from output_indicators where id='$id'");
    return mysqli_fetch_assoc($sql)['target'];
}
function getindicatorbyoutput($id){
    global $conn;
    $sql=mysqli_query($conn,"select indicator from output_indicators where id='$id'");
    return mysqli_fetch_assoc($sql)['indicator'];

}
function getclusterbyindicatorid($outcome_id)
{
    global $conn;
    $sql=mysqli_query($conn,"select cluster_id from output_indicators where id='$outcome_id'");
    return mysqli_fetch_assoc($sql)['cluster_id'];

}
function getoutcomeid($id)
{
    global $conn;
    $sql=mysqli_query($conn,"select outcome_id from project_outputs where id='$id'");
    return mysqli_fetch_assoc($sql)['outcome_id'];
}