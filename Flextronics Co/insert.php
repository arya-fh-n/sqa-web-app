<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Barang | Flextronics Co.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- CSS Bootstrap -->

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        body {
            background-color: #333333;
            color: white;
            /* font-size: 12px; */
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid justify-content-start">
            <div class="navbar-brand">
                <strong>Flextronics Co.</strong>
            </div>
            <ul class="nav justify-content-start">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white">Home</a>
                </li>
            </ul>
        </div>
        <a href="logout.php" class="btn btn-outline-light fw-bold me-3" onclick="return confirm('Apa Anda yakin ingin keluar aplikasi?');">Logout</a>
    </nav>

    <div class="container pt-3">
        <div class="card text-white bg-dark mb-3 mx-auto" style="width: 80%;">

            <div class="card-header">
                <b>Tambah Data Barang</b>
                <a href="view.php" class="float-end btn btn-light btn-sm"><i class="fa fa-fw fa-globe"></i> Lihat Data Barang</a>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="ms-4">
                            <form method="POST" action="insert-aksi.php" class="form-inline">
                                <div class="mb-3">
                                    <label>Nama Produk <span class="text-danger">*</span></label>
                                    <input type="text" name="nama" id="nama" class="form-control form-control-sm" value="<?php if (isset($_GET['nama'])) echo $_GET['nama']; ?>" maxlength="255" placeholder="Masukkan nama produk..." required>
                                </div>
                                <div class="mb-3">
                                    <label>Kategori Produk <span class="text-danger">*</span></label>
                                    <select class="form-control form-control-sm text-dark bg-light" id="kategori" name="kategori" required="" onclick="changeSelect()">
                                        <option value="1" <?php if (isset($_GET['kategori'])) echo "selected"; ?>>Aksesoris (AK)</option>
                                        <option value="2" <?php if (isset($_GET['kategori'])) echo "selected"; ?>>Audio (AU)</option>
                                        <option value="3" <?php if (isset($_GET['kategori'])) echo "selected"; ?>>TV (TV)</option>
                                        <option value="4" <?php if (isset($_GET['kategori'])) echo "selected"; ?>>Telepon (TE)</option>
                                        <option value="5" <?php if (isset($_GET['kategori'])) echo "selected"; ?>>Printer (PR)</option>
                                        <option value="6" <?php if (isset($_GET['kategori'])) echo "selected"; ?>>Media Player (MP)</option>
                                        <option value="7" <?php if (isset($_GET['kategori'])) echo "selected"; ?>>Elektronik Dapur (ED)</option>
                                        <option value="8" <?php if (isset($_GET['kategori'])) echo "selected"; ?>>Elektronik Kantor (EK)</option>
                                        <option value="9" <?php if (isset($_GET['kategori'])) echo "selected"; ?>>Elektronik Rumah Tangga (ER)</option>
                                        <option value="10" <?php if (isset($_GET['kategori'])) echo "selected"; ?>>Lampu (LA)</option>
                                        <option value="11" <?php if (isset($_GET['kategori'])) echo "selected"; ?>>Pendingin Ruangan (PE)</option>
                                        <option value="12" <?php if (isset($_GET['kategori'])) echo "selected"; ?>>Lainnya (OT)</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>ID Produk <span class="text-danger">*</span></label> <small> (Contoh : ED000001)</small>
                                    <input type="text" name="id" id="id" class="form-control form-control-sm" value="<?php if (isset($_GET['id'])) echo $_GET['id']; ?>" maxlength="8" placeholder="((2 prefiks kategori) + nomor produk)..." required>
                                </div>
                                <div class="mb-3">
                                    <label>Pabrikan <span class="text-danger">*</span></label>
                                    <input type="text" name="manufaktur" id="manufaktur" class="form-control form-control-sm" value="<?php if (isset($_GET['manufaktur'])) echo $_GET['manufaktur']; ?>" maxlength="200" placeholder="Masukkan pabrikan produk..." required>
                                </div>
                                <div class="mb-3">
                                    <label>Warna <span class="text-danger">*</span></label>
                                    <input type="text" name="warna" id="warna" class="form-control form-control-sm" value="<?php if (isset($_GET['warna'])) echo $_GET['warna']; ?>" maxlength="100" placeholder="Masukkan warna produk..." required>
                                </div>
                                <div class="mb-3">
                                    <label>Harga (dalam Rupiah) <span class="text-danger">*</span></label>
                                    <input type="number" name="price" id="price" class="form-control form-control-sm" value="<?php if (isset($_GET['price'])) echo $_GET['price']; ?>" onKeyPress="if(this.value.length==11) return false;" placeholder="Masukkan harga produk..." required>
                                </div>
                                <div class="mb-3">
                                    <label>Stok Barang <span class="text-danger">*</span></label>
                                    <input type="number" name="amount" id="amount" class="form-control form-control-sm" value="<?php if (isset($_GET['amount'])) echo $_GET['amount']; ?>" onKeyPress="if(this.value.length==7) return false;" placeholder="Masukkan jumlah stok produk..." required>
                                </div>
                                <div class="mb-3">
                                    <label>Deskripsi Barang</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" maxlength="255" style="resize: none; height : 69pt"><?php if (isset($_GET['deskripsi'])) echo $_GET['deskripsi']; ?></textarea>
                                </div>
                                <div class="col-sm-5">
                                    <div class="mb-2">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Tambah Data</button>
                                        <a href="insert.php" class="btn btn-danger mt-3"><i class="fa fa-fw fa-sync"></i> Bersihkan Form</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        function changeSelect() {
            var select = document.getElementById("kategori").value;
            var category;
            switch (select) {
                case '1':
                    category = "AK";
                    break;
                case '2':
                    category = "AU";
                    break;
                case '3':
                    category = "TV";
                    break;
                case '4':
                    category = "TE";
                    break;
                case '5':
                    category = "PR";
                    break;
                case '6':
                    category = "MP";
                    break;
                case '7':
                    category = "ED";
                    break;
                case '8':
                    category = "EK";
                    break;
                case '9':
                    category = "ER";
                    break;
                case '10':
                    category = "LA";
                    break;
                case '11':
                    category = "PE";
                    break;
                case '12':
                    category = "OT";
                    break;
            }

            document.getElementById("id").value = category;
        }
    </script>
</body>

</html>