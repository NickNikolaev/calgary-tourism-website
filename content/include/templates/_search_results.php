<?php

/* This file generate search result sections for search.php and advanced-search.php files */

function generateSearchResults($searchResults) {
    $html = "";
    
    foreach ($searchResults as $activity) {
        // Escape output (don't trust database)
        $escapedActivityID = htmlspecialchars($activity['activityID'], ENT_QUOTES, "UTF-8");
        $escapedActivityName = htmlspecialchars($activity['activity_name'], ENT_QUOTES, "UTF-8");
        $shortDescription = substr($activity['description'], 0, 300) . "...";
        $escapedDescription = htmlspecialchars($shortDescription, ENT_QUOTES, "UTF-8");
        $escapedPrice = htmlspecialchars("$" . $activity['price'], ENT_QUOTES, "UTF-8");
        $escapedLocation = htmlspecialchars($activity['location'], ENT_QUOTES, "UTF-8");

        $html .= <<<ACTIVITY
        <div class="activity-search-info">
            <h2><a href="activity-information.php?id=$escapedActivityID">$escapedActivityName</a></h2>
            <p>$escapedDescription</p>
            <p><span>Price: $escapedPrice</span></p>
            <p><span>Location: $escapedLocation</span></p>
        </div>
ACTIVITY;
    }

    // Add "To the top" link at the bottom if anything was found
    if (count($searchResults) > 0) {
        $html .= "<div id='to-the-top-link'><a href='#'>To the top</a></div>";
    }
    
    return $html;
}
  
?>