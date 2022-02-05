<?php

function emptyInputSignup($fullname,$email,$telnumber,$password,$passwordAgain){
    $result;
    if(empty($fullname)||empty($email)||empty($telnumber)||empty($password)||empty($passwordAgain)){
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

function emailAlreadyExists($conn,$email){
    $sql = "select * from users where usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s",$email);
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

function createUser($conn,$fullname,$email,$telnumber,$password){
    $sql = "insert into users (usersFullname, usersEmail, usersTelnumber, usersPassword) values (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedpw = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$fullname,$email,$telnumber,$hashedpw);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php?error=none");
    exit();  
}

function emptyInputLogin($email,$password){
    $result;
    if(empty($email)||empty($password)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function logInUser($conn,$email,$password){
    $emailExists= emailAlreadyExists($conn,$email);

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