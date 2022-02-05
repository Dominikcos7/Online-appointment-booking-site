<?php

function emptyInputSignup($fullname,$email,/* $username */$telnumber,$password,$passwordAgain){
    $result;
    if(empty($fullname)||empty($email)||empty(/* $username */$telnumber)||empty($password)||empty($passwordAgain)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

/* function invalidUsername($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
} */

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function passwordMatch($password,$passwordAgain){
    $result;
    if($password!== $passwordAgain){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function emailAlreadyExists($conn,/* $username */,$email){
    $sql = "select * from users where usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s",/* $username */,$email);
    mysqli_stmt_execute($stmt);

    $resultData= mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result=false;
        return $result;        
    }

    mysqli_stmt_close($stmt);
    
}

function createUser($conn,$fullname,$email,/* $username */$telnumber,$password){
    $sql = "insert into users (usersFullname, usersEmail, usersTelnumber, usersPassword) values (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedpw = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$fullname,$email,/* $username */$telnumber,$hashedpw);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php?error=none");
    exit();  
}

function emptyInputLogin(/* $username */$email,$password){
    $result;
    if(empty(/* $username */$email)||empty($password)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function logInUser($conn,/* $username */$email,$password){
    $emailExists= emailAlreadyExists($conn,/* $username,$username */,$email);

    if($emailExists===false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passhashed= $emailExists["usersPassword"];
    $checkpass= password_verify($password,$passhashed);

    if($checkpass===false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }else if($checkpass===true){
        session_start();
        $_SESSION["usersId"]=$emailExists["usersId"];
        $_SESSION["usersEmail"]=$emailExists["usersEmail"];
        header("location: ../index.php");
        exit();
    }
}