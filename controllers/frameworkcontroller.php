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
    error_log("Outcomes ".json_encode($projectOutcomes));
}

// outputs

$sql = "select * from project_outputs where project_id=$prjid";
if ($result = $conn->query($sql)) {
    $projectOutputs = $result->fetch_all(MYSQLI_BOTH);
    error_log("Outputs ".json_encode($projectOutputs));
}

// indicators

$sql = "select * from output_indicators where project_id=$prjid";
if ($result = $conn->query($sql)) {
    $outputIndicators = $result->fetch_all(MYSQLI_BOTH);

}
if (isset($_POST['saveFramework'])){
    $project= filter_var(stripslashes($_POST['project_objective']), FILTER_SANITIZE_STRING);
        if (empty($project)){
        echo "<script>
alert('all fields are required');
</script>";
    }else{
$insertframework="insert into frameworks set project_id='$prjid',objective='$project'";
if (mysqli_query($conn,$insertframework)){

    header("location: clusters.php?id=" . $prjid);
}
    }
}
if (isset($_POST['saveClusters'])){
    $clusterID = $_POST['cid'];
    $outcome=$_POST['outcome'];
    $activities = $_POST['activity'];
    $indicatorsArray = $_POST["indicator"];
    $indicatorsToSave=$indicatorsArray['text'];
    $movs = $indicatorsArray['mov'];
    $targets = $indicatorsArray['target'];

    $toSave = [];
    if (is_null($clusterID)){
        echo"<script>
alert('Select a cluster to fill');
        </script>";
    }else {


        foreach ($_POST['outcome'] as $k => $outcome) {
            if (!empty($outcome)) {

                if (!is_array($outcome)) {
                    if ($conn->query("insert into project_outcomes (project_id, outcome, cluster_id) values ($prjid, '" . $outcome . "', $clusterID)")) {
                        error_log("outcome saved. ");
                        $outcomeID = $conn->insert_id;
                    }
                } else {
                    // outputs
                    error_log("$k array. " . json_encode($outcome));
                    foreach ($outcome as $o => $output) {
                        if (!empty($output)) {
                            error_log("Save Output " . json_encode($output));
                            if (!is_array($output)) {
                                if ($conn->query("insert into project_outputs (project_id, outcome_id, output, cluster_id) VALUES ($prjid, $outcomeID, '" . $output . "', $clusterID)")) {
                                    $outputID = $conn->insert_id;
                                    // error_log("Output saved. ID $outputID");
                                }
                            } else {
                                error_log("Got to indicators ");
                            }
                        }
                    }
                    foreach ($indicatorsToSave as $t => $textIndicator) {
                        if ($conn->query("insert into output_indicators (project_id, indicator, mov, target, output_id, cluster_id)  values ($prjid, '" . $textIndicator . "', '" . json_encode($movs[$t]) . "', '" . $targets[$t] . "', '" . $outputID . "', $clusterID) ")) {
                            $indicatorID = $conn->insert_id;
                        }
                    }
                    foreach ($activities as $activity) {
                        $toSave[] = $activity;
                        error_log("save activities " . json_encode($activity));
                    }
                    if (!empty($toSave) && $conn->query("update output_indicators set activities='" . json_encode($toSave) . "' where output_id=$outputID")) {
                        error_log("activities updated. ");
                    }
                }
            }
        }
    }
}