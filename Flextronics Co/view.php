<?php
//start session
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Anda harus login untuk mengakses halaman ini.";
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Inventori Gudang | Flextronics Co.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- CSS Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
        <div class="container-fluid justify-content-start">
            <div class="navbar-brand">
                <strong>Flextronics Co.</strong>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white">Home</a>
                </li>
            </ul>
        </div>
        <a href="logout.php" class="btn btn-outline-light fw-bold me-3" onclick="return confirm('Apa Anda yakin ingin keluar aplikasi?');">Logout</a>
    </nav>
    <div class="container-fluid pt-3">
        <!-- Panel form search -->
        <div class="row justify-content-center">

            <div class="col-md-6">
                <div class="alert alert-success" role="alert">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo 'Selamat datang, ' . $_SESSION['username'] . '.';
                    }
                    ?>
                </div>
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">
                        <b>Pencarian Barang</b>
                        <a href="insert.php" class="float-end btn btn-light btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Tambah Data Barang</a>
                    </div>
                    <div class="card-body">
                        <!-- Form search -->
                        <form class="form-inline">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-2">
                                        <select class="form-control text-white bg-dark" id="kolom" name="kolom" required="">
                                            <?php
                                            $kolom = (isset($_GET['kolom'])) ? $_GET['kolom'] : "";
                                            ?>
                                            <option value="id" <?php if ($kolom == "id") echo "selected"; ?>>ID Produk</option>
                                            <option value="kategori" <?php if ($kolom == "kategori") echo "selected"; ?>>Kategori Produk</option>
                                            <option value="nama" <?php if ($kolom == "nama") echo "selected"; ?>>Nama Produk</option>
                                            <option value="manufaktur" <?php if ($kolom == "manufaktur") echo "selected"; ?>>Pabrikan</option>
                                            <option value="warna" <?php if ($kolom == "warna") echo "selected"; ?>>Warna Produk</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-2">
                                        <input type="text" class="form-control text-white bg-dark" id="keyword" name="keyword" placeholder="Kata yang dicari..." required="" value="<?php if (isset($_GET['keyword'])) echo $_GET['keyword']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-2">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Cari</button>
                                        <a href="view.php" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'connect.php';

        $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
        $kolomCari = (isset($_GET['kolom'])) ? $_GET['kolom'] : "";
        $kolomKeyword = (isset($_GET['keyword'])) ? $_GET['keyword'] : "";

        // Max record shown per page
        $limit = 4;

        // Array start index
        $limitStart = ($page - 1) * $limit;

        // Handler search bar
        // If condition parameter kosong
        if ($kolomCari == "" && $kolomKeyword == "") {
            $data = mysqli_query($conn, "SELECT idx, id, kategori, tgl_input, nama, manufaktur, warna, price, amount, deskripsi FROM _products pro
                    INNER JOIN _prices pri ON pro.id = pri.product_id
                    INNER JOIN _stock sto ON pro.id = sto.product_id
                    ORDER BY pro.idx DESC LIMIT " . $limitStart . "," . $limit);
        } else { //else parameter diisi
            $data = mysqli_query($conn, "SELECT idx, id, kategori, tgl_input, nama, manufaktur, warna, price, amount, deskripsi FROM _products pro
                    INNER JOIN _prices pri ON pro.id = pri.product_id
                    INNER JOIN _stock sto ON pro.id = sto.product_id
                    WHERE $kolomCari LIKE '%$kolomKeyword%'
                    ORDER BY pro.idx DESC 
                    LIMIT " . $limitStart . "," . $limit);
        }
        ?>
        <!-- Tabel data Maba -->
        <table class="table table-dark table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Input Date</th>
                    <th>Nama Produk</th>
                    <th>Pabrikan</th>
                    <th>Warna</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num = $limitStart + 1;
                while ($row = mysqli_fetch_array($data)) { //fetch_array
                ?>
                    <tr>
                        <td><?php echo $num++; ?></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['kategori']; ?></td>
                        <td><?php echo $row['tgl_input']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['manufaktur']; ?></td>
                        <td><?php echo $row['warna']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td class="text-break"><?php echo $row['deskripsi']; ?></td>
                        <td class="d-grid gap-2">
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apa Anda yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div>
            <ul class="pagination justify-content-end">
                <!-- Link Previous -->
                <?php
                // Handler page button
                // If page == 1, linkprev = disable
                if ($page == 1) {
                ?>
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <?php
                } else {
                    $LinkPrev = ($page > 1) ? $page - 1 : 1;

                    if ($kolomCari == "" && $kolomKeyword == "") {
                    ?>
                        <li class="page-item"><a class="page-link" href="view.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item"><a class="page-link" href="view.php?kolom=<?php echo $kolomCari; ?>&keyword=<?php echo $kolomKeyword; ?>&page=<?php echo $LinkPrev; ?>">Previous</a></li>
                <?php
                    }
                }
                ?>
                <?php
                // Handler page parameter kosong
                if ($kolomCari == "" && $kolomKeyword == "") {
                    $data = mysqli_query($conn, "SELECT idx, id, kategori, tgl_input, nama, manufaktur, warna, price, amount, deskripsi FROM _products pro
                    INNER JOIN _prices pri ON pro.id = pri.product_id
                    INNER JOIN _stock sto ON pro.id = sto.product_id
                    ORDER BY pro.idx DESC");
                } else {
                    $data = mysqli_query($conn, "SELECT idx, id, kategori, tgl_input, nama, manufaktur, warna, price, amount, deskripsi FROM _products pro
                    INNER JOIN _prices pri ON pro.id = pri.product_id
                    INNER JOIN _stock sto ON pro.id = sto.product_id
                    WHERE $kolomCari LIKE '%$kolomKeyword%'
                    ORDER BY pro.idx DESC");
                }

                // Count row
                $jumlahData = mysqli_num_rows($data);
                // Count page
                $jumlahPage = ceil($jumlahData / $limit);
                // Jumlah link number
                $jumlahNum = 1;
                // link awal number
                $startNum = ($page > $jumlahNum) ? $page - $jumlahNum : 1;
                // link akhir number
                $endNum = ($page < ($jumlahPage - $jumlahNum)) ? $page + $jumlahNum : $jumlahPage;

                for ($i = $startNum; $i <= $endNum; $i++) {
                    $LinkActive = ($page == $i) ? 'active' : '';

                    if ($kolomCari == "" && $kolomKeyword == "") {
                ?>
                        <li class="page-item <?php echo $LinkActive; ?>"><a class="page-link" href="view.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                    <?php
                    } else {
                    ?>
                        <li class="page-item <?php echo $LinkActive; ?>"><a class="page-link" href="view.php?kolom=<?php echo $kolomCari; ?>&keyword=<?php echo $kolomKeyword; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php
                    }
                }
                ?>

                <!-- Link Next -->
                <?php
                if ($page == $jumlahPage) {
                ?>
                    <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                    <?php
                } else {
                    $LinkNext = ($page < $jumlahPage) ? $page + 1 : $jumlahPage;
                    if ($kolomCari == "" && $kolomKeyword == "") {
                    ?>
                        <li class="page-item"><a class="page-link" href="view.php?page=<?php echo $LinkNext; ?>">Next</a></li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item"><a class="page-link" href="view.php?kolom=<?php echo $kolomCari; ?>&keyword=<?php echo $kolomKeyword; ?>&page=<?php echo $LinkNext; ?>">Next</a></li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <footer>
        <p class="text-center text-muted">&copy; 2021 Flextronics Co.</p>
    </footer>
</body>

</html>