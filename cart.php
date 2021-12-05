<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="scss/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <?php
    include('blocks/header.php');
    ?>
    <div class="main">
        <section class="cart center">
            <div class="cart__top">
                <p>Название</p>
                <p>Цена</p>
                <p>Количество</p>
                <p>Итого</p>
                <p>Удалить</p>
            </div>
            <div class="cart__items">
                <div class="cart__item">
                    <div class="cart__body">
                        <div class="cart__img">
                            <a href="#"><img src="img/products/1.jpg" alt="product"></a>
                        </div>
                        <a href="#" class="cart__name">Premium Security Cam VVZ</a>
                    </div>
                    <p class="cart__price">&#8381;2344.00</p>
                    <div class="cart__quant">
                        <input type="number" min="1" step="1" value="1">
                    </div>
                    <p class="cart__total">&#8381;2344.00</p>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
                </div>
                <div class="cart__item">
                    <div class="cart__body">
                        <div class="cart__img">
                            <a href="#"><img src="img/products/3.jpg" alt="product"></a>
                        </div>
                        <a href="#" class="cart__name">Premium Security Cam VVZ</a>
                    </div>
                    <p class="cart__price">&#8381;2344.00</p>
                    <div class="cart__quant">
                        <input type="number" min="1" step="1" value="1">
                    </div>
                    <p class="cart__total">&#8381;2344.00</p>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
                </div>
                <div class="cart__item">
                    <div class="cart__body">
                        <div class="cart__img">
                            <a href="#"><img src="img/products/5.jpg" alt="product"></a>
                        </div>
                        <a href="#" class="cart__name">Premium Security Cam VVZ</a>
                    </div>
                    <p class="cart__price">&#8381;2344.00</p>
                    <div class="cart__quant">
                        <input type="number" min="1" step="1" value="1">
                    </div>
                    <p class="cart__total">&#8381;2344.00</p>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
                </div>
            </div>
            <div class="cart__bottom">
                <div class="cart__form">
                    <input type="text" placeholder="Код купона">
                    <button type="submit" class="btn btn--clipped">Применить купон</button>
                </div>
                <button type="submit" class="btn btn--solid">Обновить корзину</button>
            </div>
        </section>
        <section class="totals center">
            <h3 class="totals__heading">Итог</h3>
            <div class="totals__str">
                <p>Подитог</p>
                <p>&#8381;2344.00</p>
            </div>
            <div class="totals__str">
                <p>Общая стоимость</p>
                <span>&#8381;2577.00</span>
            </div>
            <a href="#" class="btn btn--clipped">Оформить заказ</a>
        </section>
    </div>
    <footer></footer>
</body>
</html>