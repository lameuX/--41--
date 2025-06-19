<?php

try{
    $pdo = new PDO('mysql:host=127.127.126.31;port=3306;dbname=one', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES utf8mb4');
} catch (PDOException $e) {
    die('шибка к бд' . $e->getMessage());
}

?>