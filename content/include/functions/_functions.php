<?php
/* This file contains helper functions */

require_once(__DIR__ . "/../functions/_dbfunctions.php");


function isSessionExists() {
    if (array_key_exists('username', $_SESSION)) {
        return true;
    } else {
        return false;
    }
}


function generateMenu($allCategories) {
    $menu = "<ul>";

    foreach ($allCategories as $category => $value) {
        // Escape, since this menu will be included in html output
        $escapedCategory = htmlspecialchars($category, ENT_QUOTES, "UTF-8");
        $escapedaccessKey = strtolower($escapedCategory[0]);
        $menu .= "<li><a href=\"activities.php?category=$escapedCategory\"
                  accesskey=\"$escapedaccessKey\">$escapedCategory</a></li>";
    }

    $menu .= "</ul>";

    return $menu;
}


function generateAddress($contacts) {
    $address = "";

    foreach ($contacts as $key => $value) {
        // Escape, since this address will be included in html output (footer)
        $escapedValue = htmlspecialchars($value, ENT_QUOTES, "UTF-8");
        $address .= "<p>$escapedValue</p>";
    }

    return $address;
}


// We assume that activity id has XXXZZZZZ form, where XXX part imitates category
function findActivityCategoryCode($allCategories, $activityCategory) {
    foreach ($allCategories as $key => $value) {
        if ($key == $activityCategory) return $value["Code"];
    }

    // If no matching category name was found
    return "";
}


// We assume that activity id has XXXZZZZZ form, where XXX part imitates category
function findActivityCategoryName($allCategories, $categoryCode) {
    foreach ($allCategories as $key => $value) {
        if ($value["Code"] == $categoryCode) return $key;
    }

    // If no matching category code was found
    return "";
}


/* ADVANCED SEARCH HELPER FUNCTIONS */

function isFieldValid($field) {
    // Field must be one of the values below
    switch ($field) {
        case "activity_name":
        case "description":
        case "location":
        case "price":
            return true;
        default:
            return false;
    }
}


function isOperatorValid($operator, $field) {
    // Operator validity depends on the field type
    if ($field == "price") {
        switch ($operator) {
            case "=":
            case "<":
            case ">":
                return true;
            default:
                return false;
        }
    } elseif ($field == "activity_name" || $field == "description" || $field == "location") {
        switch ($operator) {
            case "like":
            case "not like":
            case "=":
                return true;
            default:
                return false;
        }
    }
}


function validateCriteria($criteria, $field) {
    // Criteria validity depends on the field type
    if ($field == "price") {
        return filter_var($criteria, FILTER_VALIDATE_FLOAT);
    } elseif ($field == "activity_name" || $field == "description" || $field == "location") {
        return filter_var($criteria, FILTER_SANITIZE_STRING);
    }
}


function isLogicalOperatorValid($logicalOperator) {
    switch($logicalOperator) {
        case "and":
        case "or":
            return true;
        default:
            return false;
    }
}


function makeAdvancedSearchQuery($params) {
    // First field is always specified
    $sql = "SELECT * FROM activities WHERE " .
            $params["field0"] . " " . $params["oper0"] . " ? ";

    // Add second field only if it is specified
    // If it exists, then we know that oper1, logicalOper0 and crit1 also exist (from the logic in advanced-search.php)
    if (array_key_exists("field1", $params)) {
        $sql .= $params["logicalOper0"] . " " . $params["field1"] . " " . $params["oper1"] . " ?";
    }
    
    return $sql;
}

?>