<?php
    // Session Start
    session_start();

    // Helper Functions
    require './helpers/helper-functions.php';

    // Variables
    require './helpers/variables.php';

    // Connection
    require './db/connection.php';

    // DB CRUD FUNCTIONS
    require './db/db-functions.php';

    // if session values ​​exist redirect to home page
    if (session('fullname') && session('email')) {
        header("Location: index.php");
        exit();
    }
?>

<!-- Head -->
<?php require_once './public/head.php'; ?>

<!-- Navbar -->
<?php require './view/navbar.php'; ?>


<!-- Register Operations -->
<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // control fullname
        if (empty(trim($_POST['fullname'])) || strlen(trim($_POST['fullname'])) < 2 || strlen(trim($_POST['fullname'])) > 50) {
            $registerErr['fullnameErr'] =  'Name must be between 2 and 50 characters';
        } else if (is_numeric($_POST['fullname'])) {
            $registerErr['fullnameErr'] =  'The fullname field cannot contain only numbers';
        } else {
            $fullname = ucwords(cleanInput($_POST['fullname']));
        }
        
        // control email
        if (empty($_POST['email'])) {
            $registerErr['emailErr'] = 'You did not enter an email address';
        } else {
            $email = cleanInput($_POST['email']);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $registerErr['emailErr'] = 'Please enter a valid email address';
            } else { 
                // Has this email been received before?

                if (hasUserEmail($conn, $email)) {
                    $registerErr['emailErr'] = 'This email is already registered. Please sign up with a different email address.';
                }
            }
        }

        // control city
        if (empty(trim($_POST['city']))) {
            $city = '';
        } else {
            $city = ucfirst(cleanInput($_POST['city']));
        }

        // control password and confirm password
        if (empty($_POST['password']) && strlen($_POST['password']) < 6) {
            $registerErr['passwordErr'] = 'Password must be at least 6 characters';
        } else {
            $password = cleanInput($_POST['password']);

            if (empty($_POST['confirm-password']) || $password != $_POST['confirm-password']) {
                $registerErr['confirmPasswordErr'] = 'passwords do not match';
            } else {
                $confirmPassword = cleanInput($_POST['confirm-password']);
                $password = password_hash($password, PASSWORD_DEFAULT);
            }
        }

        // If there is no error, the user can register
        if (count($registerErr) <= 0) {
            
            if (addUser($conn, $fullname, $email, $password, $city)) {
                header('Location: login.php?successRegister='.urlencode($message['success register']));
            }
        }
        
    }
    
?>

<!-- User Register Form -->
<?php require './view/register-main-form.php'; ?>

</body>
</html>

<?php $conn = null; ?>