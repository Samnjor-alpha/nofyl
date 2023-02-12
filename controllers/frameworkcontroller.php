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

$sql = "select * from project_outputs where project_id=$prjid group by outcome_id";
if ($result = $conn->query($sql)) {
    $projectOutputs = $result->fetch_all(MYSQLI_BOTH);

}


$sql = "select * from project_outputs where project_id=$prjid";
if ($result = $conn->query($sql)) {
    $projectOutputss = $result->fetch_all(MYSQLI_BOTH);

}
// indicators
$sqlmovs = mysqli_query($conn,"select * from output_indicators where project_id=$prjid");
$sql = "select * from output_indicators where project_id=$prjid group by output_id";
if ($result = $conn->query($sql)) {
    $outputIndicators = $result->fetch_all(MYSQLI_BOTH);

}
$sqll = "select * from output_indicators where project_id=$prjid";
if ($result = $conn->query($sqll)) {
    $outputIndicatorsm = $result->fetch_all(MYSQLI_BOTH);

}
$sql_o = "select * from output_indicators where project_id='$prjid' group by output_id";
$result = $conn->query($sql_o);


if (isset($_POST['saveFramework'])){
    if (empty($framework)){
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
    }else{
        $project= filter_var(stripslashes($_POST['project_objective']), FILTER_SANITIZE_STRING);
        if (empty($project)){
            echo "<script>
alert('all fields are required');
</script>";
        }else{
            $insertframework="update frameworks set objective='$project' where project_id='$prjid'";
            if (mysqli_query($conn,$insertframework)){

                header("location: clusters.php?id=" . $prjid);
            }
        }
    }
}


if (isset($_POST['saveClusters'])){
    $clusterID = $_POST['cid'];
    $indexmov=$_POST['indexmov'];
    $outcome=$_POST['outcome'];
    $output=$_POST['output'];
    $activities = $_POST['activity'];
    $indicatorsArray = $_POST["indicator"];
    $movarray=$indicatorsArray['mov'];
    $texts = $indicatorsArray['text'];
    $targets = $indicatorsArray['target'];

    $toSave = [];
    if (is_null($clusterID)|| is_null($outcome)){
        echo"<script>
alert('Outcome out put is required');
        </script>";
    }else {


        foreach ($_POST['outcome'] as $k => $outcome) {
            if (!empty($outcome)) {


                    if ($conn->query("insert into project_outcomes (project_id,indexmov,outcome, cluster_id) values ('$prjid','$indexmov', '" . $outcome . "', '$clusterID')")) {

                        $outcomeID = $conn->insert_id;
                        foreach ($_POST['output'] as $o => $output) {
                            if (!empty($output)) {
                                if (!is_array($output)) {
                                    if ($conn->query("insert into project_outputs (project_id, outcome_id, output, cluster_id) VALUES ($prjid, $outcomeID, '" . $output . "', $clusterID)")) {
                                        $outputID = $conn->insert_id;
                                        foreach ($movarray as $t => $textIndicator) {
                                            foreach ($texts as $text) {
                                                $textinds[] = $text;

                                            }
                                            foreach ($targets as $target) {
                                                $targetinds[] = $target;

                                            }
                                            if ($conn->query("insert into output_indicators (project_id, indicator, mov, target, output_id, cluster_id)  values ($prjid, '" . $text . "', '" . json_encode($textIndicator) . "', '" . $target . "', '" . $outputID . "', $clusterID) ")) {
                                                $indicatorID = $conn->insert_id;
                                            }
                                        }
                                        foreach ($activities as $activity) {
                                            $toSave[] = $activity;

                                        }
                                        if (!empty($toSave) && $conn->query("update output_indicators set activities='" . json_encode($toSave) . "' where output_id=$outputID")) {

                                        }
                                    }
                                }

                            }
                        }
                    }

            }
            header("location: clusters.php?id=" . $prjid);
        }
    }
}
if (isset($_POST['add_output'])){
    $clusterID =getclusterid($_POST['outcome_id']);
    $outcomeID=$_POST['outcome_id'];
    $output=$_POST['output'];
    $activities = $_POST['activity'];
    $indicatorsArray = $_POST["indicator"];
    $movarray=$indicatorsArray['mov'];
    $texts = $indicatorsArray['text'];
    $targets = $indicatorsArray['target'];

    $toSave = [];
    if (is_null($clusterID)|| is_null($output)){
        echo"<script>
alert('Outcome out put is required');
        </script>";
    }else {



                    foreach ($_POST['output'] as $o => $output) {
                        if (!empty($output)) {
                            if (!is_array($output)) {
                                if ($conn->query("insert into project_outputs (project_id, outcome_id, output, cluster_id) VALUES ($prjid, $outcomeID, '" . $output . "', $clusterID)")) {
                                    $outputID = $conn->insert_id;
                                    foreach ($movarray as $t => $textIndicator) {
                                        foreach ($texts as $text) {
                                            $textinds[] = $text;

                                        }
                                        foreach ($targets as $target) {
                                            $targetinds[] = $target;

                                        }
                                        if ($conn->query("insert into output_indicators (project_id, indicator, mov, target, output_id, cluster_id)  values ($prjid, '" . $text . "', '" . json_encode($textIndicator) . "', '" . $target . "', '" . $outputID . "', $clusterID) ")) {
                                            $indicatorID = $conn->insert_id;
                                        }
                                    }
                                    foreach ($activities as $activity) {
                                        $toSave[] = $activity;

                                    }
                                    if (!empty($toSave) && $conn->query("update output_indicators set activities='" . json_encode($toSave) . "' where output_id=$outputID")) {

                                    }
                                }
                            }

                        }
                        header("location: clusters.php?id=" . $prjid);
                    }
                }




}


if (isset($_POST['update_act'])){
    $outputID=$_POST['outcome_id'];
    $activity=$_POST['activity'];
    $toSave[] = $activity;
    if (empty($activity)|| empty($outputID)){
        echo "<script>
alert('All fields are required');
</script>";
    }else{
        $sql="update output_indicators set activities='" . json_encode($toSave) . "' where output_id='$outputID'";
        if (mysqli_query($conn,$sql)){
            $location='clusters.php?id='.$prjid.'';
            echo "<script>
alert('Activity updated successfully');
window.location.href='$location';
</script>";

        }
    }

}
if (isset($_POST['add_act'])){
    $outputID=$_POST['outcome_id'];
    $activity=$_POST['activity'];
    $toSave[] = $activity;
    if (empty($activity)|| empty($outputID)){
        echo "<script>
alert('All fields are required');
</script>";
    }else{
        $sql="update output_indicators set activities='" . json_encode($toSave) . "' where output_id='$outputID'";
        if (mysqli_query($conn,$sql)){
            $location='clusters.php?id='.$prjid.'';
            echo "<script>
alert('Activity added successfully');
window.location.href='$location';
</script>";

        }
    }

}