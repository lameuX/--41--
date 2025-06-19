<?php
session_start();
require_once('database.php');

$login = trim($_POST['login']);
$password = trim($_POST['password']);

//SQL запрос
$sql = "SELECT login, password FROM bd WHERE login = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Ошибка подготовки запроса: " . $conn->error);
}

$stmt->bind_param("s", $login);
$stmt->execute();

// Получаем результат
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Проверяем, найден ли пользователь
if ($user && password_verify($password, $user['password'])) {
    setcookie('login', $login, time() + 3600 * 24 * 30, "/");
    header("Location: index.php");
    exit();
} else {
    echo "Ошибка: Неверный логин или пароль!";
}

$stmt->close();
$conn->close();
?>
