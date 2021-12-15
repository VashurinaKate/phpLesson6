<?php
$id = (int)$_GET['id'];
include_once("../models/db_goods.php");
include_once("../models/db_reviews.php");
$good = getGood($connect, $id);
?>
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
    include('../blocks/header.php');
?>

<div class="main">
    <section class="products center">
        <div class="proddetail__wrap">
            <div class="proddetail">
                <div class="proddetail__img">
                    <img src="images/products/<?= $good['img']?>" alt="product">
                </div>
                <div class="proddetail__body">
                    <h3 class="proddetail__name"><?= $good['title']?></h3>
                        <div class="rating">
                            <?php 
                            $fas = "fas";
                            $far = "far";
                            for($i = 0; $i < 5; $i++){
                                if($i >= $good['rating']):?>
                                <svg aria-hidden="true" focusable="false" data-prefix="<?=$far?>" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                            <?php
                                elseif ($i < $good['rating']):?>
                                    <svg aria-hidden="true" focusable="false" data-prefix="<?=$fas?>" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                            <?php endif;
                            }; ?>
                        <p class="reviews">(<?= $good['review_count']?> отзывов)</p>
                    </div>
                    <p class="proddetail__price">&#8381;<?= $good['price']?></p>
                    <div class="proddetail__text"><p> <?= $good['shortinfo']?></p></div>
                    <form action="../models/db_cart.php?id=<?=$good['id']?>" method="post" enctype="multipart/form-data" class="proddetail__form">
                        <label for="quantity">Количество</label>
                        <input type="number" name="quantity" id="quantity" step="1" min="1">
                        <input type="submit" name="submit_good_to_cart" class="btn btn--solid" value="Добавить в корзину">
                    </form>
                    <div class="proddetail__bottom">
                        <span>Категория:</span> <a href="" class="proddetail__category">Камеры безопасности</a>
                    </div>
                </div>
            </div>
            <div class="proddetail__tab">
                <div class="proddetail__tabheader">
                    <div class="proddetail__tabheader-item active">Описание</div>
                    <div class="proddetail__tabheader-item">Отзывы (<?= $good['review_count']?>)</div>
                </div>
                <div class="proddetail__tabcontent fade">
                    <h3>Описание</h3>
                    <p> <?= $good['info']?></p>
                </div>
                <div class="proddetail__tabcontent fade">
                    <h3><?= $good['review_count']?> отзывов на <?=$good['title']?></h3>
            
                    <div class="proddetail__reviews">
                        <?php
                        $reviews = getReviews($connect, $id);
                        if($reviews) {
                            foreach ($reviews as $review):?>
                        <div class="proddetail__review-item">
                            <div class="proddetail__userphoto">
                                <img src="images/users/1.jpg" alt="user-photo">
                            </div>
                            <div class="proddetail__review-body">
                                <div class="proddetail__review-info">
                                    <div><span class="user-name"><?= $review['user_name']?></span> <span class="review-date"> &mdash; <?= $review['date_of_create']?></span></div>
                                    <div class="rating">
                                        rating: <?= $review['user_rating']?>
                                    </div>
                                </div>
                                <div class="proddetail__review-text">
                                    <p><?= $review['user_text']?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                            endforeach;
                        };?>
                    </div>
                    <div class="proddetail__review-form">
                        <p>Добавьте отзыв о товаре</p>
                        <p>Обязательные поля отмечены *</p>
                        <?php 
                            include('../blocks/reviewform.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            include('../blocks/sidebar.php');
        ?>
    </section>
</div>
<?php 
    include('../blocks/footer.php');
?>
<script src="js/tabs.js"></script>
