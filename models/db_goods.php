<?php
include("../config.php");

function getAllGoods($connect) {
    $sql = "select * from goods order by review_count desc";
    $res = mysqli_query($connect, $sql);
    if(!$res)
        die(mysqli_error($connect));
    
    while($data = mysqli_fetch_assoc($res)) {
        $goods[] = $data;
    }

    return $goods;
};

function getGood($connect, $id) {
    $sql = "select * from goods where id=$id";
    $res = mysqli_query($connect, $sql);
    if(!$res)
        die(mysqli_error($connect));
    
    $good = mysqli_fetch_assoc($res);
    return $good;
}

function addGood($connect) {
    $title = strip_tags($_POST['title']);
    $price = (int)$_POST['price'];
    $info = strip_tags($_POST['info']);
    $shortinfo = strip_tags($_POST['shortinfo']);
    $img = $_FILES['img']['name'];
    $rating = 0;
    $reviewCount = 0;

    $path = "../public/images/products/{$_FILES['img']['name']}";
    if (move_uploaded_file($_FILES['img']['tmp_name'], $path)) {
        copy($_FILES['img'], $path);
    }
    $sql = "insert into goods (title, price, info, img, shortinfo, rating, review_count) values ('$title', '$price', '$info', '$img', '$shortinfo', '$rating', '$reviewCount')";
    if ($res = mysqli_query($connect, $sql)) {
        header("Location: /admin/index.php");
    } else {
        die(mysqli_error($connect));
    }
};

if (isset($_POST['submit_new_product'])) {
    addGood($connect);
}

function deleteGood($connect, $id) {
    $id = (int)$_GET['id'];
    $action = $_GET['action'];
    if ($action == 'delete') {
        $sql = "delete from goods where id=$id";
        if ($res = mysqli_query($connect, $sql)) {
            header("Location: /admin/index.php");
        } else {
            die(mysqli_error($connect));
        }
    }
}

if (isset($_GET['delete_product'])) {
    deleteGood($connect, $id);
}

function getBestsellers($connect) {
    $sql = "SELECT * FROM goods ORDER BY rating DESC LIMIT 3";
    $res = mysqli_query($connect, $sql);

    if(!$res)
        die(mysqli_error($connect));
    
    while($data = mysqli_fetch_assoc($res)) {
        $bestsellers[] = $data;
    }

    return $bestsellers;
}
?>