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

<!-- Find Postings -->
<?php
    // Filter Jobs Postings
    $titleKey = $location = "";
    $findJobPostingByKeys = [];
    $hasKeys = false;

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $titleKey = cleanInput($_GET['titlekey'] ?? '');
        $location = cleanInput($_GET['location'] ?? '');

        if (empty($titleKey) && empty($location)) {
            $hasKeys = false;
        } else {
            $hasKeys = true;
            $findJobPostingByKeys = findJobPostingByKeys($conn, $titleKey, $location);
        }
    }
?>

<!-- Head -->
<?php require_once './public/head.php'; ?>

<!-- Navbar -->
<?php require './view/navbar.php'; ?>

<!-- Article -->
<?php require './view/article.php'; ?>

<!-- Job Postings Lists -->
<?php require './view/all-job-postings.php'; ?>
    
</body>
</html>

<?php $conn = null; ?>