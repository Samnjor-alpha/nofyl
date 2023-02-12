<?php
if (isset($_GET['id'])&&!empty($_GET['id'])) {
    $media=mysqli_query($conn,"select * from mov_media where 
                            indicator_id='".$_GET['id']."'");

    if (isset($_POST['upload'])) {
// File upload configuration
        $targetDir = "../uploads/";
        $allowTypes = array('jpg', 'png', 'jpeg', 'doc','xls','xlsx','txt','ppt','pptx', 'docx','pdf');

        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
        $fileNames = array_filter($_FILES['files']['name']);
        if (!empty($fileNames)) {
            foreach ($_FILES['files']['name'] as $key => $val) {
// File upload path
                $Name = basename($_FILES['files']['name'][$key]);
                $fileName = getindexmov(getclusterbyindicatorid($_GET['id'])) ."-".$Name;
                $targetFilePath = $targetDir . $fileName;


//                $targetFilePath = $targetDir . $fileName;

// Check whether file type is valid
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
// Upload file to server
                    if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
// Image db insert sql
                        $insertValuesSQL .= "('".$fileName."', NOW(),'".$_GET['id']."'),";
                    } else {
                        $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                    }
                } else {
                    $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
                }
            }

// Error message
            $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
            $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
            $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

            if (!empty($insertValuesSQL)) {
                $insertValuesSQL = trim($insertValuesSQL, ',');
// Insert image file name into database
                $insert = $conn->query("INSERT INTO mov_media (file_name, uploaded_on,indicator_id) VALUES $insertValuesSQL");
                if ($insert) {
                    $update=mysqli_query($conn, "UPDATE output_indicators set upload_status='1' where id='".$_GET['id']."'");
                    echo "<script>
alert('files uploaded successfully');
window.location.href = '../clusters.php?id=".getprojectid($_GET['id'])."';
</script>";
                    
                } else {
                    echo "<script>
alert('Sorry, there was an error uploading your file');
</script>";
                    
                }
            } else {
                echo "<script>
alert('Upload failed');
</script>";    
            }
        } else {
            echo "<script>
alert('Select a file to upload');
</script>";
        }
    }
    if (isset($_GET['delete'])){
        $page=$_SERVER['PHP_SELF']."?id=".$_GET['id'];
        $getmedia=mysqli_query($conn,"select file_name from
                     mov_media where id='".$_GET['delete']."' ");
        $mrow=mysqli_fetch_assoc($getmedia);
        $filename=$mrow['file_name'];
        $delete="delete from mov_media where id='".$_GET['delete']."'";
        if (mysqli_query($conn,$delete)){
            mysqli_query($conn,"update output_indicators set upload_status='0' where id='".$_GET['id']."' ");
            unlink("../uploads/$filename");
            echo"<script>
alert('Upload deleted successfully');
window.location.href='$page'
</script>";
        }
    }
}
else{

header('Location:../home.php');


}
