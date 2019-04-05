<!-- This file contains sign up form used in signup.php page -->

<body>
    <div class="container">
        <div id="sign-up" class="user-form">
            <div id="user-form-logo">
            <!-- <h1>Signup Form</h1> -->
                <img src="../assets/images/logo.png" alt="Calgary Travel Advisor Logo" width="167" height="100" />
            </div>
            <form action="do-signup.php" method="POST">
                <div class="form-fields-wrapper">
                    <div class="fields-group row">
                        <label for="username">Username:<span class="required">&nbsp;*</span></label>
                        <input type="text" name="username" id="username" placeholder="e.g., jennwilson" required
                        <?php
                        // Display entered username again, if it was entered before but form submission failed for some reason
                        if (isset($_SESSION["posted"]["username"])) {
                            echo "value='" . htmlspecialchars($_SESSION["posted"]["username"], ENT_QUOTES, "UTF-8") . "'"; 
                        }
                        ?>  
                        /> <!-- closing <input> tag -->
                        <?php
                        // Diplay error if entered username was not valid
                        if (isset($_SESSION["signupErrors"]["username"])) {
                            echo "<div class=inline-error-msg><p>" .
                                htmlspecialchars($_SESSION["signupErrors"]["username"], ENT_QUOTES, "UTF-8") .
                                "</p></div>";
                        }
                        ?> 
                    </div>
                    <div class="fields-group row">
                        <label for="password">Password:<span class="required">&nbsp;*</span></label>
                        <input type="password" name="password" id="password" placeholder="e.g., &bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required />
                        <?php
                        if (isset($_SESSION["signupErrors"]["password"])) {
                            echo "<div class=inline-error-msg><p>" . $_SESSION["signupErrors"]["password"] . "</p></div>";
                        }
                        ?>
                    </div>
                    <div class="fields-group row">
                        <label for="confirm-password">Confirm password:<span class="required">&nbsp;*</span></label>
                        <input type="password" name="confirm-password" id="confirm-password" placeholder="e.g., &bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required/>
                        <?php
                        if (isset($_SESSION["signupErrors"]["confirm-password"])) {
                            echo "<div class=inline-error-msg><p>" . $_SESSION["signupErrors"]["confirm-password"] . "</p></div>";
                        }
                        ?>
                    </div>
                    <section id="account-details">
                        <h2>Account details</h2>
                        <div class="fields-group row">
                            <label for="firstname">First name:<span class="required">&nbsp;*</span></label>
                            <input type="text" name="firstname" id="firstname" placeholder="e.g., Jennifer" required  
                            <?php
                            if (isset($_SESSION["posted"]["firstname"])) {
                                echo "value='" . htmlspecialchars($_SESSION["posted"]["firstname"], ENT_QUOTES, "UTF-8") . "'"; 
                            }
                            ?>  
                            /> <!-- closing <input> tag -->
                            <?php 
                            if (isset($_SESSION["signupErrors"]["firstname"])) {
                                echo "<div class=inline-error-msg><p>" . $_SESSION["signupErrors"]["firstname"] . "</p></div>";
                            }
                            ?>
                        </div>
                        <div class="fields-group row">
                            <label for="lastname">Last name:<span class="required">&nbsp;*</span></label>
                            <input type="text" name="lastname" id="lastname" placeholder="e.g., Wilson" required 
                            <?php
                            if (isset($_SESSION["posted"]["lastname"])) {
                                echo "value='" . htmlspecialchars($_SESSION["posted"]["lastname"], ENT_QUOTES, "UTF-8") . "'"; 
                            }
                            ?>  
                            /> <!-- closing <input> tag -->
                            <?php
                            if (isset($_SESSION["signupErrors"]["lastname"])) {
                                echo "<div class=inline-error-msg><p>" . $_SESSION["signupErrors"]["lastname"] . "</p></div>";
                            }
                            ?>
                        </div>
                        <div class="fields-group row">
                            <label for="birthdate">Date of birth:<span class="required">&nbsp;*</span></label>
                            <input type="date" name="birthdate" id="birthdate" required 
                            <?php
                            if (isset($_SESSION["posted"]["birthdate"])) {
                                echo "value='" . htmlspecialchars($_SESSION["posted"]["birthdate"], ENT_QUOTES, "UTF-8") . "'"; 
                            }
                            ?>  
                            /> <!-- closing <input> tag -->
                            <?php
                            if (isset($_SESSION["signupErrors"]["birthdate"])) {
                                echo "<div class=inline-error-msg><p>" . $_SESSION["signupErrors"]["birthdate"] . "</p></div>";
                            }
                            ?>
                        </div>
                        <div class="fields-group row">
                            <label for="address1">Address line 1:<span class="required">&nbsp;*</span></label>
                            <input type="text" name="address1" id="address1" placeholder="e.g., 123 Main Road" required 
                            <?php
                            if (isset($_SESSION["posted"]["address1"])) {
                                echo "value='" . htmlspecialchars($_SESSION["posted"]["address1"], ENT_QUOTES, "UTF-8") . "'"; 
                            }
                            ?>  
                            /> <!-- closing <input> tag -->
                            <?php
                            if (isset($_SESSION["signupErrors"]["address1"])) {
                                echo "<div class=inline-error-msg><p>" . $_SESSION["signupErrors"]["address1"] . "</p></div>";
                            }
                            ?>
                        </div>
                        <div class="fields-group row">
                            <label for="address2">Address line 2:</label>
                            <input type="text" name="address2" id="address2" placeholder="e.g., Oyen, AB, Canada" 
                            <?php
                            if (isset($_SESSION["posted"]["address2"])) {
                                echo "value='" . htmlspecialchars($_SESSION["posted"]["address2"], ENT_QUOTES, "UTF-8") . "'"; 
                            }
                            ?>  
                            /> <!-- closing <input> tag -->
                            <?php
                            if (isset($_SESSION["signupErrors"]["address2"])) {
                                echo "<div class=inline-error-msg><p>" . $_SESSION["signupErrors"]["address2"] . "</p></div>";
                            }
                            ?>
                        </div>
                        <div class="fields-group row">
                            <label for="postalcode">Postal code:<span class="required">&nbsp;*</span></label>
                            <input type="text" name="postalcode" id="postalcode" placeholder="e.g., A4B 0K5"
                            <?php
                            if (isset($_SESSION["posted"]["postalcode"])) {
                                echo "value='" . htmlspecialchars($_SESSION["posted"]["postalcode"], ENT_QUOTES, "UTF-8") . "'"; 
                            }
                            ?>  
                            /> <!-- closing <input> tag -->
                            <?php
                            if (isset($_SESSION["signupErrors"]["postalcode"])) {
                                echo "<div class=inline-error-msg><p>" . $_SESSION["signupErrors"]["postalcode"] . "</p></div>";
                            }
                            ?>
                        </div>
                    </section>
                    <p class="explanation"><span class="required">*</span> - Required fields</p>
                    <button class="user-btn">Register</button>
                </div>
                <a href="login.php">Already have an account? Log in instead</a>
            </form>
        </div>
    </div>
</body>
</html>

<?php
// Unset errors and previously entered form data
unset($_SESSION["signupErrors"]);
unset($_SESSION["posted"]);
?>