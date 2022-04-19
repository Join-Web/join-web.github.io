<?php
    session_start();

    if(isset($_SESSION['login']) && $_SESSION['login']==true)
    {
        header('Location: ../admin.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>

    <!-- CSS material -->
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">

    <!-- icona -->
    <link rel="icon" href="../img/icon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="../style.css">
    
    <!-- responsywność CSS -->
    <link rel="stylesheet" href="../responsive.css">

</head>
<body>

<main>
        <!-- Treść strony -->
        <content>

            <!-- Logowanie -->
            <h1>Logowanie</h1>

            <form action="logintodb.php" method="POST">

                <label class="mdc-text-field mdc-text-field--outlined">
                <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                    <span class="mdc-floating-label" id="my-label-id">Login</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                </span>
                <input type="text" class="mdc-text-field__input" aria-labelledby="my-label-id" name="login" required>
                </label>

                <br><br>

                <label class="mdc-text-field mdc-text-field--outlined">
                <span class="mdc-notched-outline">
                    <span class="mdc-notched-outline__leading"></span>
                    <span class="mdc-notched-outline__notch">
                    <span class="mdc-floating-label" id="my-label-id">Hasło</span>
                    </span>
                    <span class="mdc-notched-outline__trailing"></span>
                </span>
                <input type="password" class="mdc-text-field__input" aria-labelledby="my-label-id" name="password" required>
                </label>

                <br><br>

                <input type="submit" value="Zaloguj się" class="submit">

                <br><br>

            </form>

            <?php
                if(isset($_SESSION['error_login']))
                {
                    echo $_SESSION['error_login'];
                }
            ?>

        </content>
    </main>
    
    

    <!-- script material -->
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>

    <!-- JS -->
    <script src="../script.js"></script>
</body>
</html>