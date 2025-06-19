<?php
session_start();
require 'config.php';
require './lib/auth.php';

if (is_logged_in()){
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (strlen($password) < 6) {
        $error = 'Пароль должен быть 6 или больше символов';
    } else {
        // Проверка занятости логина или email
        $sql = 'SELECT COUNT(*) FROM bd WHERE login = ? OR email = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$login, $email]);

        if ($stmt->fetchColumn() > 0) {
            $error = 'Логин или E-mail уже занят';
        } else {
            // Всё ок, регистрируем
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = 'INSERT INTO bd (name, login, email, password) VALUES (?, ?, ?, ?)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $login, $email, $hashed_password]);

            // Получаем ID нового пользователя
            $sql = 'SELECT id FROM bd WHERE login = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$login]);
            $_SESSION['user_id'] = $stmt->fetchColumn();

            header('Location: index.php');
            exit;
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libra</title>
    <link rel="icon" type="image/png" href="img/icons/favicon.ico">
    
    <link rel="stylesheet" href="./style.css/registration.css">
    
</head>
<body>
    <main class="main__reg">
        <img src="./uploads/6.jpg" alt="" class="reglog_img" width="400">
        <form action="" class="form-reg" method="POST">
            
            <h1 class="form-title">Регистрация</h1>
            <label for="login">Логин</label>  <br>
            <input type="text" placeholder="Придумайте ваш логин" required  class="sign-up__input" name="login"> <br>
            <label for="login">Имя</label>  <br>
            <input type="text" placeholder="Придумайте ваш логин" required  class="sign-up__input" name="login"> <br>
            <label for="email" >E-mail</label> <br>
            <input type="email" placeholder="Адрес электренной почты" required class="sign-up__input" name="email"> <br>
            <label for="password">Пароль</label> <br>
            <input type="password" required class="sign-up__input" name="password"><br>
             <label for="password">Повторите Пароль</label> <br>
            <input type="password" required class="sign-up__input" name="password"><br>
            <input type="checkbox" style="width:16px" ><label>Запомнить меня</label>
            <!-- <div class="form-inner">
                
        
                
               
                <div class="login form-item">
                  
                </div>
                <div class="mail form-item">
                   
                </div>
                <div class="password form-item">
                    
                </div>
               
            </div> -->
           <br>
            <button type="submit" class="btn2-large btn">Регистрация</button>

            <p>Уже есть учетная запись? <a href="auth.html" class="reglog__link">Войти</a></p>
        </form>
       
    </main>
</body>
</html>