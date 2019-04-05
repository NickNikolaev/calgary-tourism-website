<?php
/* This page contains simple search logic */

session_start();

require_once("include/functions/_functions.php");
require_once("include/functions/_dbfunctions.php");
require_once("include/templates/_meta.php");
require_once("include/templates/_header.php");
require_once("include/templates/_footer.php");
require_once("include/templates/_search_results.php");

// _functions.php file
if (!isSessionExists()) {
    die(header("Location: login.php"));
}

echo generateMetaTags("Search | Calgary Travel Advisor"); // _meta.php file
echo generateHeader($_SESSION['customerFirstName']); // _header.php file

// Make sure search parameter is provided
if (!isset($_GET["search"]) || empty(trim($_GET["search"]))) {
    echo "<main><h1>Please specify your search criteria</h1></main></body></html>";
    die();
}

// Sanitize search criteria
$cleanSearchCriteria = filter_var(trim($_GET["search"]), FILTER_SANITIZE_STRING);

// Make sure that search criteria does not become empty after sanitizing
if ($cleanSearchCriteria == "") {
    echo "<main><h1>Please specify your search criteria</h1></main></body></html>";
    die();
}

$criteria = array();
$criteria[] = '%' . $cleanSearchCriteria . '%';

$conn = openDatabaseConnection(); // _dbfunctions.php

// Stop script execution if there is no connection to the database
if (!$conn) {
    echo "<main><h1>We are experiencing some technical difficulties. Please try again later</h1></main></body></html>";
    die();
}

$escapedSearchParam = htmlspecialchars($cleanSearchCriteria, ENT_QUOTES, "UTF-8");

echo "<main>";
echo "<h1>Search results for '". $escapedSearchParam. "'</h1>";

// Try to search by activity_name field
$sql = "SELECT * FROM activities WHERE activity_name LIKE ?";
$searchResults = retrieveActivitiesBySearchQuery($sql, $criteria, $conn); // _dbfunctions.php

// Check if there are any results
if (count($searchResults) != 0) {
    echo generateSearchResults($searchResults);
} else {
    // Try to search in the description field instead
    $sql = "SELECT * FROM activities WHERE description LIKE ?";
    $searchResults = retrieveActivitiesBySearchQuery($sql, $criteria, $conn);

    // Check if something was found
    if (count($searchResults) > 0) {
        echo "<div class='activity-search-info'><p>No activity with matching name was found</p>";
        echo "<p>Closest matches:</p></div>";
        echo generateSearchResults($searchResults);
    } else {
        // if nothing was found even by the second query
        echo "<div class='activity-search-info'><p>No results found</p></div>";
    }
}

closeDatabaseConnection($conn); // _dbfunctions.php

echo "</main>";
echo generateFooter(); // _footer.php
?>
