<?php
    require_once('admin/connect.php');

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    $sql = "SELECT * FROM article ORDER BY `article`.`id_article` DESC";
    $result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ZSEEiM Bielsko-Biała - oficjalna strona samorządu szkolnego">
    <meta name="keywords" content="ZSSEiM, Bielsko, Bielsko-Biała, Szkoła Bielsko, Samorząd ZSEEiM, Samorząd szkolny">
    <title>Samorząd Szkolny ZSEEiM</title>

    <!-- icona -->
    <link rel="icon" href="img/icon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    
    <!-- animation CSS -->
    <link rel="stylesheet" href="animation.css">

    <!-- responsywność CSS -->
    <link rel="stylesheet" href="responsive.css">
    
</head>
<body>
    <!-- Główny kontener -->
    
    <!-- Nawigacja -->
    <nav></nav>
    
    <main>
        <!-- Treść strony -->
        <content>

            <!-- Strona Główna -->
            <div id="glowna-display">

                <h1>Samorząd Uczniowski ZSEEiM w Bielsku-Białej</h1>
                <p>Strona główna Samorządu Uczniowskiego <b>Zespołu Szkół Elektronicznych, Elektrycznych i Mechanicznych</b> stworzona przez klasę 1TP (technik programista) z okazji dnia otwartego 26 kwietnia 2022 roku.</p>

                <?php
                    while($row = $result->fetch_assoc())
                    {
                ?>

                <a href="aktualnosci.php#<?php echo $row['title'];?>">
                    <article class="article-glowna">
                        <img class="img-article" src="article-img/<?php echo $row['img'];?>">
                        <div class="title text-article"><?php echo $row['title'];?></div>
                        <div class="text text-article"><?php echo $row['subtitle'];?></div>
                    </article>
                </a>

                <?php 
                    }
                ?>

            </div>
                <!-- <?php
                    include ("akualnosci.php");
                ?> -->

        </content>
    </main>

    <!-- JS -->
    <script src="script.js"></script>

    <!-- NAV -->
    <script>
        createNav(1);
    </script>
</body>
</html>