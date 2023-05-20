<?php
$server = 'localhost';
$db_name = 'tarifadreams';
$user = 'root';
$pass = '';

$cliente_enviado = isset($_GET);
try{
    $pdo = new PDO("mysql:host=$server;dbname=$db_name", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    $message = $e->getMessage();
    echo $message;
}