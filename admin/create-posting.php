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
    $userId = 0; // Admin ilan oluşturursa user_id otomatik olarak sıfır atanacak.
    $title = $description = $salary = $requirements = $benefits = $tags = $company = $address = $city = $phone = $email = '';
    $err = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = ucwords(cleanInput($_POST['title']));
        $description = cleanInput($_POST['description']);
        $salary = cleanInput($_POST['salary']);
        $requirements = cleanInput($_POST['requirements']);
        $benefits = cleanInput($_POST['benefits']);
        $tags = cleanInput($_POST['tags']);
        $company = cleanInput($_POST['company']);
        $address = cleanInput($_POST['address']);
        $city = ucfirst(cleanInput($_POST['city']));
        $phone = cleanInput($_POST['phone']);
        $email = cleanInput($_POST['email']);

        // control job email
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err['emailErr'] = 'Invalid email address';
        }

        if(empty($title) || empty($description) || empty($salary) || empty($tags) || empty($company) || empty($city)) {
            $err['fieldsError'] = 'Please fill in the required fields correctly.';
        }

        if (count($err) <= 0) {
          
            if (createPosting($conn, $userId, $title, $description, $salary, $tags, $company, $city, $email, $requirements, $benefits, $address, $phone)) {
                header("Location: postings.php");
            } else {
                $err['wrongErr'] = 'Something went wrong';
            }
        }
    }

?>

<?php require 'head.php'; ?>

<?php require 'create-posting-form.php'; ?>

</body>
</html>

<?php $conn = null; ?>