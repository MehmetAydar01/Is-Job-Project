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

<?php require 'head.php'; ?>

<?php

    $userId = $_GET['id'];
    if (empty($userId)) {
        header("Location: users.php");
        exit();
    }

    $getSingleUserValues = getSingleUserById($conn, $userId);

    if (count($getSingleUserValues) <= 0) {
        header("Location: users.php");
        exit();
    }
    
?>

<?php require 'edit-user-form.php'; ?>

</body>
</html>

<?php $conn = null; ?>