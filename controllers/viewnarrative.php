<?php

$narr = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $nar = mysqli_query($conn, "select * from narrative where indicator_id=$id");
    $narr = $nar->fetch_object();

}