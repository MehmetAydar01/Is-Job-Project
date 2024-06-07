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
    if (!(session('admin_username') && session('admin_email') && session('is_role') == "admin")) {
        header("Location: admin-login.php");
        exit();
    }

?>

<?php
    $userId = $_GET['id'];
    $fullname = $email = $city = $password = '';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        
        $fullname = ucwords(cleanInput($_GET['fullname']));
        $email = cleanInput($_GET['email']);
        $city = ucfirst(cleanInput($_GET['city']));
        $password = password_hash(cleanInput($_GET['password']), PASSWORD_DEFAULT);

        if (!empty($fullname) && !empty($email) && !empty($password)) {
            if(editUser($conn, $userId, $fullname, $email, $city, $password)) {
                header("Location: users.php");
            } else {
                header("Location: edit-user.php?id=$userId");
            }
        } else {
            header("Location: edit-user.php?id=$userId");
        }
        
    }

?>

<?php $conn = null; ?>