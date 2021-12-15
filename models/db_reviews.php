<?php
include('../config.php');

function getReviews($connect, $goodId) {
    $sql = sprintf("select * from reviews where good_id=%d", (int)$goodId);
    $res = mysqli_query($connect, $sql);
    if(!$res)
        die(mysqli_error($connect));
    
    while($data = mysqli_fetch_assoc($res)) {
        $reviews[] = $data;
    }
    return $reviews;
}

function sendReview($connect, $goodId) {
    $goodId = (int)$_GET['id'];
    $reviewername = strip_tags($_POST['reviewername']);
    $revieweremail = strip_tags($_POST['revieweremail']);
    $reviewtext = strip_tags($_POST['reviewtext']);
    $reviewerrating = $_POST['rating'];

    $dateOfCreate = date("Ymd");

    $sql = "insert into reviews (good_id, user_rating, user_name, user_email, user_text, date_of_create) values ('$goodId', '$reviewerrating', '$reviewername', '$revieweremail', '$reviewtext', '$dateOfCreate')";

    // $sql = "insert into reviews (good_id, user_rating, user_name, user_email, user_text) values ('%s', '%s', '%s', '%s', '%s')";
    // $query = sprintf($sql, mysqli_real_escape_string($connect, $reviewerrating), mysqli_real_escape_string($connect, $reviewername), mysqli_real_escape_string($connect, $revieweremail), mysqli_real_escape_string($connect, $reviewtext));

    if ($res = mysqli_query($connect, $sql)) {
        $updateReviewCount = "UPDATE goods SET review_count=review_count+1, rating=(SELECT avg(user_rating) FROM reviews WHERE good_id=$goodId) WHERE id=$goodId";
        mysqli_query($connect, $updateReviewCount);
        header("Location: /public/product.php?id=$goodId");
    } else {
        die(mysqli_error($connect));
    }
}

if (isset($_POST['submit_review_form'])) {
    sendReview($connect, $goodId);
}

function deleteReview($connect, $goodId) {
    $reviewId = $_GET['id'];
    $sql = "delete from reviews where id=$reviewId";
}
?>