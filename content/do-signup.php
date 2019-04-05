<?php
/* This file contains user registration logic */

session_start();

require_once("include/functions/_dbfunctions.php");

$_SESSION["signupErrors"] = array(); // To store errors

$requiredFields = array(
    "username", "password", "confirm-password", "firstname", "lastname",
    "birthdate", "address1", "postalcode"
);

$clean = array(); // To store filtered input

// To store posted values
// so we can send them back to the user to save their typing efforts (if form was invalid)
$_SESSION["posted"] = array();

// Check that all required fields were submitted
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        $_SESSION["signupErrors"][$field] = "Required";
    } else {
        // If exists and not empty (may or may not be valid at this point)
        $_SESSION["posted"][$field] = $_POST[$field];
    }
}

// Check if address2 was filled ('not required' field) and add it to the posted array
if (isset($_POST["address2"])) {
    $_SESSION["posted"]["address2"] = $_POST["address2"];
}

// Redirect back right away if any of the required fields is missing
if (count($_SESSION["signupErrors"]) > 0) {
    die(header("Location: signup.php"));
}

// Validate username against regex: 6-30 characters (uppercase, lowercase and digits are allowed)
// Must start with a letter
if (!preg_match("/^[A-Za-z][A-Za-z0-9]{5,29}$/", trim($_POST["username"]))) {
    $_SESSION["signupErrors"]["username"] = "Username should be 6-30 characters long, must start with a letter,
      and can include lower- and uppercase letters and digits";
}

// Validate password against regex: 8-50 characters (letters, digits and indicated special characters)
if (!preg_match("/^[A-Za-z0-9=.*[@#\-_$%^&+=§!\]]{8,50}$/", trim($_POST["password"])) &&
    !preg_match("/^[A-Za-z0-9=.*[@#\-_$%^&+=§!\]]{8,50}$/", trim($_POST["confirm-password"]))) {
    $_SESSION["signupErrors"]["password"] = "Password should be between 8-50 charactes long";
}

// Validate first name against regex: can include letters, hyphens, apostophe (in a second position), and spaces
if (!preg_match("/^[A-Za-z]'?[- A-Za-z]{0,254}$/", trim($_POST["firstname"]))) {
    $_SESSION["signupErrors"]["firstname"] = "First name can include letters, hyphens, an apostophe, and spaces only";
}

// Validate last name (same as first name)
if (!preg_match("/^[A-Za-z]'?[- A-Za-z]{0,254}$/", trim($_POST["lastname"]))) {
    $_SESSION["signupErrors"]["lastname"] = "Last name can include letters, hyphens, an apostophe, and spaces only";
}

// Validate birth date - should be in YYYY-MM-DD format and at least 18 years before now (to reflect minimum age)
$date = date_parse($_POST["birthdate"]);

if (!checkdate($date['month'], $date['day'], $date['year'])) {
    $_SESSION["signupErrors"]["birthdate"] = "Birth date must be in YYYY-MM-DD format";
} elseif (date("Y-m-d", strtotime("-18 year", time())) < $_POST["birthdate"]) {
    $_SESSION["signupErrors"]["birthdate"] = "You should be at least 18 years old to sign up";
}

// Validate address line 1 (can have digits, letters, hyphens, commas, and spaces)
if (!preg_match("/^[A-Za-z0-9-, ]{1,255}$/", trim($_POST["address1"]))) {
    $_SESSION["signupErrors"]["address1"] = "Address line 1 can only include digits, letters, hyphens, and spaces";
}

// Validate address line 2 (check if it exist first because it is an optional field)
if (isset($_POST["address2"]) && trim($_POST["address2"] != "")) {
    if (!preg_match("/^[A-Za-z0-9-, ]{1,255}$/", trim($_POST["address2"]))) {
        $_SESSION["signupErrors"]["address2"] = "Address line 2 can only include digits, letters, hyphens, and spaces";
    }
}

// Validate postal code (can have digits, letters, spaces, and hyphens)
if (!preg_match("/^[A-Za-z0-9 -]{1,255}$/", trim($_POST["postalcode"]))) {
    $_SESSION["signupErrors"]["postalcode"] = "Postal code can only include digits, letters, spaces, and hyphens";
}

// Stop page script execution if any errors were found
if (count($_SESSION["signupErrors"]) > 0) {
    die(header("Location: signup.php"));
}

// Now open connection to the database
$conn = openDatabaseConnection();

if (!$conn) {
    $_SESSION["signupErrors"]["username"] = "We are experiencing some technical difficulties. Please try again later";
    die(header("Location: signup.php"));
} 

$clean["username"] = trim($_POST["username"]);

// Check if username already exists in the database
if (isUserExists($clean["username"], $conn)) {
    $_SESSION["signupErrors"][] = "A user with this username already exists";
    die(header("Location: signup.php"));
}

// Compare passwords
if (trim($_POST["password"]) != trim($_POST["confirm-password"])) {
    $_SESSION["signupErrors"]["confirm-password"] = "Passwords don't match";
    die(header("Location: signup.php"));
}

$pwd = sha1(trim($_POST["password"]));
$clean["passwordhash"] = $pwd;
$clean["firstname"] = trim(ucfirst($_POST["firstname"]));
$clean["lastname"] = trim(ucfirst($_POST["lastname"]));
$clean["birthdate"] = trim($_POST["birthdate"]);
$clean["address1"] = trim($_POST["address1"]);

// Add address2 to the clean array only if it was set (it was validated before)
if (isset($_POST["address2"])) {
    $clean["address2"] = trim($_POST["address2"]);
}
  
$clean["postalcode"] = trim($_POST["postalcode"]);

// Insert records in the database and redirect to index.php on success
$customerID = registerCustomer($clean, $conn);

// If there were NO error
if ($customerID != -1) {
    $_SESSION["username"] = $clean["username"];
    $_SESSION["customerID"] = $customerID;

    // Get customer first name for the welcome message and store it as a session variable
    $customer = retrieveCustomerByID($customerID, $conn);
    $_SESSION["customerFirstName"] = $customer["customer_forename"];
    header("Location: index.php");
} else {
    header("Location: signup.php");
}

closeDatabaseConnection($conn);
?>