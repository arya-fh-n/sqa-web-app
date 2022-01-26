<?php
include 'connect.php';
//1
//2
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$id = $_POST['id'];
$manufaktur = $_POST['manufaktur'];
$warna = $_POST['warna'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$deskripsi = $_POST['deskripsi'];

//3
mysqli_query($conn, "INSERT INTO _products (id, kategori, tgl_input, nama, manufaktur, warna, deskripsi) 
    VALUES ('$id', $kategori, CURRENT_DATE(),'$nama', '$manufaktur', '$warna', '$deskripsi')");
//4
mysqli_query($conn, "INSERT INTO _stock (product_id, amount) VALUES ('$id',$amount)");
//5
mysqli_query($conn, "INSERT INTO _prices (product_id, price) VALUES ('$id',$price)");
//6
header("location:view.php");
//7