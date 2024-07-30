<?php
// Start a session if one is not already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'freshrose');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // form validation: ensure that the form is correctly filled ...
    if (empty($first_name)) { array_push($errors, "First name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }

    // check the database to make sure a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM register WHERE first_name='$first_name' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
        if ($user['first_name'] === $first_name) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password); // encrypt the password before saving in the database

        $query = "INSERT INTO register (first_name, last_name, email, password) 
                  VALUES('$first_name','$last_name', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['first_name'] = $first_name;
        $_SESSION['success'] = "You are now logged in";
        header('location: login.html');
        exit(); // make sure to stop script execution after redirect
    }
}
?>
