<?php
session_start();
require "/OSPanel/home/demo-one/one/lib/auth.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libra</title>
    <link rel="stylesheet" href="./style.css/main.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-inner">
                <a href="#" class="logo">
                    <p class="logo-name">libra</p>
                </a>
                <ul class="nav">
                    <li class="nav-item">
                        Все книги \/
                        <div class="dropdown">
                            <ul class="dropdown-content">
                                <li class="dropdown-content__item">
                                    <a href="#">Лучшие</a>
                                </li>
                                <li class="dropdown-content__item">
                                    <a href="#">Новые</a>
                                </li>
                                <li class="dropdown-content__item">
                                    <a href="#">Популярные</a>
                                </li>
                                <li class="dropdown-content__item">
                                    <a href="#">Случайные</a>
                                </li>
                                <div class="dropdown-genre">
                                    <p>По жанру</p>
                                    <ul class="dropdown-genre__list">
                                       
                                        <li class="dropdown-genre__item">
                                        <a href="#">Фикшн</a>
                                        </li>
                                        <li class="dropdown-genre__item">
                                        <a href="#">Нон-фикшн</a>
                                        </li>
                                        <li class="dropdown-genre__item">
                                        <a href="#">Сайнс-фикшн</a>
                                        </li>
                                    </ul> 
                                </div>
                                 
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href=""> Мои книги</a>
                    </li>
                    <li class="nav-item">
                        <a href=""> Корзина </a>
                    </li>
                </ul>
                <div class="search-bar">
                    <img src="./img/lupa.png" alt="" width="16px" height="16px">
                    <form action="../search.php"  class="search-form">
                        <input type="text" name="q" class="search-input" required placeholder="Поиск книг...">
                    </form>
                </div>
                <div class="user-actions">
                     <?php if (is_logged_in()): ?>
                             <a href="../lib/logout.php" class="user-actions__out">Выйти</a>
                    <?php else: ?>
                        <a href="#" class="user-actions__log">Вход</a>
                        <a href="../regform.php" class="user-actions__reg">Регистрация</a>
                    <?php endif;?>
                    
                   
                  
                </div>
                
            </div>
        </div>
        
    </header>
                    
   
</body>
</html>