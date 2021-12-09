<?php
include("../config.php");

function getCart($connect) {
    $sql = "select * from cart";
    $res = mysqli_query($connect, $sql);

    if (!$res)
        die(mysqli_error($connect));
    
    while($data = mysqli_fetch_assoc($res)) {
        $cart[] = $data;
    }
    return $cart;
}

function addToCart($connect, $productId) {
    $productId = (int)$_GET['id'];
    $quantity = strip_tags($_POST['quantity']);
    $sql = "insert into cart (product_id, user_id, quantity) values ('$productId', 1, '$quantity')";

    if ($res = mysqli_query($connect, $sql)) {
        header("Location: /public/product.php?id=$productId");
    } else {
        die(mysqli_error($connect));
    }
}
if (isset($_POST['submit_good_to_cart'])) {
    addToCart($connect, $productId);
}

?>
