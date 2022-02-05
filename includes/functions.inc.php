<?php

function emptyInputSignup($fullname,$email,$username,$password,$passwordAgain){
    $result;
    if(empty($fullname)||empty($email)||empty($username)||empty($password)||empty($passwordAgain)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidUsername($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

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

function usernameAlreadyExists($conn,$username,$email){
    $sql = "select * from users where usersUsername = ? or usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
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

function createUser($conn,$fullname,$email,$username,$password){
    $sql = "insert into users (usersFullname, usersEmail, usersUsername, usersPassword) values (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedpw = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$fullname,$email,$username,$hashedpw);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php?error=none");
    exit();  
}

function emptyInputLogin($username,$password){
    $result;
    if(empty($username)||empty($password)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function logInUser($conn,$username,$password){
    $usernameExists= usernameAlreadyExists($conn,$username,$username);

    if($usernameExists===false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passhashed= $usernameExists["usersPassword"];
    $checkpass= password_verify($password,$passhashed);

    if($checkpass===false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }else if($checkpass===true){
        session_start();
        $_SESSION["usersId"]=$usernameExists["usersId"];
        $_SESSION["usersUsername"]=$usernameExists["usersUsername"];
        header("location: ../index.php");
        exit();
    }
}