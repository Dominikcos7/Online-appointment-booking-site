<?php
session_start();
?>

<!DOCTYPE html>
<html lang="HU">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');</style>
    <link rel="stylesheet" href="style.css">
    <title>Főoldal</title>
</head>
<body>
    <header>
        <div class="container">
            <img src="img/pngegg (1).png" class="logo"> 

            <nav>
                <ul>
                    <li><a href="index.php">Főoldal</a></li>
                    <li><?php 
                            if(isset($_SESSION["usersEmail"]))
                            echo'<a href="profile.php">Profil</a>';
                            else
                            echo'<a href="register.php">Regisztráció</a>';
                    ?></li>
                    <li><?php 
                            if(isset($_SESSION["usersEmail"]))
                            echo'<a href="includes/logout.inc.php">Kijelentkezés</a>';
                            else
                            echo'<a href="login.php">Bejelentkezés</a>';
                    ?></li>
                </ul>
            </nav>
        </div>
    </header>