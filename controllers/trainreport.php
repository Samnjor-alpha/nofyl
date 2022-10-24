<?php
if (isset($_GET['id'])&&!empty($_GET['id'])) {
    if (isset($_POST['saveReport'])) {
        $targetDir = "../uploads/";
        $allowTypes = array('jpg', 'png', 'jpeg', 'doc', 'xls', 'xlsx', 'txt', 'ppt', 'pptx', 'docx', 'pdf');
        $rtitle=$_POST['rtitle']??null;
        $donor=$_POST['donor']??null;
        $facilitator=$_POST['facilitator']??null;
        $fromDate = date('Y-m-d', strtotime($_POST['fromD'])) ?? null;
        $toDate = date('Y-m-d', strtotime($_POST['toD'])) ?? null;
        $loc_train=$_POST['loc_train']??null;
        $target_group=$_POST['target_group']??null;
        $delivery=$_POST['delivery']??null;
        $noM=$_POST['noM']??null;
        $noF=$_POST['noF']??null;
        $objective=$_POST['objective']??null;
        $summary=$_POST['summary']??null;
        $intro=$_POST['intro']??null;
        $norms=$_POST['norms']??null;
        $expectations=$_POST['expectations']??null;
        $proceedings=$_POST['proceedings']??null;
        $impact=$_POST['impact']??null;
        $conclusion=$_POST['conclusion']??null;
        $recommend=$_POST['recommend']??null;
        $fileNamep = basename($_FILES['files_p']['name']);
        $targetFilePath_p = $targetDir . $fileNamep;
        $fileNamel = basename($_FILES['files_l']['name']);
        $targetFilePath_l = $targetDir . $fileNamel;
        $fileTypep = pathinfo($targetFilePath_p, PATHINFO_EXTENSION);
        $fileTypel = pathinfo($targetFilePath_l, PATHINFO_EXTENSION);

        if (in_array($fileTypep, $allowTypes) && in_array($fileTypel, $allowTypes)) {
// Upload file to server
            if (move_uploaded_file($_FILES["files_p"]["tmp_name"], $targetFilePath_p)
                && move_uploaded_file($_FILES["files_l"]["tmp_name"], $targetFilePath_l)) {
                $add = "insert into training_report set
                  donor='$donor',
                  facilitator='$facilitator',
                  fromD='$fromDate',
                   toD='$toDate',
                   loc_training='$loc_train',
                   group_name='$target_group',
                   delivery='$delivery',
                   no_females='$noF',
                   no_males='$noM',
                   objectives='$objective',
                   summary='$summary',
                   intro='$intro',
                   ground_norms='$norms',
                   expectation='$expectations',
                   proceedings='$proceedings',
                   impact='$impact',
                   conclusion='$conclusion',
                 recommendations='$recommend',                   
                   photos='$fileNamep',
                   participant='$fileNamel',
                   indicator_id='".$_GET['id']."'";

                if (mysqli_query($conn, $add)) {
                    $update = mysqli_query($conn, "UPDATE output_indicators set upload_status='1' where output_id='" . $_GET['id'] . "'");
                    echo "<script>
            alert('Report submitted succcessfully');
</script>";
                }
            }else{
                echo "<script>
            alert('upload failed');
</script>";
            }
        }

    }
}
    else{

        header('Location:../home.php');


    }
    ?>