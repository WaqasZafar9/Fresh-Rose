<?php 
include('server.php');

// Initialize variables
$first_name = $last_name = $email = $password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assign posted values to variables
    $first_name = isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : '';
    $last_name = isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

    // Add form validation and submission logic here
    // Example: Save data to the database and redirect
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/login_register.css">
    <style>
        /* Your existing CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('images/bg1.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .back-button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .form-container h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .form-container h2 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .form-container form button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .form-container p {
            margin-top: 10px;
        }

        .form-container a {
            color: #4CAF50;
            text-decoration: none;
        }

        .form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <a href="index.html" class="back-button">Back to Home</a>
    <div class="container">
        <div class="form-container">
            <h1>Fresh <span style="color:red;">Rose</span></h1>
            <h2>Register</h2>
            <form method="post" action="register.php">
                <?php include('error.php'); ?>
                <input type="text" name="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" required>
                <input type="text" name="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" required>
                <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="reg_user">Register</button>
            </form>
            <p>Already have an account? <a href="login.html">Login</a></p>
        </div>
    </div>
    <script>
        function validateForm(event) {
            event.preventDefault(); // Prevent form from submitting

            // Get form elements
            const firstName = document.querySelector('input[name="first_name"]').value.trim();
            const lastName = document.querySelector('input[name="last_name"]').value.trim();
            const email = document.querySelector('input[name="email"]').value.trim();
            const password = document.querySelector('input[name="password"]').value;

            // Get error message element
            const errorContainer = document.getElementById('error-container');
            errorContainer.innerHTML = '';

            let valid = true;

            // Check for empty fields
            if (firstName === '') {
                errorContainer.innerHTML += '<p>First name is required.</p>';
                valid = false;
            }

            if (lastName === '') {
                errorContainer.innerHTML += '<p>Last name is required.</p>';
                valid = false;
            }

            if (email === '') {
                errorContainer.innerHTML += '<p>Email is required.</p>';
                valid = false;
            } else if (!validateEmail(email)) {
                errorContainer.innerHTML += '<p>Invalid email format.</p>';
                valid = false;
            }

            if (password === '') {
                errorContainer.innerHTML += '<p>Password is required.</p>';
                valid = false;
            } else if (password.length < 6) {
                errorContainer.innerHTML += '<p>Password must be at least 6 characters long.</p>';
                valid = false;
            }

            if (valid) {
                document.getElementById('registerForm').submit();
            }
        }

        function validateEmail(email) {
            // Regular expression for validating email format
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    </script>
</body>
</html>
