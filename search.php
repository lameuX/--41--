<?php
require_once './config.php';

$query = $_GET['q'] ?? '';
$books = [];

if ($query !== '') {
    $stmt = $pdo->prepare("SELECT * FROM books where title LIKE :query OR author LIKE :query OR genre LIKE :query");
    $stmt->execute(['query' => "%$query%"]);
    $books = $stmt->fetchAll();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css/main.css">
    <link rel="stylesheet" href="./style.css/search.css">
</head>
<body>
    <?php  require_once './blocks/header.php'?>
    <main class="main">
        <section>
            <div class="container">
                <div class="go-back">
                    <a href="./index.php">< На главную</a>
                </div>
                    <section class="books">
                <?php if (empty(($books))): ?>
                    <p>NO book</p>
                <?php else: ?>
            <ul class="books-list">
                <?php foreach ($books as $book): ?>
                <li class="books-item">
                    <a href="/book.php?id=<?= $book['id'] ?>" class="books-item__link">
                        <p class="books-item__price"><?php echo htmlspecialchars($book['price']) ?></p>
                        <img src="<?php echo htmlspecialchars($book['img']) ?>" alt="" class="book-item__img" width="180" height="275">
                        <h2 class="books-item__title"><?php echo htmlspecialchars($book['title']) ?></h2>
                        <p class="books-item__author"><?php echo htmlspecialchars($book['author']) ?></p>
                    </a>
                   
                </li>
                <?php endforeach; ?>
            </ul>
                <?php endif ?>
          
        </section>
            </div>
        </section>
    </main>
</body>
</html>