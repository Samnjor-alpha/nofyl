<?php


$awareness = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $aware = mysqli_query($conn, "select * from awareness where indicator_id=$id");
    $awareness = $aware->fetch_object();

}