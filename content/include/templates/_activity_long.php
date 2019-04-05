<?php
/*
    This file contains a function that generates detailed activity description 
    for activity-information.php file
*/

require_once(__DIR__ . "/../functions/_dbfunctions.php");
require_once(__DIR__ . "/../functions/_functions.php");
require_once(__DIR__ . "/../values/_values.php");
  
function generateLongActivityDescription($activity) {
    $result = "";
    
    // Escape HTML output (don't trust database)
    $escapedActivityID = htmlspecialchars($activity['activityID'], ENT_QUOTES, "UTF-8");
    $escapedActivityName = htmlspecialchars($activity['activity_name'], ENT_QUOTES, "UTF-8");
    $escapedDescription = nl2br(htmlspecialchars($activity['description'], ENT_QUOTES, "UTF-8"), true);
    $escapedPrice = htmlspecialchars("$" . $activity['price'], ENT_QUOTES, "UTF-8");
    $escapedLocation = htmlspecialchars($activity['location'], ENT_QUOTES, "UTF-8");
    
    // We need to replace whitespaces with '+' for google maps link
    $locationNoSpaces = str_replace(' ', '+', $activity['location']);
    $escapedLocationNoSpaces = htmlspecialchars($locationNoSpaces, ENT_QUOTES, "UTF-8");

    // Get activity category code (first three digits of activity ID - imitation)
    $categoryCode = substr($activity['activityID'], 0, 3);
    
    // Need category name for breadcrumb links
    $categoryName = findActivityCategoryName($GLOBALS["allCategories"], $categoryCode); // allCategories is from _values.php
    $escapedCategoryName = htmlspecialchars($categoryName, ENT_QUOTES, "UTF-8");

    // Check if there were any errors when booking an activity, display them and unset
    $escapedBookingError = "";

    if (isset($_SESSION["bookingError"])) {
        $escapedBookingError .= "<div id='error-msg'>";
        foreach ($_SESSION["bookingError"] as $err) {
            $escapedBookingError .= "<p>".htmlspecialchars($err, ENT_QUOTES, "UTF-8")."</p>";
        }
        $escapedBookingError .= "</div>";
        unset($_SESSION["bookingError"]);
    }

    $result .= <<<DESCR
    <main>
        <section id="activity-info">
            <div id="breadcrumb">
                <p>
                    <a href="/KF7013-18-19/content/index.php">Home</a>/<a href="activities.php?category=$escapedCategoryName">$escapedCategoryName</a>
                </p>
            </div>
            <h1>$escapedActivityName</h1>
            <div id="wrapper">
                <div id="img-wrapper">
                    <img src="../assets/images/activity-placeholder-img-big.jpg" alt="Maple leaf - activity image placeholder" width="650" height="300" />
                </div>
                <div id="tickets">
                    <h2>Tickets</h2>
                    <p>$escapedPrice</p>
                    <form action="booking-confirmation.php" method="POST" onsubmit="return confirm('Are you sure you want to book this activity?');">
                        <label for="numberOfTickets">Quantity: </label>
                        <input type="number" name="numberOfTickets" id="numberOfTickets" min="1" required>
                        <label for="dateOfActivity">Date:</label>
                        <input type="date" name="dateOfActivity" id="dateOfActivity" required>
                        <input type="hidden" name="activityID" id="activityID" value="$escapedActivityID">
                        <button>Book</button>
                        $escapedBookingError
                    </form>
                </div>
            </div>
            <div id="details" class="cleared">
                <div id="location">
                    <p>Location: $escapedLocation</p>
                </div>
                <div id="description">
                    <p>$escapedDescription</p>
                    <div id='to-the-top-link'><a href='#'>To the top</a></div>
                </div>
                <div id="google-map">
                    <iframe src="https://maps.google.com/maps?q=$escapedLocationNoSpaces&ie=UTF8&iwloc=&output=embed" width="270" height="270" allowfullscreen></iframe>
                </div>
            </div>
            <div class="cleared"></div>
        </section>
    </main>
DESCR;

    return $result;
}
?>