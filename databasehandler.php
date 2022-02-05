<?php

$serverName="localhost";
$dBUsername="root";
$dBPassword="";
$dBName="anya_fodraszat_felhasznalok";

$conn=mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);

if(!$conn){
    die("Couldn't connect to database: " . mysqli_connect_error());
}