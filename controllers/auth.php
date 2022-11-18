<?php



if (isset($_POST['loginBtn'])){
    $email=filter_var(stripslashes($_POST['email']), FILTER_SANITIZE_STRING);
    $password=filter_var(stripslashes($_POST['password']), FILTER_SANITIZE_STRING);
    if (empty($email)){
        echo "<script>
toastr.error('Email is required','Details required');
</script>";

    }elseif (empty($password)){
        echo "<script>
toastr.error('Password','Details required');
</script>";
    }else{
        if (!checkuserexists($email)){
            echo "<script>
toastr.info('Contact admin for account creation','Account does not exist');
</script>";
        }else{

            if(!loginauth($email,$password)){
                echo "<script>
toastr.error('Check your password and try again','Incorrect password');
</script>";
            }else{
$location=NOFYL_URL.'dashboard/workplan.php';
                echo "<script>
toastr.success('Redirecting to dashboard','Authentication success');
window.location.href='$location';
</script>";

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
      echo "<script>
toastr.error('First & Last name are required','Details required');
</script>";
    }elseif (empty($email)){
        echo "<script>
toastr.error('Email is required','Details required');
</script>";
    }elseif (empty($password) ||empty($cpwd)){
        echo "<script>
toastr.error('Password is required','Details required');
</script>";
    }elseif (empty($role)){
        echo "<script>
toastr.error('Select role for user','Details required');
</script>";
    }elseif(filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

        echo "<script>
toastr.error('Incorrect email format','Wrong email format');
</script>";
    }elseif (checkemailexist($email)){
        echo "<script>
toastr.info('Email is associated with an account','Account exists');
</script>";
        }elseif ($password!==$cpwd){
        echo "<script>
toastr.warning('Password mismatch','Check your password');
</script>";
    }else{
        if (adduser($fname,$lname,$email,$password,$role)){

            echo "<script>
toastr.success('Account created successfully.Redirecting to dashboard','Account created successfully');
window.location.href = '../dashboard/workplan.php';
</script>";
        }
    }
}
if (isset($_POST['adduser'])){
    $fname=filter_var(stripslashes($_POST['fname']), FILTER_SANITIZE_STRING);
    $lname=filter_var(stripslashes($_POST['lname']), FILTER_SANITIZE_STRING);
    $email=filter_var(stripslashes($_POST['email']), FILTER_SANITIZE_STRING);
    $password=filter_var(stripslashes($_POST['password']), FILTER_SANITIZE_STRING);
    $cpwd=filter_var(stripslashes($_POST['cpassword']), FILTER_SANITIZE_STRING);
    $role=filter_var(stripslashes($_POST['urole']), FILTER_SANITIZE_STRING);
    if (empty($fname)|| empty($lname)){
        echo "<script>
toastr.error('First & Last name are required','Details required');
</script>";
    }elseif (empty($email)){
        echo "<script>
toastr.error('Email is required','Details required');
</script>";
    }elseif (empty($password) ||empty($cpwd)){
        echo "<script>
toastr.error('Password is required','Details required');
</script>";
    }elseif (empty($role)){
        echo "<script>
toastr.error('Select role for user','Details required');
</script>";
    }elseif(filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

        echo "<script>
toastr.error('Incorrect email format','Wrong email format');
</script>";
    }elseif (checkemailexist($email)){
        echo "<script>
toastr.info('Email is associated with an account','Account exists');
</script>";
    }elseif ($password!==$cpwd){
        echo "<script>
toastr.warning('Password mismatch','Check your password');
</script>";
    }else{
        if (addstaff($fname,$lname,$email,$password,$role)){

            echo "<script>
toastr.success('User created successfully.','User added successfully');

</script>";
        }
    }
}
