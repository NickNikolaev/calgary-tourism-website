<?php
/* This file validates booking activity and displays confirmation on success */

session_start();

require_once("include/functions/_functions.php");

// _functions.php file
if (!isSessionExists()) {
    die(header("Location: login.php"));
}

require_once("include/functions/_dbfunctions.php");
require_once("include/templates/_meta.php");

$cleanBooking = array(); // define empty array for valid data
$_SESSION["bookingError"] = array(); // define empty array for errors

// Validate activity ID field
if (!isset($_POST["activityID"]) || !filter_var($_POST["activityID"], FILTER_VALIDATE_INT)) {
    // activityID is a hidden input
    // In our case, when it is not set it is unlikely to be user's failure (probably tampering)
    // Therefore provide just a generic error message and stop the script
    echo "<p>We cannot process your request right now. Please, try again later</p>";
    echo "<p><a href='index.php'>Return to the home page</a></p>";
    die();
}

$cleanBooking["activityID"] = $_POST["activityID"]; // Valid if passed previous filter

// Validate number of tickets field
if (!isset($_POST["numberOfTickets"]) || !filter_var($_POST["numberOfTickets"], FILTER_VALIDATE_INT)) {
    $_SESSION["bookingError"][] = "Number of tickets is required";
} elseif ($_POST["numberOfTickets"] < 1) {
    $_SESSION["bookingError"][] = "Minumum number of tickets is 1";
}

// Validate date of activity field
if (!isset($_POST["dateOfActivity"]) || $_POST["dateOfActivity"] == "") {
    $_SESSION["bookingError"][] = "Date of activity is required";
} else {
    $date = date_parse($_POST["dateOfActivity"]);
    
    // Error if format is not correct
    if (!checkdate($date['month'], $date['day'], $date['year'])) {
        $_SESSION["bookingError"][] = "Date is not valid";
    } elseif (date("Y-m-d") > $_POST["dateOfActivity"]) {
        // Can't select passed dates
        $_SESSION["bookingError"][] = "Sorry, this date can't be booked. Please select later date";
    }
}

// Return back to the activity page if form values are not valid
if (count($_SESSION["bookingError"]) > 0) {
    die(header("Location: activity-information.php?id=" . $cleanBooking['activityID']));
}

// If everything is OK
echo generateMetaTags("Booking Confirmation | Calgary Travel Advisor");

// Valid if passed previous filters
$cleanBooking["customerID"] = $_SESSION['customerID'];
$cleanBooking["date_of_activity"] = $_POST["dateOfActivity"];
$cleanBooking["number_of_tickets"] = $_POST["numberOfTickets"];

$conn = openDatabaseConnection();

if (!$conn) {
    $_SESSION["bookingError"][] = "We are experiencing some technical difficulties. Please try again later";
    die(header("Location: activity-information.php?id=" . $cleanBooking['activityID']));
}

// Check if this activity was already booked by this customer
// Otherwise it won't allow to insert a new record, since database structure is simplified
// Only two fields are primary keys of the booked_activities table: activityID and customerID
$bookedActivity = retrieveBookedActivity($cleanBooking["activityID"], $cleanBooking["customerID"], $conn);

if ($bookedActivity) {
    $_SESSION["bookingError"][] = "Sorry, but you already booked this activity.
                                   Please give us a call if you want to change your booking";
    die(header("Location: activity-information.php?id=" . $cleanBooking['activityID']));
}

$activity = retrieveActivityById($cleanBooking["activityID"], $conn); // _dbfunctions.php
$customer = retrieveCustomerByID($cleanBooking["customerID"], $conn); // _dbfunctions.php

// If customer was found in the database
if ($customer) {
    $rowsAffected = insertBookedActivityRecord($cleanBooking, $conn); // _dbfunctions.php
    closeDatabaseConnection($conn); // _dbfunctions.php

    // If successfully inserter (booked)
    if ($rowsAffected == 1) {
        $escapedActivityName = htmlspecialchars($activity["activity_name"], ENT_QUOTES, "UTF-8");
        $escapedCustomerFirstName = htmlspecialchars($customer["customer_forename"], ENT_QUOTES, "UTF-8");
        $escapedCustomerLastName = htmlspecialchars($customer["customer_surname"], ENT_QUOTES, "UTF-8");
        $escapedDateOfActivity = htmlspecialchars($cleanBooking["date_of_activity"], ENT_QUOTES, "UTF-8");
        $escapedNumberOfTickets = htmlspecialchars($cleanBooking["number_of_tickets"], ENT_QUOTES, "UTF-8");
        
        echo <<<CONF
        <main>
            <div id="confirmation-wrapper">
            <div id="logo">
                <img src="../assets/images/logo.png" alt="Calgary Travel Advisor Logo" width="167" height="100" />
            </div>
            <h1>Booking confirmation</h1>  
            <p>Full name: $escapedCustomerFirstName $escapedCustomerLastName</p>
            <p>Activity: $escapedActivityName</p>
            <p>Date: $escapedDateOfActivity</p>
            <p>Number of tickets: $escapedNumberOfTickets</p>
            <div id="action-wrapper">
                <button onclick="window.print();">Print</button>
                <a href="index.php">To the Home Page</a>
            </div>
            </div>
        </main>
CONF;

    }
}
?>