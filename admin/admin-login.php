<?php
    // Session Start
    session_start();

    // helpers
    require '../helpers/helper-functions.php';

    // DB Connection
    require '../db/connection.php';

    // Functions
    require './admin-functions.php';

    // if session values ​​exist redirect to home page
    if (session('admin_username') && session('admin_email') && session('is_role') == "admin") {
        header("Location: index.php");
        exit();
    }
?>

<?php require 'head.php'; ?>


<?php
    $adminEmail = $adminPassword = '';
    $adminEmailErr = $adminPasswordErr = '';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $adminEmail = cleanInput($_POST['email']);
        $adminPassword = cleanInput($_POST['password']);

        if (empty($adminEmail) || !filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
            $adminEmailErr = 'Please enter a valid email address';
        } else {  
            if (!hasAdminUserEmail($conn, $adminEmail)) {
                $adminEmailErr = 'Your role must be admin';
            }
        }
        
        if (empty($adminPassword)) {
            $adminPasswordErr = 'Email or password is incorrect';
        } else {

            if (empty($adminEmailErr)) {
                $getAdminData = getAdminUserInfo($conn, $adminEmail);

                if (count($getAdminData) > 0) {
                    if ($adminPassword != $getAdminData['password']) {
                        $adminPasswordErr = 'Email or password is incorrect';
                    }
                } else {
                    $adminPasswordErr = 'Email or password is incorrect';
                }
            }
        }

        if (empty($adminEmailErr) && empty($adminPasswordErr)) {
            $_SESSION['admin_username'] = $getAdminData['username'];
            $_SESSION['admin_email'] = $getAdminData['email'];
            $_SESSION['is_role'] = $getAdminData['is_role'];
 
            header('Location: index.php');
        }
    }
?>

<?php require 'admin-login-form.php'; ?>

</body>
</html>

<?php $conn = null; ?>