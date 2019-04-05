<?php
/* This is a login page */

session_start();

require_once("include/functions/_functions.php");
require_once("include/templates/_meta.php");
require_once("include/templates/_login_form.php");

// Redirect to the home page if already logged in
if (isSessionExists()) {
    die(header("Location: index.php"));
}

$loginError = "";

// Check if there was a login attempt that resulted in error
if (array_key_exists("loginError", $_SESSION)) {
    $loginError = $_SESSION['loginError'];
    unset($_SESSION['loginError']);
}

echo generateMetaTags("Login | Calgary Travel Advisor"); // _meta.php file
// Generate login form (_login_form.php) and pass an error message (if exists)
echo displayLoginForm($loginError);
?>
