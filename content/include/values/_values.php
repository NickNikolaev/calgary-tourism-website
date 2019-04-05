<?php
/* This file stores some string values that can potentially be used on multiple pages
and that can ocasionally (or often) change */


// Activity category code is an imitation and represents the first three digits 
// of an activityID from activities table
// Otherwise we won't be able to structure website navigation menu
$allCategories = array(
    "Culture" => array(
        "Code" => 100,
        "Description" => "Learn about Canadian history and culture by visiting museums and art galleries",
        "Image" => "art-gallery.jpg"
    ),
    "Outdoors" => array(
        "Code" => 110,
        "Description" => "Calgary is a short drive from some of the best Alberta's mountain parks",
        "Image" => "outdoors.jpg"
    ),
    "Attractions" => array(
        "Code" => 120,
        "Description" => "Explore a wide range of attractions that are fun for the whole family year-round",
        "Image" => "attractions.jpg"
    ),
    "Tours" => array(
        "Code" => 130,
        "Description" => "Affordable and inclusive walking and bus guided tours in Calgary and around",
        "Image" => "tours.jpg"
    ),
    "Restaurants" => array(
        "Code" => 140,
        "Description" => "Find restaurants and make reservations to enjoy a unique dining experience",
        "Image" => "restaurants.jpg"
    ),
    "Events" => array(
        "Code" => 150,
        "Description" => "Choose among dozens of events and festivals that take place in Calgary year-around",
        "Image" => "events.jpg"
    )
);

$contacts = array(
    "Address1" => "3832 Heritage Drive",
    "Address2" => "Calgary, AB",
    "PostalCode" => "T2V 2W2",
    "Phone" => "+1 (403) 801 0736",
    "Email" => "info@calgarytraveladvisor.com"
);
?>