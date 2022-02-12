<?php

$services=array();

if(isset($_POST["submit-szolgaltatasok"])){

    if(isset($_POST["noi-fodraszat-szolg"])){
       foreach($_POST["noi-fodraszat-szolg"]as$value){
        $services[]=$value;
        } 
    }

    if(isset($_POST["ferfi-fodraszat-szolg"])){
        foreach($_POST["ferfi-fodraszat-szolg"]as$value){
         $services[]=$value;
         } 
     }

     if(isset($_POST["gyerek-fodraszat-szolg"])){
        foreach($_POST["gyerek-fodraszat-szolg"]as$value){
         $services[]=$value;
         } 
     }

     if(isset($_POST["mukorom-szolg"])){
        foreach($_POST["mukorom-szolg"]as$value){
         $services[]=$value;
         } 
     }

     if(isset($_POST["hajkezeles-szolg"])){
        foreach($_POST["hajkezeles-szolg"]as$value){
         $services[]=$value;
         } 
     }
}

foreach($services as $value){
    echo $value."<br>";
}


