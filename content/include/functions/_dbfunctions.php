<?php
/*
    This file contains functions that are used to retrieve data from the database
    or to insert data to the database.
*/

require_once(__DIR__ . "/../values/_values.php");
require_once("_functions.php");
require_once(__DIR__ . "/../values/_dbconn.php");


function openDatabaseConnection() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
    return $conn;
}


function closeDatabaseConnection($conn) {
    mysqli_close($conn);
}


function checkPassword($user, $password, $conn) {
    $result = "";
    $passHash = sha1($password);
    $sql = "SELECT customerID FROM customers WHERE username=? AND password_hash=?";

    $userEscaped = mysqli_real_escape_string($conn, $user); // Redundant

    if ($stmt = mysqli_prepare($conn, $sql)) {   
        mysqli_stmt_bind_param($stmt, "ss", $userEscaped, $passHash); 
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $customerID);

        if (mysqli_stmt_fetch($stmt)) {
            $result = $customerID;
        } else {
            $result = false;
        }

        mysqli_stmt_close($stmt);

        return $result;
    }
}


function isUserExists($username, $conn) {
    $result = "";

    $sql = "SELECT * FROM customers WHERE username=?";

    $escapedUsername = mysqli_real_escape_string($conn, $username); // seems redundant
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $escapedUsername);
        mysqli_stmt_execute($stmt);
        $queryResult = mysqli_stmt_get_result($stmt);

        if ($queryResult) {
            $customer = mysqli_fetch_assoc($queryResult);
            $rowcount = mysqli_num_rows($queryResult);
            mysqli_free_result($queryResult);
        }

        mysqli_stmt_close($stmt);
    
        if ($rowcount == 1) {
            $result = true;
        } else {
            $result = false;
        }
    }

    return $result;
}


function registerCustomer($cleanRegData, $conn) {
    $sql = "INSERT INTO customers (username, password_hash, customer_forename, customer_surname, 
            customer_postcode, customer_address1, customer_address2, date_of_birth) VALUES (?,?,?,?,?,?,?,?)";

    // Escape (seems redundant) (no need to escape password hash)   
    $escaped = array();
    $escaped["username"] = mysqli_real_escape_string($conn, $cleanRegData["username"]);
    $escaped["firstname"] = mysqli_real_escape_string($conn, $cleanRegData["firstname"]); 
    $escaped["lastname"] = mysqli_real_escape_string($conn, $cleanRegData["lastname"]); 
    $escaped["postalcode"] = mysqli_real_escape_string($conn, $cleanRegData["postalcode"]); 
    $escaped["address1"] = mysqli_real_escape_string($conn, $cleanRegData["address1"]); 
    $escaped["address2"] = mysqli_real_escape_string($conn, $cleanRegData["address2"]); 
    $escaped["birthdate"] = mysqli_real_escape_string($conn, $cleanRegData["birthdate"]); 

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssssss", $escaped["username"], $cleanRegData["passwordhash"],
        $escaped["firstname"], $escaped["lastname"], $escaped["postalcode"],
        $escaped["address1"], $escaped["address2"], $escaped["birthdate"]);

        mysqli_stmt_execute($stmt);

        $insertId = mysqli_insert_id($conn);

        /* close statement */
        mysqli_stmt_close($stmt);

        return $insertId;
    } else {
        return -1;
    }
}


function retrieveActivitiesByCategory($activityCategory, $conn) {
    $activities = array();

    // allCategories array is from _values.php file
    $categoryCode = findActivityCategoryCode($GLOBALS["allCategories"], $activityCategory);

    if ($categoryCode == 0) {
        return false;
    } else {
        $categoryCode .= '%'; // append wildcard
        $sql = "SELECT * FROM activities WHERE activityID LIKE ?";
    }

    // Escape (seems redundant)
    $escapedCategoryCode = mysqli_real_escape_string($conn, $categoryCode);
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $escapedCategoryCode);
        mysqli_stmt_execute($stmt);
        $queryResult = mysqli_stmt_get_result($stmt);
        
        if ($queryResult) {
            while ($currentRow = mysqli_fetch_assoc($queryResult)) {
                array_push($activities, $currentRow);
            }
    
            mysqli_free_result($queryResult);
        }

        mysqli_stmt_close($stmt);
    }

    return $activities;
}


function retrieveActivityById($activityID, $conn) {
    $activity = false;

    $sql = "SELECT * FROM activities WHERE activityID=?";

    // Escape (seems redundant)
    $escapedActivityID = mysqli_real_escape_string($conn, $activityID);
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $escapedActivityID);
        mysqli_stmt_execute($stmt);
        $queryResult = mysqli_stmt_get_result($stmt);

        if ($queryResult) {
            $activity = mysqli_fetch_assoc($queryResult);
            mysqli_free_result($queryResult);
        }

        mysqli_stmt_close($stmt);
    }

    return $activity;
}


function retrieveActivitiesBySearchQuery($sql, $criteria, $conn) {
    $activities = array();
    
    // Depends on how many search criteria were specified: one or two
    if ($stmt = mysqli_prepare($conn, $sql)) {
        switch (count($criteria)) {
            case 1: 
                $escapedCriteria0 = mysqli_real_escape_string($conn, $criteria[0]); // seems redundant
                mysqli_stmt_bind_param($stmt, "s", $escapedCriteria0);
                break;
            case 2:
                $escapedCriteria0 = mysqli_real_escape_string($conn, $criteria[0]); // seems redundant
                $escapedCriteria1 = mysqli_real_escape_string($conn, $criteria[1]); // seems redundant    
                mysqli_stmt_bind_param($stmt, "ss", $escapedCriteria0, $escapedCriteria1);
                break;
            default:
                return array();
        }

        mysqli_stmt_execute($stmt);
        $queryResult = mysqli_stmt_get_result($stmt);
        
        if ($queryResult) {
            while ($currentRow = mysqli_fetch_assoc($queryResult)) {
                array_push($activities, $currentRow);
            }
    
            mysqli_free_result($queryResult);
        }

        mysqli_stmt_close($stmt);
    }

    return $activities;
}


function retrieveCustomerByID($customerID, $conn) {
    $customer = "";

    $sql = "SELECT * FROM customers WHERE customerID=?";

    $escapedCustomerID = mysqli_real_escape_string($conn, $customerID); // seems redundant

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $escapedCustomerID);
        mysqli_stmt_execute($stmt);
        $queryResult = mysqli_stmt_get_result($stmt);

        if ($queryResult) {
            $customer = mysqli_fetch_assoc($queryResult);
            mysqli_free_result($queryResult);
        }

        mysqli_stmt_close($stmt);
    }

    return $customer;
}

function retrieveBookedActivity($activityID, $customerID, $conn) {
    $bookedActivity = "";

    $sql = "SELECT * FROM booked_activities WHERE activityID=? AND customerID=?";

    $escapedActivityID = mysqli_real_escape_string($conn, $activityID); // seems redundant
    $escapedCustomerID = mysqli_real_escape_string($conn, $customerID); // seems redundant

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ii", $escapedActivityID, $escapedCustomerID);
        mysqli_stmt_execute($stmt);
        $queryResult = mysqli_stmt_get_result($stmt);

        if ($queryResult) {
            $bookedActivity = mysqli_fetch_assoc($queryResult);
            mysqli_free_result($queryResult);
        }

        mysqli_stmt_close($stmt);
    }

    return $bookedActivity;
}


function insertBookedActivityRecord($bookingRecord, $conn) {
    $sql = "INSERT INTO booked_activities (activityID, customerID, date_of_activity, 
            number_of_tickets) VALUES (?,?,?,?)";
    
    // Escape (seems redundant) (no need to escape password hash)   
    $escaped = array();
    $escaped["activityID"] = mysqli_real_escape_string($conn, $bookingRecord["activityID"]);
    $escaped["customerID"] = mysqli_real_escape_string($conn, $bookingRecord["customerID"]);
    $escaped["date_of_activity"] = mysqli_real_escape_string($conn, $bookingRecord["date_of_activity"]);
    $escaped["number_of_tickets"] = mysqli_real_escape_string($conn, $bookingRecord["number_of_tickets"]);

    if ($stmt = mysqli_prepare($conn, $sql)) {
        
        mysqli_stmt_bind_param($stmt, "iisi", $escaped["activityID"], $escaped["customerID"],
        $escaped["date_of_activity"], $escaped["number_of_tickets"]);

        mysqli_stmt_execute($stmt);

        $rowsAffected = mysqli_stmt_affected_rows($stmt);

        /* close statement */
        mysqli_stmt_close($stmt);

        return $rowsAffected;
    } else {
        return false;
    }
}

?>