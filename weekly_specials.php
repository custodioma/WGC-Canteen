<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_cafe1");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
    die();
} else {
    echo "connected to database";
}


?>

<!DOCTYPE html>

<head>

    <title>WGC Canteen</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='canteen.css'

</head>

<div class="section">
    <div class="container5">
        <h1>Weekly Specials</h1>
        <nav>
            <ul>
                <a href='index.php'> HOME </a>
                <a href='items.php'> ITEMS </a>
                <a href='canteen_drinks.php'> DRINKS </a>
                <a href='weekly_specials.php'> WEEKLY SPECIALS </a>
            </ul>
        </nav>
    </div>
</div>

<body>
<header>

</header>

<hr>
</nav>
</div>
</div>

<div class="section divider-home"></div>
<div class="section">
    <div class="container">

        <img class="center w80" src="houseicon.png" alt=" white house icon">

        <h3>About us</h3>

        <p>Central Cafe came together with an idea to create a laid back and cozy environment fror anyone to break away from the buzz of work and the city. Perfect for a relaxed lunch with the gang a work or a nice lunch with the family. We're open 24 hours so there's never a bad time to pop in for a cup of coffee!</p>

        <div class="container6">
            <nav>
                <a href="aboutus.html">Our Story >></a>
            </nav>
        </div>

    </div>

</div>

<div class="section divider-location"></div>
<div class="section">
    <div class="container">


        <img class="center w80" src="pinicon.png" alt=" white location pin icon">


        <h2>Location</h2>

        <p>Our cafe is loacted in a cozy corner, in the heart of Wellington if town just a few metres away from the hustle and bustle of the city. Not too far, but not too close either!</p>

        <div class="container3">
            <nav>
                <a href="location.html">Where to find us >></a>
            </nav>
        </div>

    </div>

    <div class="section divider-menu"></div>
    <div class="section">
        <div class="container">


            <img class="center w80" src="coffeeicon.png" alt="white coffee cup icon">

            <h4>Menu</h4>

            <p>We provide a range of different meals to suit your everyday needs. A quick on the go breakfast, lunch with the family or collegues or a warm drink to start the day. We have meals to satisfy all ages, don't worry we've got everything covered!</p>

            <div class="container4">
                <nav>
                    <a href="menu.html">View our menu >></a>
                </nav>
            </div>
        </div>
    </div>
</div>
</html>

