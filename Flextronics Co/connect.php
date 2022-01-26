<?php
$conn = mysqli_connect("localhost", "root", "", "webprog2_flextronics");

if (!$conn) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
