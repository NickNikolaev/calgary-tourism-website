<?php
/* This file performs logout */

session_start();

require_once("include/functions/_functions.php");

// Destroy session if it exists
if (isSessionExists()) {
    session_unset();
    session_destroy();
}

header('Location: login.php');
?>