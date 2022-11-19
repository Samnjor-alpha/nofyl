<?php
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'nofyl1';
const NOFYL_URL='http://localhost/nofyl/';
const EMAIL_USE_SMTP = true;
const EMAIL_SMTP_HOST = "smtp.gmail.com";
const EMAIL_SMTP_AUTH = true;
const EMAIL_SMTP_USERNAME = "nbmsnoreply@gmail.com";
const EMAIL_SMTP_PASSWORD = "tisrziujhyncmuvc";
const EMAIL_SMTP_PORT = 587;
const EMAIL_SMTP_ENCRYPTION = "tsl";
//const DB_HOST = 'remotemysql.com';
//const DB_USER = 'e7IMkjNUY4';
//const DB_PASS = 'a7XFCSAd1b';
//const DB_NAME = 'e7IMkjNUY4';
//const NOFYL_URL='https://kalablak.co.ke/nofyl1/';
//const DB_HOST = 'localhost';
//const DB_USER = 'kalablak_nofyl';
//const DB_PASS = "PNkFy%Cnr[_+";
//const DB_NAME = 'kalablak_nofyl';
//const NOFYL_URL='https://kalablak.co.ke/nofyl1/';

date_default_timezone_set('Africa/Nairobi');
$conn=mysqli_connect(DB_HOST ,DB_USER, DB_PASS,DB_NAME);
