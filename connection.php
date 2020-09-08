<?php
//error_reporting(E_ALL &~ E_NOTICE);
$host= '	w1h4cr5sb73o944p.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username='	vglylwnlf5knn5xo';
$password='	zdpj1llx2epg4p4d';
$db= 'nawo9h56r5tew9tf';

$connect= mysqli_connect($host, $username, $password,$db);
if($connect){
    echo 'connected';
}else{
    echo mysqli_error();
}

$createTb = "CREATE TABLE students (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    names VARCHAR(100) NOT NULL,
    matric VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    gender VARCHAR(20) NOT NULL,
    class VARCHAR(100) NOT NULL,
    Images VARCHAR(100) NOT NULL
)";
$query = mysqli_query($connect, $createTb);
if($query){
    echo 'Table created successfully';
}






