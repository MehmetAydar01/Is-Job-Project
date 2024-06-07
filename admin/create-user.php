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
    $fullname = $email = $city = $password = '';
    $err = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = ucwords(cleanInput($_POST['fullname']));
        $email = cleanInput($_POST['email']);
        $city = ucfirst(cleanInput($_POST['city']));
        $password = password_hash(cleanInput($_POST['password']), PASSWORD_DEFAULT);

        if (!empty($fullname) && !empty($email) && !empty($password)) {
            if(createUser($conn, $fullname, $email, $city, $password)) {
                header("Location: users.php");
            } else {
                $err = 'Something went wrong';
            }
        } else {
            $err = 'Please fill in the fullname, email and password fields.';
        }
        
    }

?>

<?php require 'head.php'; ?>

<?php require 'create-user-form.php'; ?>

</body>
</html>

<?php $conn = null; ?>