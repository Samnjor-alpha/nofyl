<?php
include 'authcontroller.php';

$msg="";
$msg_class="";
$msg_icon="";

if (isset($_POST['loginBtn'])){
    $email=filter_var(stripslashes($_POST['email']), FILTER_SANITIZE_STRING);
    $password=filter_var(stripslashes($_POST['password']), FILTER_SANITIZE_STRING);
    if (empty($email)){
        $msg="Enter your Email";
        $msg_class="alert-danger";
        $msg_icon="bi-exclamation-octagon";

    }elseif (empty($password)){
        $msg="Enter your password";
        $msg_class="alert-danger";
        $msg_icon="bi-exclamation-octagon";
    }else{
        if (!checkuserexists($email)){
            $msg="Contact administrator for account registration";
            $msg_class="alert-danger";
            $msg_icon="bi-exclamation-octagon";
        }else{

            if(!loginauth($email,$password)){
                $msg="Incorrect password";
                $msg_class="alert-danger";
                $msg_icon="bi-exclamation-octagon";
            }else{

header("Location:".NOFYL_URL."dashboard/home.php");

            }
        }
    }

}
if (isset($_POST['regBtn'])){
    $fname=filter_var(stripslashes($_POST['fname']), FILTER_SANITIZE_STRING);
    $lname=filter_var(stripslashes($_POST['lname']), FILTER_SANITIZE_STRING);
    $email=filter_var(stripslashes($_POST['email']), FILTER_SANITIZE_STRING);
    $password=filter_var(stripslashes($_POST['password']), FILTER_SANITIZE_STRING);
    $cpwd=filter_var(stripslashes($_POST['cpassword']), FILTER_SANITIZE_STRING);
    $role=filter_var(stripslashes($_POST['urole']), FILTER_SANITIZE_STRING);
    if (empty($fname)|| empty($lname)){
        $msg="All Names are required";
        $msg_class="alert-danger";
        $msg_icon="bi-exclamation-octagon";
    }elseif (empty($email)){
        $msg="Enter your Email";
        $msg_class="alert-danger";
        $msg_icon="bi-exclamation-octagon";
    }elseif (empty($password) ||empty($cpwd)){
        $msg="Enter both passwords";
        $msg_class="alert-danger";
        $msg_icon="bi-exclamation-octagon";
    }elseif (empty($role)){
        $msg="select a role";
        $msg_class="alert-danger";
        $msg_icon="bi-exclamation-octagon";
    }elseif(filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

        $msg="Invalid Email";
        $msg_class="alert-danger";
        $msg_icon="bi-exclamation-octagon";
    }elseif (checkemailexist($email)){
            $msg="Email is associated with an account";
            $msg_class="alert-danger";
            $msg_icon="bi-exclamation-octagon";
        }elseif ($password!==$cpwd){
        $msg="Passwords dont match";
        $msg_class="alert-danger";
        $msg_icon="bi-exclamation-octagon";
    }else{
        if (adduser($fname,$lname,$email,$password,$role)){
            $msg = "Created successfully";
            $msg_class = "alert-success";
            $msg_icon = "bi-check-circle";
        }
    }
}
if (isset($_GET['logout'])){
    logout();
}
