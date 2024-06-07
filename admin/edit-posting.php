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

    $jobId = $_GET['id'];
    if (empty($jobId)) {
        header("Location: postings.php");
        exit();
    }

    $getSinglePostingValues = getSinglePostingById($conn, $jobId);
    
    if (count($getSinglePostingValues) <= 0) {
        header("Location: postings.php");
        exit();
    }
?>

<?php require 'edit-posting-form.php'; ?>

</body>
</html>

<?php $conn = null; ?>