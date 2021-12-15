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

function getCartGood($connect, $productId) {
    $sql = "select * from goods where id=$productId";
    $res = mysqli_query($connect, $sql);
    if (!$res)
        die(mysqli_error($connect));
        
    while($data = mysqli_fetch_assoc($res)) {
        $cartGood = $data;
    }
    return $cartGood;
}

function addToCart($connect, $productId) {
    $productId = (int)$_GET['id'];
    if ($quantity = strip_tags((int)$_POST['quantity'])) {
        $sql = "insert into cart (product_id, user_id, quantity) values ('$productId', 1, '$quantity')";
    } else {
        $sql = "insert into cart (product_id, user_id, quantity) values ('$productId', 1, 1)";
    }

    if ($res = mysqli_query($connect, $sql)) {
        header("Location: /public/product.php?id=$productId");
    } else {
        die(mysqli_error($connect));
    }
}
if (isset($_POST['submit_good_to_cart']) || isset($_GET['submit_good_to_cart'])) {
    addToCart($connect, $productId);
}

function removeFromCart($connect, $productId) {
    $productId = (int)$_GET['id'];
    $action = $_GET['action'];
    if ($action == 'delete') {
        $sql = "delete from cart where product_id=$productId";
        if ($res = mysqli_query($connect, $sql)) {
            header("Location: /public/cart.php");
        } else {
            die(mysqli_error($connect));
        }
    } elseif ($action == 'edit') {
        $quantity = $_GET['quantity'];
        $sql = "update cart set quantity=$quantity where product_id=$productId";

        if ($res = mysqli_query($connect, $sql)) {
            header("Location: /public/cart.php");
        } else {
            die(mysqli_error($connect));
        }
    }   
}
if (isset($_GET['remove_from_cart'])) {
    removeFromCart($connect, $productId);
}
?>
