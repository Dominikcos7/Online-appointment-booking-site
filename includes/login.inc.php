<?php

if(isset($_POST["submit"])){
    /* $username */$email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'databasehandler.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin(/* $username */$email,$password)!==false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    logInUser($conn,/* $username */$email,$password);    
}else{
    header("location: ../login.php");
    exit();
}