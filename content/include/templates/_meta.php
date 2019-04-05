<?php
/* 
    This file contains a function that generates meta tags (head) for every page.
    It takes page title as a parameter
*/

function generateMetaTags($pageTitle) {
    // Escape page title
    $escapedPageTitle = htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8");

    $metaTags = <<<META
    <!DOCTYPE html>
    <html lang="en">
        <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>$pageTitle</title>
        <link rel="stylesheet" href="../assets/stylesheets/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" />
        <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon" />
        </head>
META;

    return $metaTags;
}
  
?>