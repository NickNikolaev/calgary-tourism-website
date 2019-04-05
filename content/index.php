<?php
session_start();

require_once("include/functions/_functions.php");
require_once("include/templates/_meta.php");
require_once("include/templates/_header.php");
require_once("include/templates/_activity_cards.php");
require_once("include/templates/_footer.php");

// _functions.php file
if (!isSessionExists()) {
    die(header("Location: login.php"));
}

echo generateMetaTags("Home Page | Calgary Travel Advisor"); // _meta.php file
echo generateHeader($_SESSION['customerFirstName']); // _header.php file
?>

<main>
    <section id="about-website">
        <div id="hero-image">
            <div class="overlay-center">
                <div class="centered">
                    <h2>About the Website</h2>
                </div>
                <p>
                    This is a travel advisor website for Calgary tourists.
                    Here you can read about the main attractions of the city as well as book tickets for various activities.
                </p>
            </div>
        </div>
    </section>
    <section id="about-city">
        <div class="centered">
            <h2>About Calgary</h2>
        </div>
        <img src="../assets/images/calgary-street.jpg" alt="Calgary Street" width="500" height="333" />
        <p>
            Calgary is a city in the Canadian province of Alberta. It is located about 80 kilometers (50 miles) east of Canada's
            Rocky Mountains, where the Bow and Elbow rivers meet. With a population of over 1.2 million people, 
            Calgary is the fifth largest urban centre in Canada.
        </p>
        <p>
            With a mix of dynamic big-city energy and fantastic surrounding natural beauty, Calgary is considered as one 
            of the most livable cities on earth. Visitors will find here many festivals, live performances, cultural attractions, 
            trendy restaurants and nightspots.
        </p>
        <p>
            Climate of the city is dry and sunny with mild temperatures and over 2,300 sunshine hours every year. 
            No matter what you prefer - winter activities or summer holidays - you will definitely enjoy your stay in Calgary and 
            fall in love with this vibrant and beautiful city.
        </p>
    </section>
    <div class="section-divider"></div>
    <?php echo generateActivityCards(); ?>
</main>

<?php echo generateFooter(); ?>