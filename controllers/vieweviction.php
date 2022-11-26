<?php

$postEv = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $p_ev= mysqli_query($conn, "select * from post_eviction where indicator_id=$id");
    $postEv = $p_ev->fetch_object();

}