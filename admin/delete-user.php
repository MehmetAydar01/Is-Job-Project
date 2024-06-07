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

    if (empty($userId)) {
        header("Location: users.php");
        exit();
    }

    if(deleteUserById($conn, $userId)) {
        header("Location: users.php");
    } else {
        echo "something went wrong <br>";
    }
    
?>

<?php $conn = null; ?>