<?php
$training=[];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
$train=mysqli_query($conn,"select * from training_report where indicator_id=$id");
    $training = $train->fetch_object();

}