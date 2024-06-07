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

<!-- Delete Job Listing Operations -->

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $jobId = $_GET['id'];

        if (empty($jobId)) {
            header('Location: index.php');
            exit();
        }
             
        if (deleteJobPosting($conn, $jobId)) {
            header('Location: all-jobs-listings.php?listingDeleted='.urlencode($message['listing deleted']));
        } else {
            header("Location: all-jobs-listings.php?mistake=".urlencode("something went wrong"));
        }
    }
   
?>

<?php $conn = null; ?>