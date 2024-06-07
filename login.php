<?php
    // Session Start
    session_start();

    // Variables
    require './helpers/variables.php';

    // Helper Functions
    require './helpers/helper-functions.php';

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

<?php require_once './public/head.php'; ?>

<?php require './view/navbar.php'; ?>

<?php
    // Login islemleri

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        // control login email
        if (empty(trim($_POST['email']))) {
            $loginErr['loginEmailErr'] = 'You did not enter an email address';
        } else {
            $loginEmail = cleanInput($_POST['email']);

            if (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
                $loginErr['loginEmailErr'] = 'Please enter a valid email address';
            } else {
                
                // Is this email registered in the database?
                if (!hasUserEmail($conn, $loginEmail)) {
                    $loginErr['loginEmailErr'] = 'This email does not belong to a registered user. Please register.';
                }
            }
        }

        // control login password
        if (empty(trim($_POST['password']))) {
            $loginErr['loginPasswordErr'] = 'Email or password is incorrect';
        } else {
            $loginPassword = cleanInput($_POST['password']);

            if (empty($loginErr['loginEmailErr'])) {
                $singleUserData = getSingleUserInfo($conn, $loginEmail);

                if (count($singleUserData) > 0) {
                    $passwordVerify = password_verify($loginPassword, $singleUserData['password']);

                    if (!$passwordVerify) {
                        $loginErr['loginPasswordErr'] = 'Email or password is incorrect';
                    }
                } else {
                    $loginErr['loginPasswordErr'] = 'Email or password is incorrect';
                }
            }
        }

        if (count($loginErr) <= 0) {
            $_SESSION['fullname'] = $singleUserData['fullname'];
            $_SESSION['email'] = $singleUserData['email'];
            $_SESSION['user_id'] = $singleUserData['id'];
 
            header('Location: index.php');
        }

    }

?>

<?php require './view/login-main-form.php'; ?>

</body>
</html>

<?php $conn = null; ?>