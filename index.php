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

    // Redirect to login page if session values ​​are not available
    if (!(session('fullname') && session('email'))) {
        header("Location: login.php");
        exit();
    }
    
?>

<!-- Head -->
<?php require_once './public/head.php'; ?>

<!-- Navbar -->
<?php require './view/navbar.php'; ?>

<!-- Home Page Header -->
<?php require './view/home-page-header.php'; ?>

<!-- Article -->
<?php require './view/article.php'; ?>

<!-- Home Page Job Postings -->
<?php require './view/home-page-job-postings.php'; ?>
    
</body>
</html>

<?php $conn = null; ?>