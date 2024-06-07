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


<!-- Create Job Post Operations -->
<?php
    // Get user id from session
    $userId = session('user_id') ?? 0;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // Required Fields

        // control job title
        if (empty(trim($_POST['title'])) || strlen(trim($_POST['title'])) < 2 || strlen(trim($_POST['title'])) > 70) {
            $jobErr['jobTitleErr'] = 'Title must be between 2 and 70 characters';
        } else {
            $jobTitle = ucwords(cleanInput($_POST['title']));
        }

        // control job description
        if (empty(trim($_POST['description']))) {
            $jobErr['jobDescErr'] = 'Description cannot be empty';
        } else {
            $jobDescription = cleanInput($_POST['description']);
        }

        // control job salary
        if (empty(trim($_POST['salary']))) {
            $jobErr['jobSalaryErr'] = 'Salary cannot be empty';
        } else if (strlen($_POST['salary']) >= 8) {
            $jobErr['jobSalaryErr'] = 'Enter a realistic salary';
        } else {
            $jobSalary = cleanInput($_POST['salary']);
        }

        // control job tags
        if (empty(trim($_POST['tags'])) || strlen(trim($_POST['tags'])) < 4 || strlen(trim($_POST['tags'])) > 60) {
            $jobErr['jobTagsErr'] = 'Tags must be between 4 and 60 characters';
        } else {
            $jobTags = cleanInput($_POST['tags']);
        }

        // control company name
        if (empty(trim($_POST['company'])) || strlen(trim($_POST['company'])) < 3 || strlen(trim($_POST['company'])) > 60) {
            $jobErr['jobCompanyErr'] = 'Company name must be between 3 and 60 characters';
        } else {
            $jobCompanyName = cleanInput($_POST['company']);
        }

        // control job location city
        if (empty(trim($_POST['city']))) {
            $jobErr['jobCityErr'] = 'City cannot be empty';
        } else {
            $jobCity = ucfirst(cleanInput($_POST['city']));
        }

        // control job email
        if (empty(trim($_POST['email']))) {
            $jobErr['jobEmailErr'] = 'Email cannot be empty';
        } else {
            $jobEmail = cleanInput($_POST['email']);

            if(!filter_var($jobEmail, FILTER_VALIDATE_EMAIL)) {
                $jobErr['jobEmailErr'] = 'Please enter a valid email address';
            }
        }

        // Non Required fields

        if (!empty(trim($_POST['requirements']))) {
            $jobRequirements = cleanInput($_POST['requirements']);
        }

        if (!empty(trim($_POST['benefits']))) {
            $jobBenefits = cleanInput($_POST['benefits']);
        }

        if (!empty(trim($_POST['address']))) {
            $jobAddress = cleanInput($_POST['address']);
        }

        if (!empty(trim($_POST['phone'])) || strlen($_POST['phone']) < 20) {
            $jobPhone = cleanInput($_POST['phone']);
        }

        // If there is no error, add the job posting.
        if (count($jobErr) <= 0) {
                
            if(addJobPosting($conn, $userId, $jobTitle, $jobDescription, $jobSalary, $jobTags, $jobCompanyName, $jobCity, $jobEmail, $jobRequirements, $jobBenefits, $jobAddress, $jobPhone)) {
                header('Location: all-jobs-listings.php?listingCreated='.urlencode($message['listing created']));
            }

        }
        
    }

?>

<!-- Create Job Form -->
<?php require './view/create-job-form.php'; ?>
 
</body>
</html>

<?php $conn = null; ?>