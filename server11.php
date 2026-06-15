<?php
if(!isset($_SESSION)) { session_start(); }
$error = array();

$db = mysqli_connect('localhost', 'root', '', 'cilantro');

// ---- REGISTER ----
if(isset($_POST['register'])){
    $username  = mysqli_real_escape_string($db, $_POST['un']);
    $email     = mysqli_real_escape_string($db, $_POST['em']);
    $password1 = mysqli_real_escape_string($db, $_POST['psw1']);
    $password2 = mysqli_real_escape_string($db, $_POST['psw2']);

    if(empty($username))       array_push($error, "Username is required");
    if(empty($email))          array_push($error, "Email is required");
    if(empty($password1))      array_push($error, "Password is required");
    if($password1 != $password2) array_push($error, "Passwords do not match");

    // check username unique
    if(count($error) == 0){
        $check_user = mysqli_query($db, "SELECT id FROM users WHERE username='$username'");
        if(mysqli_num_rows($check_user) > 0)
            array_push($error, "Username already taken");
    }

    // check email unique
    if(count($error) == 0){
        $check_email = mysqli_query($db, "SELECT id FROM users WHERE email='$email'");
        if(mysqli_num_rows($check_email) > 0)
            array_push($error, "Email already registered");
    }

    if(count($error) == 0){
        mysqli_query($db, "INSERT INTO users (username, email, password) VALUES ('$username','$email','$password1')");
        $reg_success = "Account created! You can now login.";
    }
}

// ---- LOGIN ----
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($db, $_POST['un']);
    $password = mysqli_real_escape_string($db, $_POST['psw1']);

    if(empty($username)) array_push($error, "Username is required");
    if(empty($password)) array_push($error, "Password is required");

    if(count($error) == 0){
        $result = mysqli_query($db, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        if(mysqli_num_rows($result) == 1){
            $_SESSION['username'] = $username;
            header('location:dashboard.php'); exit();
        } else {
            array_push($error, "Wrong username or password");
        }
    }
}

// ---- LOGOUT ----
if(isset($_GET['logout'])){
    session_destroy();
    header('location:login.php'); exit();
}
?>
