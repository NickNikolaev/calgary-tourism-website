# Calgary Tourism Website
This website is a university course project. See [**live demo**](http://calgarytourism.epizy.com). You can create a new account or use `johndoe/johndoepass` credentials to sign in.

## Project requirements
Major project requirements (briefly):
* Login and registration logic
* Dynamic content
* Activity booking functionality
* Search functionality

Additional requirements (briefly):
* Protection from SQL Injection and XSS
* Responsive design

## Limitations
Since this was a university course project, certain limitations were enforced:
* No third-party libraries or frameworks
* No changes to database schema (was provided with the assignment)
* Procedural (and not object-oriented) PHP
* Directory structure as defined by the assignment

## Configuration and deployment
Prerequisites:
* Apache web server
* PHP
* MySQL / MariaDB

Steps:
1. Place `index.php` with `assets` and `content` directories in the document root directory on your web server.
2. Create a new database for the website.
3. Import `calgary_tourism_db.sql` in the newly created database.
4. If needed, create a new database user with `SELECT` and `INSERT` privileges.
5. Edit `content/include/values/_dbconn.php` file with your database connection parameters:
```php
<?php
// Database connection parameters
define('DB_NAME', <<YOUR DATABASE NAME>>);
define('DB_USER', <<YOUR DATABASE USER>>);
define('DB_PASSWORD', <<YOUR DATABASE USER PASSWORD>>);
define('DB_HOST', <<YOUR DATABASE HOST>>);
?>
```

6. Test it.