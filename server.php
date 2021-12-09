<?php
// include('config.php');
$goodId = (int)$_GET['id'];
include_once("models/db_reviews.php");

sendReview($connect, $goodId);
// $goodId = (int)$_GET['id'];
// $reviewername = strip_tags($_POST['reviewername']);
// $revieweremail = strip_tags($_POST['revieweremail']);
// $reviewtext = strip_tags($_POST['reviewtext']);
// $reviewerrating = $_POST['rating'];

// $sql = "insert into reviews (good_id, user_rating, user_name, user_email, user_text) values ('$goodId', '$reviewerrating', '$reviewername', '$revieweremail', '$reviewtext')";

// $sql = "insert into reviews (good_id, user_rating, user_name, user_email, user_text) values ('%s', '%s', '%s', '%s', '%s')";
// $query = sprintf($sql, mysqli_real_escape_string($connect, $reviewerrating), mysqli_real_escape_string($connect, $reviewername), mysqli_real_escape_string($connect, $revieweremail), mysqli_real_escape_string($connect, $reviewtext));

// if ($res = mysqli_query($connect, $sql)) {
//     header("Location: product.php?id=$goodId");
// }
// else {
//     die(mysqli_error($connect));
// }
?>