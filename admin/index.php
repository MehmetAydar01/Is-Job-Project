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

    <div class="container">
        <h1 class="admin-title">Admin Home Page</h1>
        <div class="admin-links">
            <a href="users.php"><i class="fa-solid fa-users"></i> Users</a>
            <a href="postings.php"><i class="fa-solid fa-briefcase"></i> Postings</a>
            <a href="admin-logout.php" class="admin-logout-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>    
    </div>

</body>
</html>

<?php $conn = null; ?>