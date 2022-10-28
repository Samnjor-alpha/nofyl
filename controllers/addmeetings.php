<?php
if (isset($_GET['id'])&&!empty($_GET['id'])) {
    $indid=$_GET['id'];
    $minutes=mysqli_query($conn,"select  * from minutes   where indicator_id=$indid");
    $row= mysqli_fetch_assoc($minutes);
    $agenda=[];
    $id=$row['id'];
    $agendasql = "select * from agenda where minutes_id='$id'";
    if ($results = $conn->query($agendasql)) {
        $agenda = $results->fetch_all(MYSQLI_BOTH);
    }
    if (isset($_POST['SaveMinutes'])){
        $title=$_POST['mTitle'];
        $members =$_POST['members'];
        $chaired=$_POST['chairedBy'];
        $nDate=$_POST['nDate'];
        $agenda=$_POST['agenda'];
        $details=$_POST['details'];
        if (empty($title)|| empty($chaired) || empty($agenda)|| empty($details)|| empty($nDate)){
            echo '<script>
alert("all fields are required");
</script>';
        }else{
            $ind_id=trim($_GET['id']);
            $ndate=date('Y-m-d',strtotime($nDate));
            $addminutes="insert into minutes set indicator_id='".$_GET['id']."',members='$members',title='$title',chairedby='$chaired',next_meeting='$ndate'";
            if (mysqli_query($conn,$addminutes)){
                $minuteid=mysqli_insert_id($conn);
                foreach ($_POST['agenda'] as $k => $agenda) {
                    if (!empty($agenda)) {
$agendaf=implode('',$_POST['agenda']);
$detailsf=implode('',$_POST['details']);

                            if ($conn->query("insert into agenda set minutes_id='$minuteid',agenda='$agendaf',details='$detailsf'")) {
                                $update=mysqli_query($conn, "UPDATE output_indicators set upload_status='1' where id='".$_GET['id']."'");
                                echo "<script>
alert('Minutes recorded successfully');
            window.location.href = '../clusters.php?id=".getprojectid($_GET['id'])."';
</script>";
                                
                        }
                    }
            }
        }
    }



}}