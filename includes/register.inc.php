<?php

if(isset($_POST["submit"])){

    $fullname=$_POST["fullname"];
    $email=$_POST["email"];
    // $username=$_POST["username"];
    $telnumber=$_POST["telnumber"];
    $password=$_POST["password"];
    $passwordAgain=$_POST["passwordAgain"];

    require_once 'databasehandler.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($fullname,$email,/*$username*/$telnumber,$password,$passwordAgain)!==false){
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    /* if(invalidUsername($username)!==false){
        header("location: ../register.php?error=invalidusername");
        exit();
    } */
    if(invalidEmail($email)!==false){
        header("location: ../register.php?error=invalidemail");
        exit();
    }
    if(passwordMatch($password,$passwordAgain)!==false){
        header("location: ../register.php?error=passnotmatching");
        exit();
    }
    if(emailAlreadyExists($conn,/* $username */,$email)!==false){
        header("location: ../register.php?error=usernametaken");
        exit();
    }

    createUser($conn,$fullname,$email,/* $username */$telnumber,$password);


}
else{
    header("location: ../register.php");
    exit();
}