<?php
include_once("../models/db_goods.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../public/scss/index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <form action="../models/db_goods.php" method="post" enctype="multipart/form-data">
        <input type="file" name="img" accept="image/*">
        <input type="text" name="title" placeholder="Название товара">
        <input type="text" name="price" placeholder="Цена товара">
        <textarea name="info" placeholder="Полная информация о товаре" cols="30" rows="10"></textarea>
        <textarea name="shortinfo" placeholder="Краткое описание о товаре" cols="30" rows="5"></textarea>
        <input type="submit" name="submit_new_product" value="Добавить товар">
    </form>
    <div class="main">
        <section class="cart center">
            <div class="cart__top-admin">
                <p>Название</p>
                <p>ID</p>
                <p>Редактировать цену</p>
                <p>Редактировать описание</p>
                <p>Редактировать краткое описание</p>
                <p>Удалить</p>
            </div>
            <?php
                $goods = getAllGoods($connect);
                if($goods) {
                    foreach ($goods as $good):?>
            <div class="cart__items">
                <div class="cart__item-admin">
                    <div class="cart__body">
                        <div class="cart__img">
                            <a href="../public/product.php?id=<?=$good['id']?>"><img src="../public/images/products/<?= $good['img']?>" alt="product"></a>
                        </div>
                        <a href="../public/product.php?id=<?=$good['id']?>" class="cart__name"><?= $good['title']?></a>
                    </div>
                    <p><?=$good['id']?></p>
                    <input id="price_<?= $good['id']?>" type="text" value="<?= $good['price']?>" class="cart__price">
                    <textarea name="info" rows="10" cols="30"><?= $good['info']?></textarea>
                    <textarea name="shortinfo" type="text"><?= $good['shortinfo']?></textarea>
                    <a href="../models/db_goods.php?action=delete&delete_product&id=<?=$good['id']?>">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
                    </a>
                </div>
            </div>
            <?php
                endforeach;
            };?>
        </section>
    </div>
</body>
</html>