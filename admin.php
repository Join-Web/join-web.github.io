<?php
    session_start();

    if(!isset($_SESSION['login']))
    {
        header('Location: admin/login.php');
        exit();
    }

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
    
    <!-- responsywność CSS -->
    <link rel="stylesheet" href="responsive.css">
    
</head>
<body>
    <!-- Główny kontener -->
    <main>
        <!-- Treść strony -->
        <content>

            <a href="admin/logout.php">Wyloguj</a>

            <h1>Artykuły</h1>

            <form action="admin/article.php" method="POST" enctype="multipart/form-data">
                <article class="aktualnosci">

                    <h1>Dodaj Artykuł</h1>

                    <textarea cols="50" rows="10" name="id" style="display: none;"></textarea>

                    Tytuł:
                    <br><br>
                    <textarea cols="50" rows="10" class="CKEtitle" name="title"></textarea>
                    
                    <br><br>

                    Text (wyświetlany na Stronie głównej):
                    <br><br>
                    <textarea cols="50" rows="10" class="CKEsubtitle" name="subtitle"></textarea>
                    <br><br>

                    Text (wyświetlany w Aktualnościach):
                    <br><br>
                    <textarea cols="50" rows="10" class="CKEtext" name="text"></textarea>
                    <br><br>

                    Zdjęcie:
                    <br>
                    <input type="file" name="img" class="submit">
                    <br><br><br>

                    <input type="submit" name="insert" value="Dodaj" class="submit">
                </article>
            </form>


            
            <?php
                $nr = 0;

                while($row = $result->fetch_assoc())
                {
            ?>
            <form action="admin/article.php" method="POST" enctype="multipart/form-data">
                <article class="aktualnosci">

                    <textarea cols="50" rows="10" name="id" style="display: none;"><?php echo $row['id_article'];?></textarea>

                    <h1><?php echo $nr = $nr + 1;?></h1>

                    Tytuł:
                    <br><br>
                    <textarea cols="50" rows="10" class="CKEtitle" name="title"><?php echo $row['title'];?></textarea>
                    
                    <br><br>

                    Text (wyświetlany na Stronie głównej):
                    <br><br>
                    <textarea cols="50" rows="10" class="CKEsubtitle" name="subtitle"><?php echo $row['subtitle'];?></textarea>
                    <br><br>

                    Text (wyświetlany w Aktualnościach):
                    <br><br>
                    <textarea cols="50" rows="10" class="CKEtext" name="text"><?php echo $row['article'];?></textarea>
                    <br><br>

                    Zdjęcie:
                    <br>
                    <input type="file" name="img" class="submit">
                    <br>
                    <?php echo $row['img'];?>
                    <br><br><br>

                    <input type="submit" name="update" value="Zapisz" class="submit">
                </article>
            </form>
            <?php 
                }
            ?>            

        </content>
    </main>
    
    <!-- CKEditor -->
    <script src="CKEditor/build/ckeditor.js"></script>

    <!-- JS -->
    <script src="script.js"></script>
</body>
</html>