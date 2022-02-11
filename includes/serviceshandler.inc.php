<?php

$selectedServices_noiFodraszat;
$selectedServices_ferfiFodraszat;
$selectedServices_gyerekFodraszat;
$selectedServices_mukorom;



if(isset($_POST["submit-noi-fodraszat"])){
    $selectedServices_noiFodraszat=$_POST["noi-fodraszat-szolg[]"];
}

if(isset($_POST["submit-ferfi-fodraszat"])){
    $selectedServices_ferfiFodraszat=$_POST["ferfi-fodraszat-szolg[]"];
}

if(isset($_POST["submit-gyerek-fodraszat"])){
    $selectedServices_gyerekFodraszat=$_POST["gyerek-fodraszat-szolg[]"];
}

if(isset($_POST["submit-mukorom"])){
    $selectedServices_mukorom=$_POST["mukorom-szolg[]"];
}

