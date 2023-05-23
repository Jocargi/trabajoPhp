<?php
$server = 'localhost';
$db_name = 'tarifadreams';
$user = 'root';
$pass = '';

$pdo = null;
try{
    $pdo = new PDO("mysql:host=$server;dbname=$db_name;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    exit($e->getMessage());
}