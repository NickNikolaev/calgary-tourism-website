<?php
/* This file contains function that generates footer of the page */

require_once(__DIR__ . "/../values/_values.php");
require_once(__DIR__ . "/../functions/_functions.php");

function generateFooter() {
    // allCategories and contacts arrays are from _values.php file
    $escapedMenu = generateMenu($GLOBALS["allCategories"]); // Escaped in _function.php file
    $escapedAddress = generateAddress($GLOBALS["contacts"]); // Escaped in _function.php file
    $currentYear = date("Y");

    $footer = <<<FOOTER
    <footer>
        <div id="footer-wrapper">
            <div id="contacts">
                <h2>Contacts</h2>
                $escapedAddress
                <div id="social">
                    <a href="https://www.youtube.com/" accesskey="y">
                        <img src="../assets/images/_ionicons_svg_logo-youtube.svg" alt="Youtube logo" width="33" height="33" />
                    </a>
                    <a href="https://www.facebook.com/" accesskey="f">
                        <img src="../assets/images/_ionicons_svg_logo-facebook.svg" alt="Facebook logo" width="33" height="33" />
                    </a>
                    <a href="https://twitter.com/" accesskey="t">
                        <img src="../assets/images/_ionicons_svg_logo-twitter.svg" alt="Twitter logo" width="33" height="33" />
                    </a>
                    <a href="https://www.instagram.com/" accesskey="i">
                        <img src="../assets/images/_ionicons_svg_logo-instagram.svg" alt="Instagram logo" width="33" height="33" />
                    </a>
                </div>
            </div>
            <nav>
                <h2>Useful links</h2>
                $escapedMenu
            </nav>
            <div id="map">
                <iframe src="https://maps.google.com/maps?q=Calgary&t=&z=13&ie=UTF8&iwloc=&output=embed" width="300" height="200" allowfullscreen></iframe>
            </div>
            <p class="cleared copyright">Copyright $currentYear. <a href="credits.php">Credits page</a></p>
        </div>
    </footer>
</body>
</html>
FOOTER;
    
    return $footer;
  }
?>