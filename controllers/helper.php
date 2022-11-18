<?php
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
return "<a href='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."'  >Upload Coordination Meeting Minutes</a>";
    }elseif($mov=='mov2'){
        return "<a href='../dashboard/mov/photos.php?id=".$indicatorid."'  >Upload Photos</a>";
    }elseif ($mov=='mov3'){
        return "<a href='../dashboard/mov/participant-list.php?id=".$indicatorid."'  >Upload Participant List</a>";
    }elseif ($mov=='mov4'){
        return "<a href='../dashboard/mov/monthly-service-mapping-report.php?id=".$indicatorid."'  >Upload Monthly Service Mapping Report</a>";
    }elseif ($mov=='mov5'){
        return "<a href='../dashboard/mov/monthly-service-monitoring-report.php?id=".$indicatorid."'  >Upload Monthly Service Monitoring Report</a>";
    }elseif ($mov=='mov6'){
        return "<a href='../dashboard/mov/training-report.php?id=".$indicatorid."'  >Upload Training Report</a>";
    }elseif ($mov=='mov7'){
        return "<a href='../dashboard/mov/awareness-activity-narrative-report.php?id=".$indicatorid."'  >Upload Awareness Activity Narrative Report</a>";
    }elseif ($mov=='mov8'){
        return "<a href='../dashboard/mov/safety-audit-training-report.php?id=".$indicatorid."'  >Upload Safety Audit Training Report</a>";
    }elseif ($mov=='mov9'){
        return "<a href='../dashboard/mov/safety-audit-report.php?id=".$indicatorid."'  >Upload Safety Audit Report</a>";
    }elseif ($mov=='mov10'){
        return "<a href='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."'  >Upload Cash For Work Monitoring Report</a>";
    }elseif ($mov=='mov11'){
        return "<a href='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."'  >Upload Cash For work Narrative Report</a>";
    }elseif ($mov=='mov12'){
        return "<a href='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."'  >Upload Money Transfer Statement</a>";
    }elseif ($mov=='mov13'){
        return "<a href='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."'  >Upload Activity Monitoring Report</a>";
    }elseif ($mov=='mov14'){
        return "<a href='../dashboard/mov/cfm-intake-forms.php?id=".$indicatorid."'  >Upload CFM Intake Forms</a>";
    }elseif ($mov=='mov15'){
        return "<a href='../dashboard/mov/narrative.php?id=".$indicatorid."'  >Upload Narrative Report</a>";
    }elseif ($mov=='mov16'){
        return "<a href='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."'  >Upload Decongestion Coordination Meeting Minutes</a>";
    }elseif ($mov=='mov17'){
        return "<a href='../dashboard/mov/narrative.php?id=".$indicatorid."'  >Upload Human Interest Stories</a>";
    }elseif ($mov=='mov18'){
        return "<a href='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."'  >Upload Activity Monitoring Report</a>";
    }elseif ($mov=='mov19'){
        return "<a href='../dashboard/mov/land-tenure-documents.php?id=".$indicatorid."'  >Upload Land Tenure Documents</a>";
    }elseif ($mov=='mov20'){
        return "<a href='../dashboard/mov/beneficiary-list.php?id=".$indicatorid."'  >Upload Beneficiary List</a>";
    }elseif ($mov=='mov21'){
        return "<a href='../dashboard/mov/post-eviction-monitoring-report.php?id=".$indicatorid."'  >Upload Post Eviction Monitoring Report</a>";
    }elseif ($mov=='mov22'){
        return "<a href='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."'  >Upload Money Transfer Statement</a>";
    }elseif ($mov=='mov23'){
        return "<a href='../dashboard/mov/assessment-report.php?id=".$indicatorid."'  >Upload Assessment Report</a>";
    }elseif ($mov=='mov24'){
        return "<a href='../dashboard/mov/quarterly-assessment-report.php?id=".$indicatorid."'  >Upload Quarterly Assessment Report</a>";
    }elseif ($mov=='mov25'){
        return "<a href='../dashboard/mov/quarterly-eviction-dashboards.php?id=".$indicatorid."'  >Upload Quarterly Eviction Dashboards</a>";
    }else{
        return "Unknown MOV";
    }
}
function prntmov($mov,$indicatorid): string
{

    if ($mov=='mov1'){
        return "<a> Coordination Meeting Minutes</a>";
    }elseif($mov=='mov2'){
        return "<a> Photos</a>";
    }elseif ($mov=='mov3'){
        return "<a ='../dashboard/mov/participant-list.php?id=".$indicatorid."'  > Participant List</a>";
    }elseif ($mov=='mov4'){
        return "<a ='../dashboard/mov/monthly-service-mapping-report.php?id=".$indicatorid."'  > Monthly Service Mapping Report</a>";
    }elseif ($mov=='mov5'){
        return "<a ='../dashboard/mov/monthly-service-monitoring-report.php?id=".$indicatorid."'  > Monthly Service Monitoring Report</a>";
    }elseif ($mov=='mov6'){
        return "<a ='../dashboard/mov/training-report.php?id=".$indicatorid."'  > Training Report</a>";
    }elseif ($mov=='mov7'){
        return "<a ='../dashboard/mov/awareness-activity-narrative-report.php?id=".$indicatorid."'  > Awareness Activity Narrative Report</a>";
    }elseif ($mov=='mov8'){
        return "<a ='../dashboard/mov/safety-audit-training-report.php?id=".$indicatorid."'  > Safety Audit Training Report</a>";
    }elseif ($mov=='mov9'){
        return "<a ='../dashboard/mov/safety-audit-report.php?id=".$indicatorid."'  > Safety Audit Report</a>";
    }elseif ($mov=='mov10'){
        return "<a ='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."'  > Cash For Work Monitoring Report</a>";
    }elseif ($mov=='mov11'){
        return "<a ='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."'  > Cash For work Narrative Report</a>";
    }elseif ($mov=='mov12'){
        return "<a ='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."'  > Money Transfer Statement</a>";
    }elseif ($mov=='mov13'){
        return "<a ='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."'  > Activity Monitoring Report</a>";
    }elseif ($mov=='mov14'){
        return "<a ='../dashboard/mov/cfm-intake-forms.php?id=".$indicatorid."'  > CFM Intake Forms</a>";
    }elseif ($mov=='mov15'){
        return "<a ='../dashboard/mov/narrative.php?id=".$indicatorid."'  > Narrative Report</a>";
    }elseif ($mov=='mov16'){
        return "<a ='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."'  > Decongestion Coordination Meeting Minutes</a>";
    }elseif ($mov=='mov17'){
        return "<a ='../dashboard/mov/narrative.php?id=".$indicatorid."'  > Human Interest Stories</a>";
    }elseif ($mov=='mov18'){
        return "<a ='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."'  > Activity Monitoring Report</a>";
    }elseif ($mov=='mov19'){
        return "<a ='../dashboard/mov/land-tenure-documents.php?id=".$indicatorid."'  > Land Tenure Documents</a>";
    }elseif ($mov=='mov20'){
        return "<a ='../dashboard/mov/beneficiary-list.php?id=".$indicatorid."'  > Beneficiary List</a>";
    }elseif ($mov=='mov21'){
        return "<a ='../dashboard/mov/post-eviction-monitoring-report.php?id=".$indicatorid."'  > Post Eviction Monitoring Report</a>";
    }elseif ($mov=='mov22'){
        return "<a ='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."'  > Money Transfer Statement</a>";
    }elseif ($mov=='mov23'){
        return "<a ='../dashboard/mov/assessment-report.php?id=".$indicatorid."'  > Assessment Report</a>";
    }elseif ($mov=='mov24'){
        return "<a ='../dashboard/mov/quarterly-assessment-report.php?id=".$indicatorid."'  > Quarterly Assessment Report</a>";
    }elseif ($mov=='mov25'){
        return "<a ='../dashboard/mov/quarterly-eviction-dashboards.php?id=".$indicatorid."'  > Quarterly Eviction Dashboards</a>";
    }else{
        return "Unknown MOV";
    }
}
function mediamov($mov,$indicatorid): string
{

    if ($mov=='mov1'){
        return "<a href='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."'  > Coordination Meeting Minutes</a>";
    }elseif($mov=='mov2'){
        return "<a href='../dashboard/mov/photos.php?id=".$indicatorid."'  > Photos</a>";
    }elseif ($mov=='mov3'){
        return "<a href='../dashboard/mov/participant-list.php?id=".$indicatorid."'  > Participant List</a>";
    }elseif ($mov=='mov4'){
        return "<a href='../dashboard/mov/monthly-service-mapping-report.php?id=".$indicatorid."'  > Monthly Service Mapping Report</a>";
    }elseif ($mov=='mov5'){
        return "<a href='../dashboard/mov/monthly-service-monitoring-report.php?id=".$indicatorid."'  > Monthly Service Monitoring Report</a>";
    }elseif ($mov=='mov6'){
        return "<a href='../dashboard/mov/training-report.php?id=".$indicatorid."'  > Training Report</a>";
    }elseif ($mov=='mov7'){
        return "<a href='../dashboard/mov/awareness-activity-narrative-report.php?id=".$indicatorid."'  > Awareness Activity Narrative Report</a>";
    }elseif ($mov=='mov8'){
        return "<a href='../dashboard/mov/safety-audit-training-report.php?id=".$indicatorid."'  > Safety Audit Training Report</a>";
    }elseif ($mov=='mov9'){
        return "<a href='../dashboard/mov/safety-audit-report.php?id=".$indicatorid."'  > Safety Audit Report</a>";
    }elseif ($mov=='mov10'){
        return "<a href='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."'  > Cash For Work Monitoring Report</a>";
    }elseif ($mov=='mov11'){
        return "<a href='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."'  > Cash For work Narrative Report</a>";
    }elseif ($mov=='mov12'){
        return "<a href='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."'  > Money Transfer Statement</a>";
    }elseif ($mov=='mov13'){
        return "<a href='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."'  > Activity Monitoring Report</a>";
    }elseif ($mov=='mov14'){
        return "<a href='../dashboard/mov/cfm-intake-forms.php?id=".$indicatorid."'  > CFM Intake Forms</a>";
    }elseif ($mov=='mov15'){
        return "<a href='../dashboard/mov/narrative.php?id=".$indicatorid."'  > Narrative Report</a>";
    }elseif ($mov=='mov16'){
        return "<a href='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."'  > Decongestion Coordination Meeting Minutes</a>";
    }elseif ($mov=='mov17'){
        return "<a href='../dashboard/mov/narrative.php?id=".$indicatorid."'  > Human Interest Stories</a>";
    }elseif ($mov=='mov18'){
        return "<a href='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."'  > Activity Monitoring Report</a>";
    }elseif ($mov=='mov19'){
        return "<a href='../dashboard/mov/land-tenure-documents.php?id=".$indicatorid."'  > Land Tenure Documents</a>";
    }elseif ($mov=='mov20'){
        return "<a href='../dashboard/mov/beneficiary-list.php?id=".$indicatorid."'  > Beneficiary List</a>";
    }elseif ($mov=='mov21'){
        return "<a href='../dashboard/mov/post-eviction-monitoring-report.php?id=".$indicatorid."'  > Post Eviction Monitoring Report</a>";
    }elseif ($mov=='mov22'){
        return "<a href='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."'  > Money Transfer Statement</a>";
    }elseif ($mov=='mov23'){
        return "<a href='../dashboard/mov/assessment-report.php?id=".$indicatorid."'  > Assessment Report</a>";
    }elseif ($mov=='mov24'){
        return "<a href='../dashboard/mov/quarterly-assessment-report.php?id=".$indicatorid."'  > Quarterly Assessment Report</a>";
    }elseif ($mov=='mov25'){
        return "<a href='../dashboard/mov/quarterly-eviction-dashboards.php?id=".$indicatorid."'  > Quarterly Eviction Dashboards</a>";
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
    }elseif ($role == 'employee' && getpermissiontoedit($prjid)){
        return '<a href="viewproject.php?id='.$prjid.'"><i class="fas fa-eye" title="View Project"></i></a>  
| <a href="home.php?id='.$prjid.'"><i class="far fa-edit text-success" title="Edit Project"></i></a>
<a  href="wpcomments.php?id='.$prjid.'"><sup class="badge badge-danger text-white">'.countchanges($prjid).'</sup></a>';
    }
    elseif ($role == 'employee'){
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
function getpermissiontoedit($prjid): bool
{
    global $conn;
    $getdata=mysqli_query($conn,"select * from project_grants where prj_id='$prjid'");
    if (mysqli_num_rows($getdata)>0){
        return true;
    }else{
        return false;
    }

}


function getincrement(int|string $index): string
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

function getstaff(): void
{
    global $conn;
    $getuser=mysqli_query($conn, "select id,first_name,last_name,role from pm_users where role!='admin'");
    while ($row=mysqli_fetch_assoc($getuser)){
        echo"
        <option value='".$row['id']."'>".$row['first_name'].' '.$row['last_name']."</option>
        ";
    }

}