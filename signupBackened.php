<?php

include_once 'dbCon.php';
$con = connect();

    $customer_name           = mysqli_real_escape_string($con, $_POST['name']);
    $customer_lName          = mysqli_real_escape_string($con, $_POST['lName']);
    $customer_gender         = mysqli_real_escape_string($con, $_POST['gender']);
    $customer_mobile         = mysqli_real_escape_string($con, $_POST['mobile']);
    $customer_address        = mysqli_real_escape_string($con, $_POST['address']);
    $customer_more           = mysqli_real_escape_string($con, $_POST['more']);
    $customer_email          = mysqli_real_escape_string($con, $_POST['email']);
    $customer_password       = mysqli_real_escape_string($con, $_POST['password']);
    $c_password              = mysqli_real_escape_string($con, $_POST['conPassword']);
    $age                     = mysqli_real_escape_string($con, $_POST['age']);
    $post_cd                 = mysqli_real_escape_string($con, $_POST['post_cd']);
    

    /* validation */

    $sel = "SELECT * from users WHERE email='$customer_email'";
    $run = mysqli_query($con,$sel);
    $check_email = mysqli_num_rows($run);

    $sel2 = "SELECT * from users WHERE name='$customer_name'";
    $run2 = mysqli_query($con,$sel2);
    $check_name = mysqli_num_rows($run2);

    $customer_name_length       = strlen($customer_name);
    $customer_lName_length      = strlen($customer_lName);
    $customer_mobile_length     = strlen($customer_mobile);
    $customer_address_length    = strlen($customer_address);
    $customer_post_cd_length    = strlen($post_cd);
    $customer_email_length      = strlen($customer_email);
    $customer_password_length   = strlen($customer_password);

    /* existing email */
    if ($check_email == 1) {
        echo '<script>alert("This email is already exist. Please try with another one!");</script>';
        exit();
    }
    /* existing username */
    elseif ($check_name == 1) {
        echo '<script>alert("First name has already taken, Please try with another one. It will be your username !");</script>';
        exit();
    }
    /* password match */
    elseif ($customer_password != $c_password) {
        echo '<script>alert("Password must be matching !");</script>';
        exit();
    }
    /* validate not empty */
    elseif (empty ($customer_name)) {
        echo '<script>alert("Please enter your first name !");</script>';
        exit();
    }
    elseif (empty ($customer_lName)) {
        echo '<script>alert("Please enter your last name !");</script>';
        exit();
    }
    elseif (empty ($customer_mobile)) {
        echo '<script>alert("Please enter your mobile number !");</script>';
        exit();
    }
    elseif (empty ($customer_address)) {
        echo '<script>alert("Please enter your address !");</script>';
        exit();
    }
    elseif (empty ($customer_email)) {
        echo '<script>alert("Please enter your email !");</script>';
        exit();
    }
    elseif (empty ($customer_password)) {
        echo '<script>alert("Please enter your password !");</script>';
        exit();
    }

    /*  special validation */

    /*  username = only letters and white spaces */
    elseif (!preg_match("/^[a-zA-Z ]*$/",$customer_name)) {
        echo '<script>alert("Only letters and white space allowed for first name.");</script>';
        exit();
    }
    /*  username = range validation */
    elseif ($customer_name_length<3) {
        echo '<script>alert("First name is not within the legal range");</script>';
        exit();
    }

    /*  last name = only letters and white spaces */
    elseif (!preg_match("/^[a-zA-Z ]*$/",$customer_lName)) {
        echo '<script>alert("Only letters and white space allowed for last name.");</script>';
        exit();
    }
    /*  last name = range validation */
    elseif ($customer_lName_length<3) {
        echo '<script>alert("Last name is not within the legal range");</script>';
        exit();
    }

    /*  Mobile = range validation */
    elseif ($customer_mobile_length<11) {
        echo '<script>alert("Mobile number is not within the legal range");</script>';
        exit();
    }


    /*  address = only letters and white spaces */
    elseif ($customer_address_length<10) {
        echo '<script>alert("Address is not within the legal range");</script>';
        exit();
    }

    /*  postal code = length validation */
    elseif ($customer_post_cd_length<4) {
        echo '<script>alert("Postal Code is not within the legal range");</script>';
        exit();
    }

    /*  email = well-formed email validation */
    elseif (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Please use valid email address");</script>';
        exit();
    }

    /*  password = range validation */
    elseif ($customer_password_length<7) {
        echo '<script>alert("Password is not within the legal range");</script>';
        exit();
    }
    /*  password = Strong validation */
    /*elseif(!preg_match("#[0-9]+#",$customer_password)) {
        echo '<script>alert("Your Password Must Contain At Least 1 Number!");</script>';
    }
    elseif(!preg_match("#[A-Z]+#",$customer_password)) {
        echo '<script>alert("Your Password Must Contain At Least 1 Capital Letter!");</script>';
    }
    elseif(!preg_match("#[a-z]+#",$customer_password)) {
        echo '<script>alert("Your Password Must Contain At Least 1 Lowercase Letter!");</script>';
    }*/

    /* /validation */

    else {
        $insert = "INSERT INTO users(user_type,name,lName,gender,mobile,address,more,email,password,age,post_cd)VALUES(1,'$customer_name', '$customer_lName', '$customer_gender', '$customer_mobile', '$customer_address', '$customer_more', '$customer_email' ,'$customer_password','$age','$post_cd')";
        $run_insert = mysqli_query($con, $insert);

        if ($run_insert) {
            echo '<script>alert("Registration successful !"); window.location.href = "login.php";</script>';
        }
    }



?>