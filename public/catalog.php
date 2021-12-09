<?php
include_once("../models/db_goods.php");
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
    <title>Catalog</title>
</head>
<body>
    <?php 
        include('../blocks/header.php');
    ?>
    
    <div class="main">
        <section class="products center">
            <div class="products__grid">
                <p class="products__showing">Показать последние 12 результатов</p>
                <div class="products__sort">
                    <details>
                        <summary>Сортировать
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </summary>
                        <ul>
                            <li>по популярности</li>
                            <li>по возрастанию цены</li>
                            <li>по убыванию цены</li>
                            <li>по новизне</li>
                            <li>по дате</li>
                        </ul>
                    </details>
                </div>

                <?php
                $goods = getAllGoods($connect);
                if($goods) {
                    foreach ($goods as $good):?>

                <div class="products__item">
                    <div class="rating">
                        <h4>Rating: <?=$good['rating']?></h4>
                    </div>
                    <div class="products__sale"></div>
                    <div class="products__img">
                        <a href="product.php?id=<?=$good['id']?>">
                            <img src="images/products/<?= $good['img']?>" alt="product">
                        </a>
                        <a href="#" class="btn btn--solid">В корзину</a>
                    </div>
                    <div class="products__text">
                        <a href="product.php?id=<?=$good['id']?>" class="products__name"><?= $good['title']?></a>
                        <p class="products__price">&#8381;<?= $good['price']?></p>
                    </div>
                </div>
                <?php
                    endforeach;
                };
                ?>
            </div>
            <?php
                include('../blocks/sidebar.php');
            ?>
        </section>
    </div>
    <?php
        include('../blocks/footer.php');
    ?>
</body>
</html>
