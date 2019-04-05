<?php
/* This file contains login logic */

session_start();

require_once("include/functions/_dbfunctions.php");

$_SESSION['loginError'] = ""; // To store error messages
$clean = array(); // To store valid (clean) username and password

// Check if username and password are submitted and not empty
if (!isset($_POST['username'], $_POST['password']) || empty($_POST['username']) || empty($_POST['password'])) {
    $_SESSION['loginError'] = "You should enter both username and password";
    die(header('Location: login.php'));
}

// Validate username - same regex pattern as during registration:
// Starts with a letter, can contain letters and digits only, should be between 6 and 30 characters
if (!preg_match("/^[A-Za-z][A-Za-z0-9]{5,29}$/", trim($_POST["username"]))) {
    $_SESSION['loginError'] .= "Username is invalid. ";
} else {
    $clean['username'] = trim($_POST["username"]);
}

// Validate password - same regex pattern as during registration:
// Letters, digits and indicated special characters. Should be between 8 and 50 characters
if (!preg_match("/^[A-Za-z0-9=.*[@#\-_$%^&+=§!\]]{8,50}$/", trim($_POST["password"]))) {
    $_SESSION['loginError'] .= "Password is invalid.";
} else {
    $clean['password'] = trim($_POST["password"]);
}

// If either username or password supplied are invalid
if ($_SESSION['loginError'] != "") {
    die(header('Location: login.php'));
}

$conn = openDatabaseConnection(); // _dbfunctions.php

$customerID = "";

if ($conn) {
    // Match username and password against the database
    $customerID = checkPassword($clean['username'], $clean['password'], $conn);
} else {
    $_SESSION['loginError'] = "Sorry, we cannot perform this operation now. Try again later";
    die(header('Location: login.php'));
}

// If success
if ($customerID) {
    $_SESSION['username'] = $clean['username'];
    $_SESSION['customerID'] = $customerID;

    // Get customer first name for the welcome message and store it as a session variable
    $customer = retrieveCustomerByID($_SESSION['customerID'], $conn);
    $_SESSION['customerFirstName'] = $customer['customer_forename'];
    header('Location: index.php');
} else {
    $_SESSION['loginError'] = "Username and/or password are not correct. Please try again";
    die(header('Location: login.php'));
}

closeDatabaseConnection($conn);
?>