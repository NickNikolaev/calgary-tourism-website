<?php
/* This is a credits page */

session_start();

require_once("include/templates/_meta.php");
require_once("include/templates/_header.php");
require_once("include/templates/_footer.php");

if (!isSessionExists()) {
    die(header("Location: login.php"));
}

echo generateMetaTags("Credits Page | Calgary Travel Advisor");
echo generateHeader($_SESSION['customerFirstName']);
?>

<main>
    <section id="credits">
        <h1>Credits (ID 18036862)</h1>
        <p>
            Banff and Beyond (2018). <span>Lake Louise Canoe Rental Tips Hours Rates and Photos – Banff and Beyond.</span>
            Available at:
            <a href="http://banffandbeyond.com/canoeing-on-the-turquoise-waters-of-lake-louise/">
                http://banffandbeyond.com/canoeing-on-the-turquoise-waters-of-lake-louise/</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Calgary Tower (2018). <span>Calgary Tower – About.</span>
            Available at:
            <a href="https://www.calgarytower.com/about/">https://www.calgarytower.com/about/</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Calgary Zoo (2018). <span>Calgary Zoo Animals – Over 100 Species.</span>
            Available at:
            <a href="https://www.calgaryzoo.com/visit/animals">https://www.calgaryzoo.com/visit/animals</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Canadian Craft Tours (2018). <span>Calgary Brewery Tour - Canadian Craft Tours.</span>
            Available at:
            <a href="https://www.canadiancrafttours.ca/products/calgary-brewery-tour">
                https://www.canadiancrafttours.ca/products/calgary-brewery-tour</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Codepen (2018). <span>Material Design Box Shadows.</span>
            Available at:
            <a href="https://codepen.io/sdthornton/pen/wBZdXq">https://codepen.io/sdthornton/pen/wBZdXq</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Ellman J. (2018). <span>Week 10: Securing a web site: Login and Sessions. Authenticated Sessions Examples.</span>
        </p>
        <p>
            Ellman J. (2018). <span>Week 8: PHP + MySQL Lecture Slides.</span>
        </p>
        <p>
            Glenbow (2018). <span>Glenbow - About Us.</span>
            Available at:
            <a href="https://www.glenbow.org/about/">https://www.glenbow.org/about/</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Google Fonts (2018). <span>Lemon font-family.</span>
            Available at:
            <a href="https://fonts.google.com/specimen/Lemon">https://fonts.google.com/specimen/Lemon</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Heritage Park Historical Village (2018). <span>Heritage Park Historical Village – Attractions & Exhibits.</span>
            Available at:
            <a href="https://www.heritagepark.ca/park-information/attractions-and-exhibits.html">
                https://www.heritagepark.ca/park-information/attractions-and-exhibits.html</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Ionicons (2018). <span>The premium icon pack for Ionic Framework.</span>
            Available at:
            <a href="https://ionicons.com/">https://ionicons.com/</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Life in Calgary (2018). <span>Calgary Facts – Life in Calgary.</span>
            Available at:
            <a href="https://www.lifeincalgary.ca/moving/calgary-facts">https://www.lifeincalgary.ca/moving/calgary-facts</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Lynch, P.J. & Horton, S. (2016). <span>Web Style Guide: Foundations of User Experience Design.</span>
            4th edn. Yale University Press.
        </p>
        <p>
            MDN (2018). <span>MDN Web Docs.</span>
            Available at:
            <a href="https://developer.mozilla.org/en-US/">https://developer.mozilla.org/en-US/</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Nikolaev, N (2018). <span>Calgary Travel Advisor Logo (Image).</span>
        </p>
        <p>
            Nikolaev, N (2018). <span>Website favicon (Image).</span>
        </p>
        <p>
            Qhuate Cuisine (2018). <span>Qhuate Cuisine.</span>
            Available at:
            <a href="https://www.qhautecuisine.com/">https://www.qhautecuisine.com/</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Shiflett, C. (2005). <span>Essential PHP security.</span> O'Reilly Media
        </p>
        <p>
            StackOverflow (2018). <span>Can you target &lt;br /&gt; with css?</span>
            Available at:
            <a href="https://stackoverflow.com/questions/899252/can-you-target-br-with-css">
                https://stackoverflow.com/questions/899252/can-you-target-br-with-css</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Stuttard, D. & Pinto, M (2011). <span>The web application hacker's handbook: Finding and exploiting security flaws. </span>
            2nd edn. Wiley.
        </p>
        <p>
            Suehring, S. & Valade, J. (2013). <span>PHP, MySQL, JavaScript & HTML5 all-in-one for dummies. </span>
            1st edn. John Wiley & Sons.
        </p>
        <p>
            SVG Silh (2018). <span>Top Mountain Grand Image.</span>
            Available at:
            <a href="https://svgsilh.com/image/306236.html">https://svgsilh.com/image/306236.html</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            The Military Museums (2018). <span>The Military Museums – About TTM.</span>
            Available at:
            <a href="https://themilitarymuseums.ca/about-us/about-tmm">https://themilitarymuseums.ca/about-us/about-tmm</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            To Do Canada (2018). <span>Heritage Park Historical Village Calgary Alberta Canada - A Trip Guide.</span>
            Available at:
            <a href="https://www.todocanada.ca/city/calgary/listing/heritage-park-calgary/">
                https://www.todocanada.ca/city/calgary/listing/heritage-park-calgary/</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Tourism Calgary (2018). <span>Explore Calgary.</span>
            Available at:
            <a href="http://tourism.visitcalgary.com/sites/default/files/pdf/Backgrounders/Explore_Calgary.pdf">
            http://tourism.visitcalgary.com/sites/default/files/pdf/Backgrounders/Explore_Calgary.pdf</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Unsplash (2018). <span>Bridge, person, structure and architecture HD photo by Denisse Leon (#denisseleon).</span>
            Available at:
            <a href="https://unsplash.com/photos/4ZPrc2__Kr0">https://unsplash.com/photos/4ZPrc2__Kr0</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Unsplash (2018). <span>City, building, street and center HD photo by patrick mcvey (@pakick).</span>
            Available at:
            <a href="https://unsplash.com/photos/-rjc29yPMRk">https://unsplash.com/photos/-rjc29yPMRk</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Unsplash (2018). <span>City, building, sunlight and flare HD photo by Kyler Nixon (@knixon).</span>
            Available at:
            <a href="https://unsplash.com/photos/_ZBekGTBh-c">https://unsplash.com/photos/_ZBekGTBh-c</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Unsplash (2018). <span>Moraine Lake photo by John Lee (@john_artifexfilms).</span>
            Available at:
            <a href="https://unsplash.com/photos/oMneOBYhJxY">https://unsplash.com/photos/oMneOBYhJxY</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Unsplash (2018). <span>Nature, hand, leafe and orange HD photo by Guillaume Jaillet (@i_am_g).</span>
            Available at:
            <a href="https://unsplash.com/photos/EIWCd0414xQ">https://unsplash.com/photos/EIWCd0414xQ</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Unsplash (2018). <span>People, bench, city and street HD photo by Clem Onojeghuo (@clemono2).</span>
            Available at:
            <a href="https://unsplash.com/photos/5vuCL2zVRdM">https://unsplash.com/photos/5vuCL2zVRdM</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Unsplash (2018). <span>Picture art, photo, and gallery HD photo by rawpixel.</span>
            Available at:
            <a href="https://unsplash.com/photos/GcwP7NPRr7Q">https://unsplash.com/photos/GcwP7NPRr7Q</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Unsplash (2018). <span>Table setting, setting, glass and glass wear HD photo by Kenny Luo (@kennyluoping).</span>
            Available at:
            <a href="https://unsplash.com/photos/7IiPopynx18">https://unsplash.com/photos/7IiPopynx18</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Unsplash (2018). <span>Young women at a music festival photo by Aranxa Esteve (@aranxa_esteve).</span>
            Available at:
            <a href="https://unsplash.com/photos/pOXHU0UEDcg">https://unsplash.com/photos/pOXHU0UEDcg</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            W3Schools (2018). <span>W3Schools Online Web Tutorials.</span>
            Available at:
            <a href="https://www.w3schools.com/">https://www.w3schools.com/</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Wikipedia (2018). <span>Calgary Stampede.</span>
            Available at:
            <a href="https://en.wikipedia.org/wiki/Calgary_Stampede">https://en.wikipedia.org/wiki/Calgary_Stampede</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Wikipedia (2018). <span>Calgary Tower.</span>
            Available at:
            <a href="https://en.wikipedia.org/wiki/Calgary_Tower">https://en.wikipedia.org/wiki/Calgary_Tower</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Wikipedia (2018). <span>Calgary Zoo.</span>
            Available at:
            <a href="https://en.wikipedia.org/wiki/Calgary_Zoo">https://en.wikipedia.org/wiki/Calgary_Zoo</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Wikipedia (2018). <span>Glenbow Museum.</span>
            Available at:
            <a href="https://en.wikipedia.org/wiki/Glenbow_Museum">https://en.wikipedia.org/wiki/Glenbow_Museum</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Wikipedia (2018). <span>Heritage Park Historical Village.</span>
            Available at:
            <a href="https://en.wikipedia.org/wiki/Heritage_Park_Historical_Village">https://en.wikipedia.org/wiki/Heritage_Park_Historical_Village</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Wikipedia (2018). <span>Lake Louise, Alberta.</span>
            Available at:
            <a href="https://en.wikipedia.org/wiki/Lake_Louise,_Alberta">https://en.wikipedia.org/wiki/Lake_Louise,_Alberta</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Wikipedia (2018). <span>The Military Museums.</span>
            Available at:
            <a href="https://en.wikipedia.org/wiki/The_Military_Museums">https://en.wikipedia.org/wiki/The_Military_Museums</a>
            (Accessed: 20 December 2018).
        </p>
        <p>
            Wikipedia (2018). <span>WinSport.</span>
            Available at:
            <a href="https://en.wikipedia.org/wiki/WinSport">https://en.wikipedia.org/wiki/WinSport</a>
            (Accessed: 20 December 2018).
        </p>
    </section>
</main>

<?php echo generateFooter(); ?>