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
if ($days<7){
    return $days." days";
}elseif ($days<365){
    return $weeks."weeks";
}elseif ($days>=365){
    return $years." years";
}
//// Print the result
//printf("%d years, %d months, %d days", $years, $months,
//    $days);
}
function getclustername(mixed $clusters)
{
    global $conn;
    $select=mysqli_query($conn,"select cluster_name from clusters where cluster_id='$clusters'");
    return mysqli_fetch_assoc($select)['cluster_name'];

}
function checkmov(mixed $output_id)
{
    global $conn;
    $check=mysqli_query($conn, "SELECT upload_status FROM output_indicators where output_id='$output_id'");
    $status=mysqli_fetch_assoc($check)['upload_status'];
    if ($status=='1'){
        return true;
    }else{

        return false;
    }

}
function mov($mov,$indicatorid): string
{

    if ($mov=='mov1'){
return "<a href='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."' target='_blank' >Upload Coordination Meeting Minutes</a>";
    }elseif($mov=='mov2'){
        return "<a href='../dashboard/mov/photos.php?id=".$indicatorid."' target='_blank' >Upload Photos</a>";
    }elseif ($mov=='mov3'){
        return "<a href='../dashboard/mov/participant-list.php?id=".$indicatorid."' target='_blank' >Upload Participant List</a>";
    }elseif ($mov=='mov4'){
        return "<a href='../dashboard/mov/monthly-service-mapping-report.php?id=".$indicatorid."' target='_blank' >Upload Monthly Service Mapping Report</a>";
    }elseif ($mov=='mov5'){
        return "<a href='../dashboard/mov/monthly-service-monitoring-report.php?id=".$indicatorid."' target='_blank' >Upload Monthly Service Monitoring Report</a>";
    }elseif ($mov=='mov6'){
        return "<a href='../dashboard/mov/training-report.php?id=".$indicatorid."' target='_blank' >Upload Training Report</a>";
    }elseif ($mov=='mov7'){
        return "<a href='../dashboard/mov/awareness-activity-narrative-report.php?id=".$indicatorid."' target='_blank' >Upload Awareness Activity Narrative Report</a>";
    }elseif ($mov=='mov8'){
        return "<a href='../dashboard/mov/safety-audit-training-report.php?id=".$indicatorid."' target='_blank' >Upload Safety Audit Training Report</a>";
    }elseif ($mov=='mov9'){
        return "<a href='../dashboard/mov/safety-audit-report.php?id=".$indicatorid."' target='_blank' >Upload Safety Audit Report</a>";
    }elseif ($mov=='mov10'){
        return "<a href='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."' target='_blank' >Upload Cash For Work Monitoring Report</a>";
    }elseif ($mov=='mov11'){
        return "<a href='../dashboard/mov/cash-for-work-monitoring-report.php?id=".$indicatorid."' target='_blank' >Upload Cash For work Narrative Report</a>";
    }elseif ($mov=='mov12'){
        return "<a href='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."' target='_blank' >Upload Money Transfer Statement</a>";
    }elseif ($mov=='mov13'){
        return "<a href='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."' target='_blank' >Upload Activity Monitoring Report</a>";
    }elseif ($mov=='mov14'){
        return "<a href='../dashboard/mov/cfm-intake-forms.php?id=".$indicatorid."' target='_blank' >Upload CFM Intake Forms</a>";
    }elseif ($mov=='mov15'){
        return "<a href='../dashboard/mov/narrative.php?id=".$indicatorid."' target='_blank' >Upload Narrative Report</a>";
    }elseif ($mov=='mov16'){
        return "<a href='../dashboard/mov/meeting-minutes.php?id=".$indicatorid."' target='_blank' >Upload Decongestion Coordination Meeting Minutes</a>";
    }elseif ($mov=='mov17'){
        return "<a href='../dashboard/mov/narrative.php?id=".$indicatorid."' target='_blank' >Upload Human Interest Stories</a>";
    }elseif ($mov=='mov18'){
        return "<a href='../dashboard/mov/activity-monitoring-report.php?id=".$indicatorid."' target='_blank' >Upload Activity Monitoring Report</a>";
    }elseif ($mov=='mov19'){
        return "<a href='../dashboard/mov/land-tenure-documents.php?id=".$indicatorid."' target='_blank' >Upload Land Tenure Documents</a>";
    }elseif ($mov=='mov20'){
        return "<a href='../dashboard/mov/beneficiary-list.php?id=".$indicatorid."' target='_blank' >Upload Beneficiary List</a>";
    }elseif ($mov=='mov21'){
        return "<a href='../dashboard/mov/post-eviction-monitoring-report.php?id=".$indicatorid."' target='_blank' >Upload Post Eviction Monitoring Report</a>";
    }elseif ($mov=='mov22'){
        return "<a href='../dashboard/mov/money-transfer-statement.php?id=".$indicatorid."' target='_blank' >Upload Money Transfer Statement</a>";
    }elseif ($mov=='mov23'){
        return "<a href='../dashboard/mov/assessment-report.php?id=".$indicatorid."' target='_blank' >Upload Assessment Report</a>";
    }elseif ($mov=='mov24'){
        return "<a href='../dashboard/mov/quarterly-assessment-report.php?id=".$indicatorid."' target='_blank' >Upload Quarterly Assessment Report</a>";
    }elseif ($mov=='mov25'){
        return "<a href='../dashboard/mov/quarterly-eviction-dashboards.php?id=".$indicatorid."' target='_blank' >Upload Quarterly Eviction Dashboards</a>";
    }else{
        return "Unknown MOV";
    }
}