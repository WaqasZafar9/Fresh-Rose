<?php
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader (if using Composer)
require 'vendor/autoload.php';
// Or include the PHPMailer files manually if not using Composer
require 'SMTP.php';
require 'PHPMailer.php';
require 'Exception.php';

// Start a session if one is not already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// initializing variables
$first_name = "";
$last_name = "";
$email = "";
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
        $password = password_hash($password, PASSWORD_DEFAULT); // hash the password

        $query = "INSERT INTO register (first_name, last_name, email, password) 
                  VALUES('$first_name','$last_name', '$email', '$password')";
        if (mysqli_query($db, $query)) {
            $_SESSION['first_name'] = $first_name;
            $_SESSION['success'] = "You are now logged in";

            // Send confirmation email using PHPMailer
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
                $mail->SMTPAuth   = true;
                $mail->Username   = 'waqaszafar771@gmail.com'; // SMTP username
                $mail->Password   = 'ymbf rtdf nxlj alme'; // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
                $mail->Port       = 587; // TCP port to connect to

                //Recipients
                $mail->setFrom('waqaszafar771@gmail.com', 'Fresh Rose');
                $mail->addAddress($email, $first_name); // Add recipient
                $mail->addReplyTo('waqaszafar771@gmail.com', 'Fresh Rose');

                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'Registration Confirmation';
                $mail->Body    = 'Thank you for registering, ' . htmlspecialchars($first_name) . '!<br><br>We look forward to serving you.';
                $mail->AltBody = 'Thank you for registering, ' . htmlspecialchars($first_name) . '! We look forward to serving you.';

                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                exit; // Stop further execution on failure
            }

            header('location: login.html');
            exit(); // make sure to stop script execution after redirect
        } else {
            array_push($errors, "Error registering user: " . mysqli_error($db));
        }
    }
}
?>
