
<?php 
require './blocks/header.php';
require './config.php';


$stmt = $pdo->query("SELECT * FROM books LIMIT 10");
$books = $stmt->fetchAll();


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
   
    <main class="main">
        <div class="container">
                    <section class="books">
        
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
        
           
        </section>
        </div>
        
        
    </main>
     <?php require_once"./blocks/footer.php" ?>
</body>
</html>