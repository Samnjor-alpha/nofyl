<?php


$acc_monitor = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $acc = mysqli_query($conn, "select * from monitoring where indicator_id=$id");
    $acc_monitor = $acc->fetch_object();

}