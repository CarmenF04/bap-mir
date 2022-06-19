<?php
require 'functions.php';
$connection = dbConnect();

if( !isset($_GET['id'])) {
    echo "De ID is niet gezet";
    exit;
}

$id = $_GET['id'];
$check_int = filter_var($id, FILTER_VALIDATE_INT);
if($check_int == false){
    echo "dit is geen getal";
    exit;
}



$id = $_GET['id'];
filter_var($id, FILTER_VALIDATE_INT);

$statement = $connection->prepare('SELECT * FROM `sieraden` WHERE id=?');

$params = [$id];
$statement->execute($params);
$jewellery = $statement->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewellery</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Mukta:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container jewellery-details">
        <h1>Nieuwe Sieraden</h1>
        <section>
            <article class="jewellery-info">
                <header>
                    <h2><?php echo $jewellery['titel']?></h2>
                    <h3><?php echo $jewellery['beschrijving']?></h3>
                </header>
                <hr>
                <a href="contact.php" class="link-button">neem contact op</a>
                <hr>
                <figure">
                <img src="img/<?php echo $jewellery['foto']?>" alt="">
                    <em><?php echo $jewellery['prijs']?></em>
                </figure>
                <p>
                    Beschrijving
                </p>
                <hr>
                <a href="index.php">Terug naar het overzicht</a>
            </article>
        </section>
        
    </div>
</body>
</html>