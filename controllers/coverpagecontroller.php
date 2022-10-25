<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $prjid = $_GET['id'];
} else {
    header('Location:home.php');
}
$project = [];
$cover = [];
$clusters = [];
$framework = [];
$projectOutcomes = [];
$projectOutputs = [];
$outputIndicators = [];
$clusters = mysqli_query($conn, "select * from clusters where project_id='$prjid'");
$resultproject = mysqli_query($conn, "select * from prj_init where ID='$prjid'");
$project = $resultproject->fetch_object();
$sqlcover = mysqli_query($conn,"select * from cover_pages where project_id='$prjid'");
$cover=$sqlcover->fetch_object();
$sql = "select * from frameworks where project_id=$prjid";
if ($result = $conn->query($sql)) {
    $framework = $result->fetch_object();
}
$sql = "select * from project_outcomes where project_id=$prjid";
if ($result = $conn->query($sql)) {
    $projectOutcomes = $result->fetch_all(MYSQLI_BOTH);

}
// outcomes

$sql = "select * from project_outcomes where project_id=$prjid";
if ($result = $conn->query($sql)) {
    $projectOutcomes = $result->fetch_all(MYSQLI_BOTH);

}

// outputs

$sql = "select * from project_outputs where project_id=$prjid";
if ($result = $conn->query($sql)) {
    $projectOutputs = $result->fetch_all(MYSQLI_BOTH);

}

// indicators

$sql = "select * from output_indicators where project_id=$prjid";
if ($result = $conn->query($sql)) {
    $outputIndicators = $result->fetch_all(MYSQLI_BOTH);

}
if (isset($_POST['saveCover'])){
    if (empty($cover)){
        $prjid= $_GET['id'];
        $summary= filter_var(stripslashes($_POST['summary']), FILTER_SANITIZE_STRING);
        $assement= filter_var(stripslashes($_POST['needs_assessment']), FILTER_SANITIZE_STRING);
        $justification= filter_var(stripslashes($_POST['justification']), FILTER_SANITIZE_STRING);
        $strategy= filter_var(stripslashes($_POST['allocation_strategy']), FILTER_SANITIZE_STRING);
        if (empty($summary)||empty($strategy)||empty($justification)||empty($assement)){
            echo"<script>
alert('all fields are required');
</script>";
        }else{
            $addcoverpage="insert into cover_pages set project_id='$prjid',
                            project_summary='$summary',
                            needs_assessment='$assement',
                            justification='$justification',
                            allocation_strategy='$strategy'";

            if (mysqli_query($conn,$addcoverpage)){
                header("location: framework.php?id=" . $prjid);
            }
        }
    }else{

        $prjid= $_GET['id'];
        $summary= filter_var(stripslashes($_POST['summary']), FILTER_SANITIZE_STRING);
        $assement= filter_var(stripslashes($_POST['needs_assessment']), FILTER_SANITIZE_STRING);
        $justification= filter_var(stripslashes($_POST['justification']), FILTER_SANITIZE_STRING);
        $strategy= filter_var(stripslashes($_POST['allocation_strategy']), FILTER_SANITIZE_STRING);
        if (empty($summary)||empty($strategy)||empty($justification)||empty($assement)){
            echo"<script>
alert('all fields are required');
</script>";
        }else{
            $addcoverpage="update cover_pages set 
                            project_summary='$summary',
                            needs_assessment='$assement',
                            justification='$justification',
                            allocation_strategy='$strategy'
                            where project_id='$prjid'";

            if (mysqli_query($conn,$addcoverpage)){
                header("location: framework.php?id=" . $prjid);
            }
        }

    }
}