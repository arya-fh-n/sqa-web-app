<?php
include 'connect.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM _stock WHERE product_id = '$id'");
mysqli_query($conn, "DELETE FROM _prices WHERE product_id = '$id'");
mysqli_query($conn, "DELETE FROM _products WHERE id = '$id'");

header("location:view.php");
