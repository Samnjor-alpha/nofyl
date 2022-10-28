<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    if (isset($_POST['saveReport'])) {
        $targetDir = "../uploads/";
        $allowTypes = array('jpg', 'png', 'jpeg', 'doc', 'xls', 'xlsx', 'txt', 'ppt', 'pptx', 'docx', 'pdf');
        $activity = $_POST['activity'] ?? null;
        $act_code = $_POST['act_code'] ?? null;
        $act_desc = $_POST['act_desc'] ?? null;
        $act_ind = $_POST['act_ind'] ?? null;
        $target = $_POST['target'] ?? null;
        $ind_target = $_POST['ind_target'] ?? null;
        $cu_target = $_POST['cu_target'] ?? null;
        $district=$_POST['district']??null;
        $men=$_POST['men']??null;
        $women=$_POST['women']??null;
        $boys=$_POST['boys']??null;
        $girls=$_POST['girls']??null;
        $act=$_POST['act']??null;
        $planned=$_POST['planned']??null;
        $achieved=$_POST['achieved']??null;
        $achievement=$_POST['achievement']??null;
        $fromDate = date('Y-m-d', strtotime($_POST['fromD'])) ?? null;
        $toDate = date('Y-m-d', strtotime($_POST['toD'])) ?? null;
        $name = $_POST['name'] ?? null;
        $title = $_POST['title'] ?? null;
        $summary=$_POST['summary']??null;
        $stories=$_POST['stories']??null;
        $fileNames = $_FILES['files']['name'];
        $fileName = basename($_FILES['files']['name']);
        $targetFilePath = $targetDir . $fileName;

        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes)) {
// Upload file to server
            if (move_uploaded_file($_FILES["files"]["tmp_name"], $targetFilePath)) {
                $add = "insert into post_eviction set
                   act_code='$act_code',
                   act_name='$activity',
                   act_desc='$act_desc',
                   act_ind='$act_ind',
                   ind_target='$ind_target',
                   cu_target='$cu_target',
                   target='$target',
                   fromD='$fromDate',
                   toD='$toDate',
                   name='$name',
                   title='$title',
                    district='$district',
                     women='$women',
                     men='$men',
                     boys='$men',
                     girls='$girls',
                   summary='$summary',
                   achievement='$achievement',
                   targ_achieved='$achieved',  
                   act_target='$target',
                   targ_planned='$planned',
                   stories='$stories',
                   photo='$fileName',                 
                   indicator_id='".$_GET['id']."'";

                if (mysqli_query($conn, $add)) {
                    $update=mysqli_query($conn, "UPDATE output_indicators set upload_status='1' where id='".$_GET['id']."'");
                    echo "<script>
            alert('Report submitted succcessfully');
            window.location.href = '../clusters.php?id=".getprojectid($_GET['id'])."';
</script>";
                }
            }else{
                echo "<script>
            alert('upload failed');
</script>";
            }
        }

    }
}else{
    echo "<script>
alert('Data wont be recorded');
            
</script>";

}