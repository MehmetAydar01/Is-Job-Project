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

<!-- Article -->
<?php require './view/article.php'; ?>


<?php

    $jobId = $_GET['job_id'] ?? '';

    if(empty($jobId) || !is_numeric($jobId)){
        header("Location: index.php");
        exit();
    }

    $jobPostingDetails = getSingleJobPosting($conn, $jobId);

    if (count($jobPostingDetails) <= 0) {
        header("Location: index.php");
        exit();
    }

    // Get Detail Job Posting
    require './view/job-posting-details.php';

?>

    
</body>
</html>

<?php $conn = null; ?>