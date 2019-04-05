<?php
/* This file contains function that generates header of the page */

require_once(__DIR__ . "/../values/_values.php");
require_once(__DIR__ . "/../functions/_functions.php");

function generateHeader($customerFirstName) {
    // allCategories are from _values.php file
    $escapedMenu = generateMenu($GLOBALS["allCategories"]); // Escaped in _function.php file

    // Escape customer first name (don't trust database and session data)
    $escapedCustomerFirstName = htmlspecialchars($customerFirstName, ENT_QUOTES, "UTF-8");

    $header = <<<HEADER
    <body>
        <header>
        <div id="user-info">
            <ul>
                <li>Hello, $escapedCustomerFirstName!</li><li>
                <a href="logout.php">Log out</a></li>
            </ul>
        </div>
        <div id="logo-wrapper">
            <a href="index.php">
                <img src="../assets/images/logo.png" alt="Calgary Travel Advisor Logo" width="167" height="100" />
            </a>
        </div>
        <nav>
            <div id="navbar">
                <div id="menu">
                    $escapedMenu
                </div>
            <div id="search-form">
                <form action="search.php" method="GET">
                    <input type="text" name="search" id="search" placeholder="I am looking for..." />
                    <button class="search-button">Search</button>
                    <a href="advanced-search.php">Advanced search</a>
                </form>
            </div>
            <div class="cleared"></div>
            </div>
        </nav>
        </header>
HEADER;

    return $header;
}
?>