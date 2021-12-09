<?php
include_once "../models/db_goods.php";
if($_GET['id']){
    $id = $_GET['id'];
    deleteDood($connect, $id);
    header("Location: ../admin/index.php");
}
?>
