<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    if (isset($_POST['saveReport'])) {
        $targetDir = "../uploads/";
        $allowTypes = array('jpg', 'png', 'jpeg', 'doc','xls','xlsx','txt','ppt','pptx', 'docx','pdf');
        $title=$_POST['title'];
        $pcode=$_POST['pcode'];
        $activity=$_POST['activity'];
        $prepared=$_POST['prepared'];
        $intro=$_POST['intro'];
        $fileNames = $_FILES['files']['name'];
        $selection=$_POST['selection'];
        if (empty($title)||  empty($selection)|| empty($pcode)
            || empty($activity) || empty($prepared) || empty($intro)
        ) {
            echo "<script>
alert('All fields are required');
</script>";
        } else {
            $fileName = basename($_FILES['files']['name']);
            $targetFilePath = $targetDir . $fileName;

// Check whether file type is valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
// Upload file to server
                if (move_uploaded_file($_FILES["files"]["tmp_name"], $targetFilePath)) {
            $add = "insert into cow set
                    report_period='$title',
                    prj_code='$pcode',
                    activity='$activity',
                    prepared_by='$prepared',
                    intro='$intro',
                    criteria='$selection',
                    sheet='$fileName',
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
} }else {
        echo "<script>
            alert('not allowed');
</script>";

}