<?php 
    session_start();
    include('connect.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($pdo, $_POST['username']);
        $password = mysqli_real_escape_string($pdo, $_POST['password']);
        $answer = mysqli_real_escape_string($pdo, $_POST['user']);
        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (empty($answer)) {
            array_push($errors, "Please select");
        }

        if ($answer == "customer") {          
            if (count($errors) == 0) {
            $password = $password;
            $query = "SELECT * FROM customer WHERE username_cus = '$username' AND password_cus = '$password' ";
            $result = mysqli_query($pdo, $query);

                if (mysqli_num_rows($result) == 1) {
                    $_SESSION['username'] = $username;
                    $_SESSION['success'] = "Your are now logged in";
                    header("location: index.php");
                } else {
                    array_push($errors, "Wrong Username or Password");
                    $_SESSION['error'] = "Wrong Username or Password!";
                    header("location: login.php");
                }
            } 
            else {
                array_push($errors, "Username & Password is required");
                $_SESSION['error'] = "Username & Password is required";
                header("location: login.php");
            }
        }

        elseif ($answer == "admin") {          
            if (count($errors) == 0) {
            $password = $password;
            $query = "SELECT * FROM admin WHERE username_ad = '$username' AND password_ad = '$password' ";
            $result = mysqli_query($pdo, $query);

                if (mysqli_num_rows($result) == 1) {
                    $_SESSION['username'] = $username;
                    $_SESSION['success'] = "Your are now logged in";
                    header("location: homead.php");
                } else {
                    array_push($errors, "Wrong Username or Password");
                    $_SESSION['error'] = "Wrong Username or Password!";
                    header("location: login.php");
                }
            } 
            else {
                array_push($errors, "Username & Password is required");
                $_SESSION['error'] = "Username & Password is required";
                header("location: login.php");
            }
        }
        else{
            array_push($errors, "choose botton");
                    $_SESSION['error'] = "choose botton";
                    header("location: login.php");
        }
    }

?>