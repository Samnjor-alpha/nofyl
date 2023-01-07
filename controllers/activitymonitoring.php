<?php
if (isset($_GET['id'])&& !empty($_GET['id'])) {
    $activity=mysqli_query($conn,"select * from monitoring where indicator_id='".$_GET['id']."'");
    $row=mysqli_fetch_assoc($activity);

        if (isset($_POST['saveReport'])) {
            $from = $_POST['from'];
            $to = $_POST['to'];
            $program = $_POST['program'];
            $filledby = $_POST['filledby'];
            $subDate = $_POST['subDate'];
            $summary = $_POST['summary'];
            $activity = $_POST['activity'];
            $update = $_POST['update'];
            $dDate = $_POST['dDate'];
            $topic = $_POST['topic'];
            $period = $_POST['period'];
            $people = $_POST['people'];
            $days = $_POST['days'];
            $noparticipants = $_POST['nopeople'];
            if (empty($people) || empty($days) || empty($from)
                || empty($to) || empty($program)
                || empty($filledby) || empty($subDate)
                || empty($summary) || empty($activity) ||
                empty($dDate) || empty($topic)
            ) {
                echo "<script>
alert('All fields are required');
</script>";
            } else {
                $fromd = date('Y-m-d', strtotime($from));
                $tod = date('Y-m-d', strtotime($to));
                $subdate = date('Y-m-d', strtotime($subDate));
                $ddate = date('Y-m-d', strtotime($dDate));
                $add = "insert into monitoring set fromD='$fromd',
                                             toD='$tod',
                                             indicator_id='" . $_GET['id'] . "',
                                             programme='$program',
                                             filledby='$filledby',
                                             date_submitted='$subdate',
                                             summary='$summary',
                                             activity='$activity',
                                             deliverables='$period',
                                             s_update='$update',
                                             daymonth='$ddate',
                                             training='$topic',
                                             participants='$people',
                                             no_Days='$days',
                                             no_participants='$noparticipants'";
                if (mysqli_query($conn, $add)) {
                    $update=mysqli_query($conn, "UPDATE output_indicators set upload_status='1' where id='".$_GET['id']."'");
                    echo "<script>
            alert('Report submitted succcessfully');
            window.location.href = '../clusters.php?id=" . getprojectid($_GET['id']) . "';
</script>";
                }
            }

        }
    if (isset($_POST['updateReport'])) {
        $uid=$_POST['uid'];
        $from = $_POST['from'];
        $to = $_POST['to'];
        $program = $_POST['program'];
        $filledby = $_POST['filledby'];
        $subDate = $_POST['subDate'];
        $summary = $_POST['summary'];
        $activity = $_POST['activity'];
        $update = $_POST['update'];
        $dDate = $_POST['dDate'];
        $topic = $_POST['topic'];
        $period = $_POST['period'];
        $people = $_POST['people'];
        $days = $_POST['days'];
        $noparticipants = $_POST['nopeople'];
        if (empty($people) || empty($days) || empty($from)
            || empty($to) || empty($program)
            || empty($filledby) || empty($subDate)
            || empty($summary) || empty($activity) ||
            empty($dDate) || empty($topic)
        ) {
            echo "<script>
alert('All fields are required');
</script>";
        } else {
            $fromd = date('Y-m-d', strtotime($from));
            $tod = date('Y-m-d', strtotime($to));
            $subdate = date('Y-m-d', strtotime($subDate));
            $ddate = date('Y-m-d', strtotime($dDate));
            $add = "update monitoring set fromD='$fromd',
                                             toD='$tod',
                                             programme='$program',
                                             filledby='$filledby',
                                             date_submitted='$subdate',
                                             summary='$summary',
                                             activity='$activity',
                                             deliverables='$period',
                                             s_update='$update',
                                             daymonth='$ddate',
                                             training='$topic',
                                             participants='$people',
                                             no_Days='$days',
                                             no_participants='$noparticipants'
                                             where id='$uid'";
            if (mysqli_query($conn, $add)) {
                $update=mysqli_query($conn, "UPDATE output_indicators set upload_status='1' where id='".$_GET['id']."'");
                echo "<script>
            alert('Report updated succcessfully');
            window.location.href = '../clusters.php?id=" . getprojectid($_GET['id']) . "';
</script>";
            }
        }

    }

}else{
    echo "<script>
            alert('not allowed');
</script>";
}