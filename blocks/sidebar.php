<?php
    include_once("../models/db_cart.php");
    include_once("../models/db_goods.php");
?>
<sidebar class="sidebar">
    <div class="sidebar__categories">
        <div class="sidebar__heading">
            <h4 class="heading-h4">Категории</h4>
            <div class="hr"></div>
        </div>
        <ul>
            <li><a href="#">Все</a></li>
            <li><a href="#">Камеры безопасности</a></li>
            <li><a href="#">Удаленный доступ</a></li>
            <li><a href="#">Ночные камеры</a></li>
        </ul>
    </div>
    <div class="sidebar__filter">
        <div class="sidebar__heading">
            <h4 class="heading-h4">Цена от до</h4>
            <div class="hr"></div>
        </div>
        <button class="btn btn--clipped">Применить</button>
    </div>
    <div class="sidebar__popular">
        <div class="sidebar__heading">
            <h4 class="heading-h4">Бестселлеры</h4>
            <div class="hr"></div>
        </div>
        <?php 
        $bestsellers = getBestsellers($connect);
        if ($bestsellers) {
            foreach ($bestsellers as $bestseller):?>
        <div class="sidebar__media">
            <div class="sidebar__media-img">
                <a href="../public/product.php?id=<?=$bestseller['id']?>">
                    <img src="../public/images/products/<?=$bestseller['img']?>" alt="bestseller">
                </a>
                <div class="rating">
                    <?php 
                    $fas = "fas";
                    $far = "far";
                    for($i = 0; $i < 5; $i++){
                        if($i >= $bestseller['rating']):?>
                        <svg aria-hidden="true" focusable="false" data-prefix="<?=$far?>" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                    <?php
                        elseif ($i < $bestseller['rating']):?>
                        <svg aria-hidden="true" focusable="false" data-prefix="<?=$fas?>" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                    <?php endif;
                    }; ?>
                </div>
            </div>
            <div class="sidebar__media-name">
                <a href="../public/product.php?id=<?=$bestseller['id']?>"><?=$bestseller['title']?></a>
            </div>
        </div>
        <?php
            endforeach;
        };
        ?>
    </div>
    <div class="sidebar__cart">
        <div class="sidebar__heading">
            <h4 class="heading-h4">Корзина</h4>
            <div class="hr"></div>
        </div>
        <?php
            $cart = getCart($connect);
            $totalPrice = 0;
            if ($cart) {
                foreach ($cart as $cartItem) {
                    $cartGood = getCartGood($connect, $cartItem['product_id']);
                    $totalPrice = $totalPrice + $cartGood['price']*$cartItem['quantity'];
                ?>
        <div class="sidebar__cart-item">
            <div class="sidebar__cart-remove">
                <a href="../models/db_cart.php?action=delete&remove_from_cart&id=<?=$cartItem['product_id']?>">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
                </a>
            </div>
            <div class="sidebar__cart-img">
                <a href="product.php?id=<?=$cartItem['product_id']?>"><img src="../public/images/products/<?=$cartGood['img']?>" alt="product"></a>
            </div>
            <div class="sidebar__cart-name">
                <a href="product.php?id=<?=$cartItem['product_id']?>"><?=$cartGood['title']?></a>
            </div>
            <div class="sidebar__cart-quant">
                <?=$cartItem['quantity']?> &times; &#8381;<?=$cartGood['price']?>
            </div>
        </div>
        <?php
            };
        };
        ?>
        <div class="sidebar__cart-subtotal">
            Subtotal: <span>&#8381;<?=$totalPrice?></span>
        </div>
        <div class="sidebar__cart-bottom">
            <a href="../public/cart.php" class="btn btn--clipped">Корзина</a>
            <a href="#" class="btn btn--solid">Заказать</a>
        </div>
    </div>
</sidebar>