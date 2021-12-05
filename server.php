<?php
include('config.php');

$goodId = $_GET['id'];
$reviewername = strip_tags($_POST['reviewername']);
$revieweremail = strip_tags($_POST['revieweremail']);
$reviewtext = strip_tags($_POST['reviewtext']);
$reviewerrating = $_POST['rating'];

$sql = "insert into reviews (good_id, user_rating, user_name, user_email, user_text) values ('$goodId', '$reviewerrating', '$reviewername', '$revieweremail', '$reviewtext')";

if ($res = mysqli_query($connect, $sql)) {
    header("Location: product.php?id=$goodId");
}
?>