<?php
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'nofyl1';
const NOFYL_URL='http://localhost/nofyl/';
//const DB_HOST = 'localhost';
//const DB_USER = 'kalablak_wp705';
//const DB_PASS = 'p@8(2SMM92';
//const DB_NAME = 'kalablak_wp705';
//const FBF_URL='http://cal.kalablak.co.ke/FBF';
date_default_timezone_set('Africa/Nairobi');
$conn=mysqli_connect(DB_HOST ,DB_USER, DB_PASS,DB_NAME);
