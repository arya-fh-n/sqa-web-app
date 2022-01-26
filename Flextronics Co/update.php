<?php
include 'connect.php';

$idx = $_POST['idx'];
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$id = $_POST['id'];
$manufaktur = $_POST['manufaktur'];
$warna = $_POST['warna'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$deskripsi = $_POST['deskripsi'];

// mysqli_query($conn, "UPDATE _stock SET  WHERE id = '$id'");
// mysqli_query($conn, "UPDATE _prices SET  WHERE id = '$id'");
mysqli_query($conn, "UPDATE _products, _stock, _prices SET _products.kategori = $kategori, _products.nama = '$nama', 
    _products.manufaktur = '$manufaktur', _products.warna = '$warna', _stock.amount = $amount, 
    _prices.price = $price, _products.deskripsi = '$deskripsi' 
    WHERE _products.id = '$id' AND _prices.product_id = '$id' AND _stock.product_id = '$id'");

header("location:view.php");
