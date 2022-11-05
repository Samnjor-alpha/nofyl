<?php
if ($_SESSION['role']!=="admin"){
    header("Location:workplan.php");
}
$getusers=mysqli_query($conn, "select * from pm_users where id!='".$_SESSION['user_id']."'");