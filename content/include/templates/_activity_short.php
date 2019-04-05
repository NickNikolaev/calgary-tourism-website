<?php
/*
    This file contains a function that generates activity sections with short desciption 
    or activities.php page.
*/

require_once(__DIR__ . "/../functions/_dbfunctions.php");
  
function generateShortActivitiesDescription($activityCategory) {
    $conn = openDatabaseConnection(); // _dbfunctions.php file

    if ($conn) {
        $activities = retrieveActivitiesByCategory($activityCategory, $conn);
        closeDatabaseConnection($conn);
    } else {
        echo "<h1>We are experiencing some technical difficulties. Please try again later</h1></body></html>";
        die();
    }

    $escapedActivityCategory = htmlspecialchars($activityCategory, ENT_QUOTES, "UTF-8");

    $result = "<main><h1>$escapedActivityCategory</h1>";

    for ($i = 0; $i < count($activities); $i++) {
        $escapedActivityID = htmlspecialchars($activities[$i]['activityID'], ENT_QUOTES, "UTF-8");
        $escapedActivityName = htmlspecialchars($activities[$i]['activity_name'], ENT_QUOTES, "UTF-8");
        $shortDescription = substr($activities[$i]['description'], 0, 200) . "...";
        $escapedShortDescription = htmlspecialchars($shortDescription, ENT_QUOTES, "UTF-8");
        $escapedPrice = htmlspecialchars("$" . $activities[$i]['price'], ENT_QUOTES, "UTF-8");
        $escapedLocation = htmlspecialchars($activities[$i]['location'], ENT_QUOTES, "UTF-8");

        $result .= <<<ACTIVITY
        <section class="activity">
            <div class="activity-img-wrapper">
                <img src="../assets/images/activity-placeholder-img-small.jpg" alt="Maple leaf - activity image placeholder" width="240" height="240" />
            </div>
            <div class="activity-description-wrapper">
                <div class="activity-description">
                    <h2>$escapedActivityName</h2>
                    <p>$escapedShortDescription</p>
                    <a href="activity-information.php?id=$escapedActivityID">More</a>
                </div>
                <div class="activity-other-info">
                    <p>Prices start from:</p>
                    <p><span>$escapedPrice</span></p>
                    <p>Location:</p>
                    <p>$escapedLocation</p>
                </div>
            </div>
        </section>
        <div class="cleared"></div>
ACTIVITY;
    }

    if (count($activities) == 0) {
        // Inform if no activities were found under the specified category
        $result .= "<section><p>No activities were found</p></section></main>";
    } else {
        // Add "To the top" link at the bottom otherwise (if something was found)
        $result .= "<div id='to-the-top-link'><a href='#'>To the top</a></div></main>"; 
    }

    return $result;
  }
?>