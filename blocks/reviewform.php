<?php 
    $goodId = (int)$_GET['id'];
?>
<form action="../models/db_reviews.php?id=<?=$goodId?>" name="reviewform" method="post" enctype="multipart/form-data">
    <div class="user-rating">
        <input type="radio" name="rating" class="radio" value="1" id="verybad">
        <input type="radio" name="rating" class="radio" value="2" id="bad">
        <input type="radio" name="rating" class="radio" value="3" id="average">
        <input type="radio" name="rating" class="radio" value="4" id="good">
        <input type="radio" name="rating" class="radio" value="5" id="perfect">
    </div>
    <div class="user-info">
        <div>
            <label for="name">Имя* <input type="text" placeholder="Имя" name="reviewername" id="name" required> </label>
        </div>
        <div>
            <label for="email"> Email* <input type="text" placeholder="Email" name="revieweremail" id="email" required> </label>
        </div>
    </div>
    <label for="textarea">Ваш отзыв</label><textarea name="reviewtext" id="textarea" rows="10" placeholder="Ваш отзыв"></textarea>
    <input type="submit" name="submit_review_form" class="btn btn--solid" value="Отправить">
</form>
