<?php

if ($_SESSION['role']=="admin"){
    $projects=mysqli_query($conn,"select * from prj_init order by ID desc");
}else{

    $projects=mysqli_query($conn,"select * from prj_init inner join project_users where project_users.prj_id=prj_init.ID and  
                                                    project_users.user_id='".$_SESSION['user_id']."' order by prj_init.ID desc");
}

if (isset($_GET['destroy'])){

    $delete="delete from prj_init where ID = '".$_GET['destroy']."'";
    if (mysqli_query($conn,$delete)){

        echo "
        <script>
        window.location.href='workplan.php';
        </script>
        ";
    }

}