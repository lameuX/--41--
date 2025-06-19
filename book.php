<?php 
require './config.php';

$book_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$sql = 'SELECT id, img, title, author, description, genre, year, price
        FROM books WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$book_id]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$book) {
    die('Книга не найдена');
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libra</title>
    <link rel="stylesheet" href="./style.css/main.css">
    <link rel="stylesheet" href="./style.css/book.css">
</head>
<body>
    <?php require_once"./blocks/header.php" ?>
    <main class="main-book">
        <div class="container">
                  <div class="go-back">
                    <a href="./index.php">< На главную</a>
                  </div>
                  <section class="book-page">
                        <div class="book-page__up">
                            <img src="<?php echo htmlspecialchars($book['img']); ?>" alt="<?php echo htmlspecialchars($book['title']);?>"  width="285" height="450" class="book-page__img">
                            <div class="book-page__inner">
                                 <p class="book-page__author">Ольга Белякова</p>
                                 <h1 class="book-page__title"><?php echo htmlspecialchars($book['title']);?></h1>
                                 <p class="book-page__price">Цена</p>
                                 <p class="book-page__num"><?php echo htmlspecialchars($book['price']);?></p>
                            </div>
                        </div>
                        <div class="book-page__info">
                            <div class="book-page__actions">
                             <a href="#" class="book-page__buy">Купить</a>
                            <form action="#">
                                <input type="hidden" name="book_id">
                                <button type="submit" class="bookmark-btn">Добавить в мои книги</button>
                            </form>
                            <form action="#">
                                <input type="hidden" name="book_id">
                                <button type="submit" class="cart-btn">В корзину</button>
                            </form>
                            </div>  
                            <div class="book-page__info-inner">
                                <div class="page-info__l"> 
                                    <h2 class="page-info__heading">Описание</h2>
                                    <p class="page-info__text">
                                        <?php echo htmlspecialchars($book['description']) ?>
                                    </p>
                                </div>
                                <div class="page-info__r">
                                    <h2 class="page-info__heading">Детали</h2>
                                    <ul class="book-info__list">
                                    <li class="book-info__item">Год:<?php echo htmlspecialchars($book['year']) ?></li>
                                    <li class="book-info__item">Жанр:<?php echo htmlspecialchars($book['genre']) ?></li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        

                  </section>
        </div>
        
        
    </main>
     <?php require_once"./blocks/footer.php" ?>
</body>
</html>