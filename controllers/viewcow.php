<?php

$cows = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $cow = mysqli_query($conn, "select * from cow where indicator_id=$id");
    $cows = $cow->fetch_object();

}