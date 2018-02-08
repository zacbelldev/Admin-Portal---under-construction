<?php

//Accounts controller

//get or create the session
session_start();


// Get the database connection file
require_once '../library/connections.php';
// Get the accounts model
require_once '../model/accounts-model.php';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        header('location: /');
        exit;
    }
}

switch ($action) {
    case 'register':
        // Filter and store the data
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $userLevel = filter_input(INPUT_POST, 'userLevel', FILTER_SANITIZE_STRING);
        $email = checkEmail($email);
        $checkPassword = checkPassword($password);

        $existingEmail = checkExistingEmail($email);

        // check for an existing email in the database
        if ($existingEmail) {
            $message = '<p>That email is already in the system. Login instead.</p>';
            include '../view/admin/login.php';
            exit;
        }

        // Check for missing data
        if (empty($firstname) || empty($lastname) || empty($email) || empty($checkPassword) || empty($userLevel)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/settings/main.php';
        } else {
            // Hash the checked password
            $password = password_hash($password, PASSWORD_DEFAULT);
            // Send the data to the model
            $regOutcome = newUser($firstname, $lastname, $email, $password, $userLevel);
            // Check and report the result
            if ($regOutcome === 1) {

                $message = "<p>Thanks for registering $firstname. Please use your email and password to login.</p>";
                include '../view/admin/login.php';
                exit;
            } else {
                $message = "<p>Sorry $firstname, but the registration failed. Please try again.</p>";
                include '../view/settings/main.php';
            }
        }
        break;
    case 'login':
        $username = filter_input(INPUT_POST, 'username');
//        $email = checkEmail($email);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $passwordCheck = checkPassword($password);

        // Run basic checks, return if errors
        if (empty($username) || empty($passwordCheck)) {
            $userError = 'Please provide a valid email address and password';
            include '../view/admin/login.php';
            exit;
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($username);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($password, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $userError = 'Please check your password and try again.';
            include '../view/admin/login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;

//        setcookie('firstname', $clientData['clientFirstname'], strtotime('+1 year'), '/');
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;

        if(isset($_SESSION['clientData'])) {
            $clientId = $_SESSION['clientData']['clientId'];
//            $reviewInfo = getAdminReviews($clientId); //function call to model
//            $clientReviews = buildAdminReviews($reviewInfo);
        }


//        include '../view/dash/home.php';
        header('location: /');
        exit;

        break;

    case 'logout':
        session_destroy();
        header('location: /accounts/index.php?action=login');
        exit;

        break;

    case 'accountUpdatePage':
        $clientId = $_SESSION['clientData']['clientId'];
        $firstname = $_SESSION['clientData']['clientFirstname'];
        $lastname = $_SESSION['clientData']['clientLastname'];
        $username = $_SESSION['clientData']['clientUsername'];
        include '../view/settings/main.php';
        exit;

        break;

    case 'accountUpdate':
        $email = $_SESSION['clientData']['clientEmail'];
        // Filter and store the data
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        $UpdateFirstname = filter_input(INPUT_POST, 'UpdateFirstname', FILTER_SANITIZE_STRING);
        $UpdateLastname = filter_input(INPUT_POST, 'UpdateLastname', FILTER_SANITIZE_STRING);
        $UpdateEmail = filter_input(INPUT_POST, 'UpdateEmail', FILTER_SANITIZE_EMAIL);
        $UpdateEmail = checkEmail($UpdateEmail);

        if ($UpdateEmail != $email) {
            $existingEmail = checkExistingEmail($UpdateEmail);

            // check for an existing email in the database
            if ($existingEmail) {
                $message = '<p>That email is already in the system. Login instead.</p>';
                include '../view/admin/login.php';
                exit;
            }
        }
        // Check for missing data
        if (empty($UpdateFirstname) || empty($UpdateLastname) || empty($UpdateEmail)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/settings/main.php';
        } else {
            // Send the data to the model
            $accountUpdate = accountUpdate($clientId, $UpdateFirstname, $UpdateLastname, $UpdateEmail);
            // Check and report the result
            if ($accountUpdate === 1) {
                $message = "<p class='notify'>Congratulations, $UpdateFirstname. Your account was successfully updated.</p>";
                $_SESSION['message'] = $message;
                $clientData = getUpdatedClient($clientId);

//                setcookie('firstname', $clientData['clientFirstname'], strtotime('+1 year'), '/');
                // Remove the password from the array
                // the array_pop function removes the last
                // element from an array
                array_pop($clientData);
                // Store the array into the session
                $_SESSION['clientData'] = $clientData;
                include '../view/settings/main.php';
                exit;
            } else {
                $message = "<p>Sorry $UpdateFirstname, but the update failed. Please try again.</p>";
                include '../view/settings/main.php';
                exit;
            }
        }
        break;

    case 'changePassword':
        // Filter and store the data
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        $changePassword = filter_input(INPUT_POST, 'changePassword', FILTER_SANITIZE_STRING);
        $checkPassword = checkPassword($changePassword);

        // Check for missing data
        if (empty($changePassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/settings/main.php';
        } else {
            // Hash the checked password
            $changePassword = password_hash($changePassword, PASSWORD_DEFAULT);
            // Send the data to the model
            $changePasswordOutcome = changePassword($clientId, $changePassword);
            // Check and report the result
            if ($changePasswordOutcome === 1) {
                $message = "<p class='notify'>Congratulations, your password was changed.</p>";
                $_SESSION['message'] = $message;
                include '../view/settings/main.php';
                exit;
            } else {
                $message = "<p>Sorry, but the change failed. Please try again.</p>";
                include '../view/settings/main.php';
                exit;
            }
        }
        break;
}