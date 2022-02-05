<?php
session_start();
?>

<!DOCTYPE html>
<html lang="HU">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Főoldal</title>
</head>
<body>
    <div class="header">
        <div class="header-right">
            <a href="index.php">Főoldal</a> 
            <?php
                if(isset($_SESSION["usersEmail"])){
                    echo'<a href="profile.php">Profil</a>';
                    echo'<a href="includes/logout.inc.php">Kijelentkezés</a>';
                }else{
                    echo"<a href='login.php'>Bejelentkezés</a>";
                    echo"<a href='register.php'>Regisztráció</a>";
                }
            ?>            
        </div>
    </div>