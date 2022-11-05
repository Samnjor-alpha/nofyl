<?php
if (isset($_GET['id'])){
    $prjid = $_GET['id'];
    $project = [];
    $cover = [];
    $clusters = [];
    $framework = [];
    $projectOutcomes = [];
    $projectOutputs = [];
    $outputIndicators = [];
    $clusterssql = "select * from clusters where project_id=$prjid";
    if ($results = $conn->query($clusterssql)) {
        $clusters = $results->fetch_all(MYSQLI_BOTH);
    }
    $resultproject = mysqli_query($conn, "select * from prj_init where ID='$prjid'");
    $project = $resultproject->fetch_object();
}
if (isset($_POST['prj_init'])){

    $allocation = filter_var(stripslashes($_POST['allocation']), FILTER_SANITIZE_STRING);
    $title = filter_var(stripslashes($_POST['title']), FILTER_SANITIZE_STRING);
    $fund_code = filter_var(stripslashes($_POST['fund_code']), FILTER_SANITIZE_STRING);
    $start_date_int = filter_var(stripslashes($_POST['start_date_int']), FILTER_SANITIZE_STRING);
    $end_date_int = filter_var(stripslashes($_POST['end_date_int']), FILTER_SANITIZE_STRING);
    $org = filter_var(stripslashes($_POST['organization']), FILTER_SANITIZE_STRING);
    $primary_cluster = $_POST['cluster_name'];
    $preparedby=$_SESSION['user_id'];
    $sub_cluster_name =$_POST['sub_cluster_name'];
    $clusteperc= $_POST['cluster_perc'];
    if (empty($allocation)|| empty($title)|| empty($fund_code)
        || empty($start_date_int)|| empty($end_date_int)|| empty($org)){
        echo "<script>
alert('Please enter all fields');
</script>";
    }elseif (array_sum($clusteperc)>100 || array_sum($clusteperc)<100)
    {
        echo "<script>
alert('Cluster % should add to 100%');
</script>";
    }
    else{
        $start_date=date('Y-m-d',strtotime($start_date_int));
        $end_date=date('Y-m-d',strtotime($end_date_int ));
        $pjinit="insert into prj_init set Allocation='$allocation',
                         Title='$title',
                         Fund_Code='$fund_code',
                         Start_Date='$start_date',
                         End_Date='$end_date',
                         organization='$org',
                         prepared_by='$preparedby'";
        if (mysqli_query($conn,$pjinit)){
            $prjid = mysqli_insert_id($conn);
            foreach ($_POST['cluster_name'] as $key => $value) {
                $cluster = $value;
                $sub_cluster = $_POST['sub_cluster_name'][$key];
                $cluster_perc = $_POST['cluster_perc'][$key];
                $sql = "INSERT INTO clusters(project_id, cluster_name, subcluster_name, percentage) VALUES ('$prjid','$cluster', '$sub_cluster', '$cluster_perc')";

                if (mysqli_query($conn, $sql)){
                    header("location: coverpage.php?id=" . $prjid);
                }
            }


        }
    }
}
if (isset($_POST['prj_update'])){

    $allocation = filter_var(stripslashes($_POST['allocation']), FILTER_SANITIZE_STRING);
    $title = filter_var(stripslashes($_POST['title']), FILTER_SANITIZE_STRING);
    $fund_code = filter_var(stripslashes($_POST['fund_code']), FILTER_SANITIZE_STRING);
    $start_date_int = filter_var(stripslashes($_POST['start_date_int']), FILTER_SANITIZE_STRING);
    $end_date_int = filter_var(stripslashes($_POST['end_date_int']), FILTER_SANITIZE_STRING);
    $org = filter_var(stripslashes($_POST['organization']), FILTER_SANITIZE_STRING);
    $primary_cluster = $_POST['cluster_name'];
    $sub_cluster_name =$_POST['sub_cluster_name'];
    $clusteperc= $_POST['cluster_perc'];
    if (empty($allocation)|| empty($title)|| empty($fund_code)
        || empty($start_date_int)|| empty($end_date_int)|| empty($org)){
        echo "<script>
alert('Please enter all fields');
</script>";
    }elseif (array_sum($clusteperc)>100 || array_sum($clusteperc)<100)
    {
        echo "<script>
alert('Cluster % should add to 100%');
</script>";
    }
    else{
        $start_date=date('Y-m-d',strtotime($start_date_int));
        $end_date=date('Y-m-d',strtotime($end_date_int ));
        $pjinit="update prj_init set Allocation='$allocation',
                         Title='$title',
                         Fund_Code='$fund_code',
                         Start_Date='$start_date',
                         End_Date='$end_date',
                         organization='$org'
                         where ID='$prjid'";
        if (mysqli_query($conn,$pjinit)){

            foreach ($_POST['cluster_name'] as $key => $value) {
                $cluster = $value;
                $clusterid = $_POST['clusterid'][$key];
                $sub_cluster = $_POST['sub_cluster_name'][$key];
                $cluster_perc = $_POST['cluster_perc'][$key];
                $sql = "update  clusters set cluster_name='$cluster', subcluster_name='$sub_cluster', percentage='$cluster_perc' where project_id='$prjid' and cluster_id='$clusterid'";
                if (mysqli_query($conn, $sql)){
                    header("location: coverpage.php?id=" . $prjid);
                }
            }


        }
    }
}