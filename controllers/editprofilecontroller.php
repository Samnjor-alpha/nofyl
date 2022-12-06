<?php

$getprofile=mysqli_query($conn,"select * from pm_users where id='".$_SESSION['user_id']."'");
$rowpr=mysqli_fetch_assoc($getprofile);