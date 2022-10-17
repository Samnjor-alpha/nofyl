<?php
session_start();
function checkuserexists($email): bool
{
global $conn;
$checkuser=mysqli_query($conn, "SELECT * FROM pm_users WHERE email = '$email'");
if (mysqli_num_rows($checkuser)>0){
    return true;
}else{
    return false;
}
}
function loginauth($email,$password): bool
{
    global $conn;
    $auth=mysqli_query($conn,"select  * from pm_users where email='$email'");
    $row=mysqli_fetch_assoc($auth);
    if (password_verify($password,$row['password'])){
        $_SESSION['role']=$row['role'];
        $_SESSION['user_id']=$row['id'];
        $_SESSION['email']=$row['email'];
        $_SESSION['names']=$row['first_name'].' '.$row['last_name'];
        return true;
    }else{
        return false;
    }

}
function checkemailexist($email)
{
    global $conn;
    $checkmail=mysqli_query($conn,"SELECT email from pm_users where email='$email'");
    if (mysqli_num_rows($checkmail)>0){

        return true;

    }else{
        return false;
    }
}
function adduser($fname, $lname, $email, $password, $role): bool
{
    global $conn;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $adduser="insert into pm_users set first_name='$fname',
                         last_name='$lname',
                        email='$email',
                         password='$hash',
                         role='$role'";
    if (mysqli_query($conn, $adduser)){
        return true;
    }else{
        return false;
    }

}
function checkloggedin(): bool
{
    if (isset($_SESSION['user_id'])){
        return true;
    }else{

        return false;
    }
}
function logout(): void
{

    session_destroy();
    header("location:../login/login.php");
}