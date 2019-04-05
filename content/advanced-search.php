<?php
/* This file takes care of an advanced search logic */

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

echo generateMetaTags("Advanced Search | Calgary Travel Advisor"); // _meta.php file
echo generateHeader($_SESSION['customerFirstName']); // _header.php file

// Define an empty errors array
$searchErrors = array();

// Validate search params
$cleanParams = array();

// First set of fields
if (isset($_GET["field0"]) && $_GET["field0"] != "") {
    if (isFieldValid($_GET["field0"])) {
        $cleanParams["field0"] = $_GET["field0"];
        // If field is selected then operator and criteria must be selected too
        if (isset($_GET["oper0"]) && isOperatorValid($_GET["oper0"], $cleanParams["field0"])) {
            $cleanParams["oper0"] = $_GET["oper0"];
            // Validate criteria
            if (isset($_GET["crit0"]) && ($criteria = validateCriteria($_GET["crit0"], $cleanParams["field0"]))) {
                $cleanParams["crit0"] = $criteria;
            } else {
                $searchErrors[] = "First criteria is not valid";
            }
        } else {
            $searchErrors[] = "Operator for the first field is not valid";
        }
    } else {
        $searchErrors[] = "First field type is not valid";
    }
}

// Second set of fields (optional, also make sure first field was selected and valid)
if (isset($_GET["field1"]) && $_GET["field1"] != "" && isset($cleanParams["field0"])) {
    // If selected, we need to validate it
    if (isFieldValid($_GET["field1"])) {
        $cleanParams["field1"] = $_GET["field1"];
        // If field is selected and valid, then operator and criteria must be selected too
        if (isset($_GET["oper1"]) && isOperatorValid($_GET["oper1"], $cleanParams["field1"])) {
            $cleanParams["oper1"] = $_GET["oper1"];
            // Validate criteria
            if (isset($_GET["crit1"]) && ($criteria = validateCriteria($_GET["crit1"], $cleanParams["field1"]))) {
                $cleanParams["crit1"] = $criteria;
            } else {
                $searchErrors[] = "Second criteria is not valid";
            }
        } else {
            $searchErrors[] = "Operator for the second field is not valid";
        }
    } else {
        $searchErrors[] = "Second field type is not valid";
    }
} 

// If second set of field is used, then we need to make sure logical operator (AND/OR) is specified
if (array_key_exists("field1", $cleanParams)) {
    if (isset($_GET["logicalOper0"]) && isLogicalOperatorValid($_GET["logicalOper0"])) {
        $cleanParams["logicalOper0"] = $_GET["logicalOper0"];
    } else {
        $searchErrors[] = "You must use either AND or OR as a logical operator";
    }
}

?>

<!-- Display search form -->
<main>
    <div id="advanced-search-form">
        <form action="advanced-search.php" method="GET">
            <fieldset>
                <legend>Search parameters</legend>
                <div class="search-form-row">
                    <select name="field0">
                        <option value="">Select field...</option>
                        <option value="activity_name" 
                            <?php if (isset($cleanParams["field0"]) && $cleanParams["field0"] == "activity_name") echo "selected"; ?>>Name</option>
                        <option value="description" 
                            <?php if (isset($cleanParams["field0"]) && $cleanParams["field0"] == "description") echo "selected"; ?>>Description</option>
                        <option value="location" 
                            <?php if (isset($cleanParams["field0"]) && $cleanParams["field0"] == "location") echo "selected"; ?>>Location</option>
                        <option value="price" 
                            <?php if (isset($cleanParams["field0"]) && $cleanParams["field0"] == "price") echo "selected"; ?>>Price</option>
                    </select>
                    <select name="oper0">
                        <option value="">Select operator...</option>
                        <option value="like" 
                            <?php if (isset($cleanParams["oper0"]) && $cleanParams["oper0"] == "like") echo "selected"; ?>>Contains</option>
                        <option value="not like" 
                            <?php if (isset($cleanParams["oper0"]) && $cleanParams["oper0"] == "not like") echo "selected"; ?>>Does not contain</option>
                        <option value="=" 
                            <?php if (isset($cleanParams["oper0"]) && $cleanParams["oper0"] == "=") echo "selected"; ?>>Equal</option>
                        <option value="<" 
                            <?php if (isset($cleanParams["oper0"]) && $cleanParams["oper0"] == "<") echo "selected"; ?>>Less than</option>
                        <option value=">" 
                            <?php if (isset($cleanParams["oper0"]) && $cleanParams["oper0"] == ">") echo "selected"; ?>>More than</option>
                    </select>
                    <input type="text" name="crit0" placeholder="Criteria..." 
                        value="<?php if (isset($cleanParams["crit0"])) echo htmlspecialchars($cleanParams["crit0"], ENT_QUOTES, 'UTF-8')?>">
                </div>
                <div class="search-form-row">
                    <select name="logicalOper0">
                        <option value="">Select...</option>
                        <option value="and" 
                            <?php if (isset($cleanParams["logicalOper0"]) && $cleanParams["logicalOper0"] == "and") echo "selected"; ?>>AND</option>
                        <option value="or" 
                            <?php if (isset($cleanParams["logicalOper0"]) && $cleanParams["logicalOper0"] == "or") echo "selected"; ?>>OR</option>
                    </select>
                </div>
                <div class="search-form-row">
                    <select name="field1">
                        <option value="">Select field...</option>
                        <option value="activity_name" 
                            <?php if (isset($cleanParams["field1"]) && $cleanParams["field1"] == "activity_name") echo "selected"; ?>>Name</option>
                        <option value="description" 
                            <?php if (isset($cleanParams["field1"]) && $cleanParams["field1"] == "description") echo "selected"; ?>>Description</option>
                        <option value="location" 
                            <?php if (isset($cleanParams["field1"]) && $cleanParams["field1"] == "location") echo "selected"; ?>>Location</option>
                        <option value="price" 
                            <?php if (isset($cleanParams["field1"]) && $cleanParams["field1"] == "price") echo "selected"; ?>>Price</option>
                    </select>
                    <select name="oper1">
                        <option value="">Select operator...</option>
                        <option value="like" 
                            <?php if (isset($cleanParams["oper1"]) && $cleanParams["oper1"] == "like") echo "selected"; ?>>Contains</option>
                        <option value="not like" 
                            <?php if (isset($cleanParams["oper1"]) && $cleanParams["oper1"] == "not like") echo "selected"; ?>>Does not contain</option>
                        <option value="=" 
                            <?php if (isset($cleanParams["oper1"]) && $cleanParams["oper1"] == "=") echo "selected"; ?>>Equal</option>
                        <option value="<" 
                            <?php if (isset($cleanParams["oper1"]) && $cleanParams["oper1"] == "<") echo "selected"; ?>>Less than</option>
                        <option value=">" 
                            <?php if (isset($cleanParams["oper1"]) && $cleanParams["oper1"] == ">") echo "selected"; ?>>More than</option>
                    </select>
                    <input type="text" name="crit1" placeholder="Criteria..." 
                        value="<?php if (isset($cleanParams["crit1"])) echo htmlspecialchars($cleanParams["crit1"], ENT_QUOTES, 'UTF-8')?>">
                </div>
                <?php
                // Display errors if any
                if (count($searchErrors) > 0) {
                    echo "<div id='error-msg'>";
                    foreach ($searchErrors as $error) {
                        echo "<p>$error</p>";
                    }
                    echo "</div>";
                }
                ?>
                <button class="search-button">Search</button>
                <a href="advanced-search.php">Clear</a>
            </fieldset>
        </form>
    </div>

<?php
// We can make a database query, if there are no errors and we have non-empty array of parameters
if (count($searchErrors) == 0 && count($cleanParams) > 0) {
    $sql = makeAdvancedSearchQuery($cleanParams); // _functions.php
    
    // Declare an array of binding parameters (criteria)
    $criteria = array();

    // Add wildcards if operator is LIKE or NOT LIKE
    if ($cleanParams["oper0"] == "like" || $cleanParams["oper0"] == "not like") {
        $cleanParams["crit0"] = '%' . $cleanParams["crit0"] . '%';
    }

    $criteria[] = $cleanParams["crit0"];

    // Add second criteria if exists
    if (array_key_exists("crit1", $cleanParams)) {
        // Add wildcards if needed
        if ($cleanParams["oper1"] == "like" || $cleanParams["oper1"] == "not like") {
            $cleanParams["crit1"] = '%' . $cleanParams["crit1"] . '%';
        }

        $criteria[] = $cleanParams["crit1"];
    }
    

    $conn = openDatabaseConnection();
    if (!$conn) {
        echo "<h1>We are experiencing some technical difficulties. Please try again later</h1></main></body></html>";
        die();
    }

    $searchResults = retrieveActivitiesBySearchQuery($sql, $criteria, $conn); // _dbfunctions.php
    closeDatabaseConnection($conn); // _dbfunctions.php

    // Check if something was found
    if (count($searchResults) > 0) {
        echo "<h1>Search results:</h1>";
        echo generateSearchResults($searchResults); // _search_results.php
    } else {
        // if nothing was found
        echo "<div class='activity-search-info'><p>No results found</p></div>";
    }
}

?>

</main>

<?php
echo generateFooter(); // _footer.php
?>
