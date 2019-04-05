<?php
/* This file contains login form template for login.php file */

function displayLoginForm($errorMsg) {
    // Escape error message (just in case, don't trust session storage)
    $escapedErrorMsg = htmlspecialchars($errorMsg, ENT_QUOTES, "UTF-8");
    
    $form = <<<FORM
    <body>
        <div class="container">
            <div class="user-form">
            <div id="user-form-logo">
                <img src="../assets/images/logo.png" alt="Calgary Travel Advisor Logo" width="167" height="100" />
            </div>
            <form action="do-login.php" method="POST">
                <div class="form-fields-wrapper">
                <div class="fields-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" placeholder="type 'johndoe'" required />
                </div>
                <div class="fields-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="type 'johndoepass'" required />
                </div>
                <button class="user-btn">Login</button>
                <div id='error-msg'><p>$escapedErrorMsg</p></div>
                </div>
                <a href="signup.php">Don't have an account? Sign up</a>
            </form>
            </div>
        </div>
    </body>
    </html>

FORM;

    return $form;
}
?>

