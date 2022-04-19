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
            <h1>Aktualności</h1>

            <?php
                while($row = $result->fetch_assoc())
                {
            ?>

            <article id="<?php echo $row['title'];?>" class="aktualnosci">
            
                <div class='h1'><?php echo $row['title'];?></div>

                    <table class="normal">
                        <tr>
                            <td>
                                <img src="article-img/<?php echo $row['img'];?>"  class="img-aktualnosci" alt="">
                            </td>
                            <td>
                                <?php echo $row['article'];?>
                            </td>
                        </tr>
                    </table>
                    <div class="mobile-version">
                        <img src="article-img/<?php echo $row['img'];?>"  class="img-aktualnosci" alt="">
                        <?php echo $row['article'];?>
                    </div>
            </article>

            <?php 
                }
            ?>

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