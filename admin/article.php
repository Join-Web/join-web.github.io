<?php

        if (isset($_POST['update']) || isset($_POST['insert']))
        {
                if (isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['text']) && isset($_FILES['img']))
                {
                
        

                        require_once('connect.php');

                        $connection = @new mysqli($host, $db_user, $db_password, $db_name);

                        

                        $id = $_POST['id'];

                        $title = $_POST['title'];
                        $subtitle = $_POST['subtitle'];
                        $text = $_POST['text'];
                
                        $imgName = $_FILES['img']['name'];
                        $imgTmpName = $_FILES['img']['tmp_name'];
                        $imgError = $_FILES['img']['error'];
                        $imgType = $_FILES['img']['type'];

                        $imgExt = explode('.', $imgName);
                        $imgActualExt = strtolower(end($imgExt));
                        $allowed = array('jpg', 'jpeg', 'png');

                        if(in_array($imgActualExt, $allowed))
                        {
                                if($imgError === 0)
                                {
                                        $img = uniqid('', true).'.'.$imgActualExt;

                                        $imgWhere = '../article-img/'.$img;

                                        move_uploaded_file($imgTmpName, $imgWhere);

                                        $imgUpload = '0';
                                }
                                else
                                {
                                        echo 'Nie udało się wysłać pliku!';
                                }
                        }
                        else
                        {
                                echo "Nieprawidłowy typ pliku!";
                        }

                        if (isset($_POST['update']))
                        {
                                $sql = "UPDATE article SET title = '".$title."', subtitle = '".$subtitle."', article = '".$text."', img = '".$img."' WHERE id_article = ".$id.";";
                        }
                        else
                        {
                                $sql = "INSERT INTO article(title, subtitle, article, img) VALUES ('".$title."', '".$subtitle."', '".$text."', '".$img."');";
                        }
                        
                        

                        mysqli_query($connection, $sql);

                        if(isset($imgUpload) && $imgUpload === '0')
                        {
                                header('Location: ../admin.php?SUCCES'.$title);
                                exit();
                        }

                }
                else
                {
                        echo "Nieuzupełniono któregoś pola!";
                }
        }
        else
        {
                header('Location: ../admin.php');
                exit(); 
        }
?>