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

function addGood($connect, $title, $price, $info, $rating, $img, $shortinfo, $reviewCount) {
    return;
};

function deleteGood($connect, $id) {
    $id = (int)$id;
    if($id == 0)
        return false;

    $sql = sprintf("delete from goods where id='%d'", $id);
    $res = mysqli_query($connect, $sql);

    if(!$res)
        die(mysqli_error($connect));

    return mysqli_affected_rows($connect);
}

?>