<?php
$host = "localhost"; // atau alamat IP server database Anda
$username = "root"; // username untuk mengakses database
$password = ""; // password untuk mengakses database
$dbname = "contactapp"; // nama database

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn ->connect_error){
    die;
}

   
?>