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
    $jobId = $_GET['id'];
    $title = $description = $salary = $tags = $company = $city = $email = $requirements = $benefits = $address = $phone = '';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        $title = ucwords(cleanInput($_GET['title']));
        $description = cleanInput($_GET['description']);
        $salary = cleanInput($_GET['salary']);
        $tags = cleanInput($_GET['tags']);
        $company = cleanInput($_GET['company']);
        $city = ucfirst(cleanInput($_GET['city']));
        $email = cleanInput($_GET['email']);
        $requirements = cleanInput($_GET['requirements']);
        $benefits = cleanInput($_GET['benefits']);
        $address = cleanInput($_GET['address']);
        $phone = cleanInput($_GET['phone']);

        
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: edit-posting.php?id=$jobId");
            exit;
        }

        if (!empty($title) || !empty($description) || !empty($salary) || !empty($tags) || !empty($company) || !empty($city)) {
            if(editPosting($conn, $jobId, $title, $description, $salary, $tags, $company, $city, $email, $requirements, $benefits, $address, $phone)) {
                header("Location: postings.php");
            } else {
                header("Location: edit-posting.php?id=$jobId");
            }
        } else {
            header("Location: edit-posting.php?id=$jobId");
        }
    
    }

?>

<?php $conn = null; ?>