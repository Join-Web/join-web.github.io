<?php

    session_start();

    if((!isset($_POST['login']) || !isset($_POST['password'])))
    {
        header('Location: login.php');
        exit();
    }

    require_once "connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    if ($connection->connect_errno!=0)
    {
        echo "Error: ".$connection->connect_errno;
    }
    else
    {
        $login =$_POST['login'];
        $password =$_POST['password'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");

        $sql = "SELECT * FROM users WHERE username='$login' AND password='$password'";

        if ($result = @$connection->query(
        sprintf("SELECT * FROM users WHERE username='%s' AND password='%s'",
        mysqli_real_escape_string($connection,$login),
        mysqli_real_escape_string($connection,$password)
        )))
        {
            $how_many_users = $result->num_rows;
            
            if($how_many_users>0)
            {
                $_SESSION['login'] = true;

                $row = $result->fetch_assoc();

                $_SESSION['id_user'] = $row['id_user'];

                $_SESSION['username'] = $row['username'];

                unset($_SESSION['error_login']);

                $result->close();
                header('Location: ../admin.php');
            }
            else
            {
                $_SESSION['error_login'] = '<span style="color:red">Nieprawidłowy login lub hasło</span>';
                header('Location: login.php');
            }
        }

        $connection->close();
    }
?>