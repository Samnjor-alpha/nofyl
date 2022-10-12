<?php
if (isset($_POST['prj_init'])){

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
    }else{
        $start_date=date('Y-m-d',strtotime($start_date_int));
        $end_date=date('Y-m-d',strtotime($end_date_int ));
        $pjinit="insert into prj_init set Allocation='$allocation',
                         Title='$title',
                         Fund_Code='$fund_code',
                         Start_Date='$start_date',
                         End_Date='$end_date',
                         organization='$org'";
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