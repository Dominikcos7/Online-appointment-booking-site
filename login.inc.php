<?php

if(isset($_POST["submit"])){
    $username = $_POST["nameoremail"];
    $password = $_POST["password"];

    require_once 'databasehandler.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username,$password)!==false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    logInUser($conn,$username,$password);    
}else{
    header("location: ../login.php");
    exit();
}