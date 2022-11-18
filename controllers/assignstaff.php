<?php
if (isset($_POST['assign_prj'])){
    $staff=$_POST['users'];

    if (is_array($staff) && !is_null($staff)){
        foreach ($_POST['users'] as $key => $value) {
            $prjid=$_POST['prjid'];
if (!checkassigned($value,$prjid)){
    $add="insert into project_users set user_id='$value', prj_id='$prjid'";
    if (mysqli_query($conn,$add)){
        echo "
        <script>
        toastr.success('Staff(s) assigned to project successfully');
        
        </script>";
    }else{
        echo "
        <script>
        toastr.error('An error occurred while assigning staff','ASSIGN ERROR');
        
        </script>";
    }
}else{
    echo "
        <script>
        toastr.info('Some of the  staff(s) selected have already being assigned to this project');
        
        </script>";
}
        }
    }else{
        echo "
        <script>
        toastr.error('select staff to assign projects');
        </script>";
    }

}