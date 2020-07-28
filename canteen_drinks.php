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

<body>
<header>
    <h1>WGC Canteen</h1>
    <nav>
        <ul>
            <a href='home.php'> HOME </a>
            <a href='items.php'> ITEMS </a>
            <a href='canteen_drinks.php'> DRINKS </a>
            <a href='weekly_specials.php'> WEEKLY SPECIALS </a>
        </ul>
    </nav>
</header>
