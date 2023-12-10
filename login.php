<?php
session_start(); // Start session to store login status

// Check if the user is already logged in

    // If not logged in, check login credentials
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Your hardcoded admin credentials (you should use secure methods in a real application)
        $adminUsername = "admin";
        $adminPassword = "admin123";

        if ($username === $adminUsername && $password === $adminPassword) {
            // If credentials are correct, set session variables
            $_SESSION["loggedin"] = true;
            // Redirect to the admin page (reload the page)
            header("Location: admin.php");
            exit();
        } else {
            // If credentials are incorrect, display an error message
            $loginError = "Invalid username or password.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Login Page</title>
    <!-- Add the Bootstrap CSS link here if not already included -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Set the background color */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #ffffff; /* Set the container background color */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
            max-width: 400px;
            width: 100%;
        }

        .login-container p {
            color: red; /* Set the error message color */
        }

        .form-label {
            color: #495057; /* Set the label color */
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff; /* Set the button background color */
            border-color: #007bff; /* Set the button border color */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Set the button background color on hover */
            border-color: #0056b3; /* Set the button border color on hover */
        }
        .container form{
            border-radius: .5rem;
    background-color: lightgrey;
    padding: 2rem;
    margin: 0 auto;
    max-width: 50rem;
        }
         h2{
            text-align: center;
        }
   


    </style>

    <!-- Your existing HTML code for the login form -->
</body>
</html>



<div class="container mt-5">
    <h2>Login</h2>
    
    <?php
    // Display login error message
    if (isset($loginError)) {
        echo '<p style="color: red;">' . $loginError . '</p>';
    }
    ?>

    <!-- Login Form -->
    <form action="" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

</body>
</html>

<?php

?>