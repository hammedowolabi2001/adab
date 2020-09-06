<?php
//error_reporting(E_ALL &~ E_NOTICE);
$host= 'z8dl7f9kwf2g82re.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username='cvf2t27kpj5m65sb';
$password='	nnnfpk5zfzk7zmdl';
$db= 'zvprmsw42f8y7jh2';

$connect= mysqli_connect($host, $username, $password,$db);
if($connect){
    echo 'connected';
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






