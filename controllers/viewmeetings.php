<?php
$meetings=[];
$agendas=[];

if (isset($_GET['id'])){
    $id=$_GET['id'];
    $resultmeetings=mysqli_query($conn,"select * from minutes  where 
                                            minutes.indicator_id='$id'");

    $meetings = $resultmeetings->fetch_object();

    $id=getminuteid($id);
    $agendasql = "select * from agenda where minutes_id='$id'";
    if ($results = $conn->query($agendasql)) {
        $agendas = $results->fetch_all(MYSQLI_BOTH);
    }
}
function getminuteid($id)
{
global $conn;
    $resultmeetings=mysqli_query($conn,"select id from minutes  where 
                                            minutes.indicator_id='$id'");

    return mysqli_fetch_assoc($resultmeetings)['id'];
}
