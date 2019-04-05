<?php
/* This file diplays activities that falls under the category, specified in the query */

session_start();

require_once("include/functions/_functions.php");
require_once("include/templates/_meta.php");
require_once("include/templates/_header.php");
require_once("include/templates/_activity_short.php");
require_once("include/templates/_footer.php");
require_once("include/values/_values.php");

// _functions.php file
if (!isSessionExists()) {
    die(header("Location: login.php"));
}

// Display 404 page, if category was not set in the query
if (!isset($_GET["category"])) {
    http_response_code(404);
    include('include/_404.php');
    die();
}

$activityCategory = "";

// Validate activity category against the predefined category list (_functions.php and _values.php)
if (findActivityCategoryCode($GLOBALS["allCategories"], $_GET["category"]) != "") {
    $activityCategory = $_GET["category"]; // Will be properly escaped where HTML content is generated (_meta.php and _activity_short.php)
    echo generateMetaTags("$activityCategory | Calgary Travel Advisor");
    echo generateHeader($_SESSION['customerFirstName']);
} else {
    http_response_code(404);
    include('include/_404.php');
    die();
}

echo generateShortActivitiesDescription($activityCategory); // _activity_short.php
echo generateFooter(); // _footer.php
?>