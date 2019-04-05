<?php
/* This file is a signup page */

session_start();

require_once("include/functions/_functions.php");
require_once("include/templates/_meta.php");

// Redirect to the home page if already logged in
if (isSessionExists()) {
    die(header("Location: index.php"));
}

echo generateMetaTags("Signup | Calgary Travel Advisor");
require_once("include/templates/_signup_form.php"); // Display resigtration form
?>

