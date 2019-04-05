<?php
// Generic 404 page to display when "Page not found" errors are encountered

require_once("templates/_meta.php");

echo generateMetaTags("404 - Page Not Found | Calgary Travel Advisor");
?>

<body>
    <div id="error404-wrapper">
        <img src="../assets/images/logo.png" alt="Calgary Travel Advisor Logo" width="167" height="100" />  
        <h1>Error 404 - Page Not Found</h1>
        <a id="" href="javascript:history.go(-1)">To the previous page</a>
    </div>  
</body>
</html>