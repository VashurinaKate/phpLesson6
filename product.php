<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="scss/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>

<?php 
    include('blocks/header.php');
?>

<div class="main">
    <section class="products center">
        <div class="proddetail__wrap">
        <?php
            include('config.php');
            $id = $_GET['id'];
            $sql = "select * from goods where id=$id";
            $res = mysqli_query($connect, $sql);
            while($data = mysqli_fetch_assoc($res)):?>
            <div class="proddetail">
                <div class="proddetail__img">
                    <img src="images/products/<?= $data['img']?>" alt="product">
                </div>
                <div class="proddetail__body">
                    <h3 class="proddetail__name"><?= $data['title']?></h3>
                    <div class="rating">
                        <h4>Rating: <?= $data['rating']?></h4>
                        <p class="reviews">(5 отзывов)</p>
                    </div>
                    <p class="proddetail__price">&#8381;<?= $data['price']?></p>
                    <div class="proddetail__text"><p> <?= $data['shortinfo']?></p></div>
                    <div class="proddetail__form">
                        <label for="quantity">Количество</label>
                        <input type="number" id="quantity" step="1" min="1" value="1">
                        <a href="#" class="btn btn--solid">Добавить в корзину</a>
                    </div>
                    <div class="proddetail__bottom">
                        <span>Категория:</span> <a href="" class="proddetail__category">Камеры безопасности</a>
                    </div>
                </div>
            </div>
            <div class="proddetail__tab">
                <div class="proddetail__tabheader">
                    <div class="proddetail__tabheader-item active">Описание</div>
                    <div class="proddetail__tabheader-item">Отзывы (5)</div>
                </div>
                <div class="proddetail__tabcontent fade">
                    <h3>Описание</h3>
                    <p> <?= $data['info']?></p>
                </div>
                <div class="proddetail__tabcontent fade">
                    <h3>5 отзывов на <?=$data['title']?></h3>
            
                    <div class="proddetail__reviews">
                        <?php
                            $sql_reviews = "select * from reviews where good_id=$id";
                            $res_reviews = mysqli_query($connect, $sql_reviews);
                            while($reviews = mysqli_fetch_assoc($res_reviews)):
                            ?>
                        <div class="proddetail__review-item">
                            <div class="proddetail__userphoto">
                                <img src="images/users/1.jpg" alt="user-photo">
                            </div>
                            <div class="proddetail__review-body">
                                <div class="proddetail__review-info">
                                    <div><span class="user-name"><?= $reviews['user_name']?></span> <span class="review-date"> &mdash;   April 3, 2021</span></div>
                                    <div class="rating">
                                        rating: <?= $reviews['user_rating']?>
                                    </div>
                                </div>
                                <div class="proddetail__review-text">
                                    <p><?= $reviews['user_text']?></p>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="proddetail__review-form">
                        <p>Добавьте отзыв о товаре</p>
                        <p>Обязательные поля отмечены *</p>
                        <?php 
                            include('blocks/reviewform.php');
                        ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php 
            include('blocks/sidebar.php');
        ?>
    </section>
</div>
<?php 
    include('blocks/footer.php');
?>
<script src="js/tabs.js"></script>