<?php
/* This file contains function that generates activity cards for the index.php page */

require_once(__DIR__ . "/../values/_values.php");

function generateActivityCards() {
    $cards = "<section id='activities'><div id='activities-wrapper'>";
    $cards .= "<div class='centered'><h2>Activities</h2></div>";

    // allCategories array is from _values.php file
    foreach ($GLOBALS["allCategories"] as $key => $value) {
        // Escape anyway because in future they might be taken from a remote system (database, etc.)
        $escapedKey = htmlspecialchars($key, ENT_QUOTES, "UTF-8");
        $escapedAccessKey = strtolower($escapedKey[0]); // pick the first letter in the activity category as an accesskey
        $escapedDescription = htmlspecialchars($value["Description"], ENT_QUOTES, "UTF-8");
        $escapedImage = htmlspecialchars($value["Image"], ENT_QUOTES, "UTF-8");

        $cards .= <<<CARD
        <div class="activity-card">
            <div class="card-image-wrapper">
                <img src="../assets/images/$escapedImage" alt="$escapedKey placeholder image" width="240" />
            </div>
            <h3>$escapedKey</h3>
            <p>$escapedDescription</p>
            <a href="activities.php?category=$escapedKey" accesskey="$escapedAccessKey">More</a>
        </div>
CARD;
    }

    $cards .= "</div></section>";

    return $cards;
}
  
?>