<?php
require 'functions.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `sieraden` ')

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Database</title>
</head>

<body>

    <?php foreach($result as $row): ?>

    <article class="card">

        <h2><?php echo $row['titel'];?></h2>
        
        <figure class="card__figure">
            <img src="/img/<?php echo $row['foto'];?>" alt="dure ring">
        </figure>

        <section class="card__body">

            <header>
                <h2 class="card__heading"><?php echo $row['beschrijving'];?></h2>
            </header>
            <em><?php echo $row['prijs'];?></em>
            <p class="card__p"><?php echo $row['beschrijving'];?></p>
            
            <a href="details.php">Meer info</a>
            
        </section>
   </article>
   
   <?php endforeach; ?>
</body>

</html>