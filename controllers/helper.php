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