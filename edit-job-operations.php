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

<!-- Edit Job Listing Operations -->

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $jobId = $_GET['id'];
        $editJobTitle = ucwords(cleanInput($_GET['title']));
        $editJobDescription = cleanInput($_GET['description']);
        $editJobSalary = cleanInput($_GET['salary']);
        $editJobTags = cleanInput($_GET['tags']);
        $editJobCompanyName = cleanInput($_GET['company']);
        $editJobCity = ucfirst(cleanInput($_GET['city']));
        $editJobEmail = cleanInput($_GET['email']);
        $editJobRequirements = cleanInput($_GET['requirements']);
        $editJobBenefits = cleanInput($_GET['benefits']);
        $editJobAddress = cleanInput($_GET['address']);
        $editJobPhone = (strlen(cleanInput($_GET['phone'])) < 20) ? cleanInput($_GET['phone']) : '';
        
        // Required Fields

        // control job title
        if (empty($editJobTitle) || strlen($editJobTitle) < 2 || strlen($editJobTitle) > 70) {
            $editJobErr['jobTitleErr'] = 'Title must be between 2 and 70 characters';
        }

        // control job description
        if (empty($editJobDescription) || strlen($editJobDescription) < 5) {
            $editJobErr['jobDescErr'] = 'Description cannot be empty';
        }

        // control job salary
        if (empty($editJobSalary)) {
            $editJobErr['jobSalaryErr'] = 'Salary cannot be empty';
        } else if (strlen($editJobSalary) >= 8) {
            $editJobErr['jobSalaryErr'] = 'Enter a realistic salary';
        }

        // control job tags
        if (empty($editJobTags) || strlen($editJobTags) < 4 || strlen($editJobTags) > 60) {
            $editJobErr['jobTagsErr'] = 'Tags must be between 4 and 60 characters';
        }

        // control company name
        if (empty($editJobCompanyName) || strlen($editJobCompanyName) < 3 || strlen($editJobCompanyName) > 60) {
            $editJobErr['jobCompanyErr'] = 'Company name must be between 3 and 60 characters';
        }

        // control job location city
        if (empty($editJobCity)) {
            $editJobErr['jobCityErr'] = 'City cannot be empty';
        }

        // control job email
        if (empty($editJobEmail)) {
            $editJobErr['jobEmailErr'] = 'Email cannot be empty';
        } else {
            if(!filter_var($editJobEmail, FILTER_VALIDATE_EMAIL)) {
                $editJobErr['jobEmailErr'] = 'Please enter a valid email address';
            }
        }

        if (count($editJobErr) > 0) {
            header("Location: edit-job.php?job_id=$jobId&mistake=".urlencode("incorrect input fields"));
            exit();
        }

        // If there is no error, edit the job posting.
        if(editJobPosting($conn, $jobId, $editJobTitle, $editJobDescription, $editJobSalary, $editJobTags, $editJobCompanyName, $editJobCity, $editJobEmail, $editJobRequirements, $editJobBenefits, $editJobAddress, $editJobPhone)) {
            header('Location: all-jobs-listings.php?listingUpdated='.urlencode($message['listing updated']));
        } else {
            header("Location: edit-job.php?job_id=$jobId&mistake=".urlencode("something went wrong"));
        }
    }
   
    
?>

<?php $conn = null; ?>