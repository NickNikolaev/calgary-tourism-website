<?php
/* This file displays detailed information about the queried activity */

session_start();

require_once("include/functions/_functions.php");
require_once("include/functions/_dbfunctions.php");
require_once("include/values/_values.php");
require_once("include/templates/_meta.php");
require_once("include/templates/_header.php");
require_once("include/templates/_footer.php");
require_once("include/templates/_activity_long.php");

// _functions.php file
if (!isSessionExists()) {
    die(header("Location: login.php"));
}

// Validation logic
// Error if activity ID is not specidied in the query or if it is not an integer value
if (!isset($_GET["id"]) || !filter_var($_GET["id"], FILTER_VALIDATE_INT)) {
    http_response_code(404);
    include('include/_404.php');
    die();
}

$activityID = $_GET["id"];
    
$conn = openDatabaseConnection();

if ($conn) {
    $activity = retrieveActivityById($activityID, $conn);
    closeDatabaseConnection($conn);
} else {
    echo generateMetaTags("Error | Calgary Travel Advisor");
    echo generateHeader($_SESSION['customerFirstName']);
    echo "<main><h1>We are experiencing some technical difficulties. Please try again later</h1></main></body></html>";
    die();
}

// Check if activity with the specified ID was found in the database
if ($activity) {
    $activityName = $activity['activity_name'];
    echo generateMetaTags("$activityName | Calgary Travel Advisor"); // $activityName escaped in _meta.php file
    echo generateHeader($_SESSION['customerFirstName']); // Variable passed is escaped in _header.php file
    echo generateLongActivityDescription($activity); // _activity_long.php file
    echo generateFooter();
} else {
    http_response_code(404);
    include('include/_404.php');
    die();
}
?>