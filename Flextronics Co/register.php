<!DOCTYPE html>
<html>

<head>
    <title>Register, Login dan Logout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous"> -->

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <?php
    //connection.php
    require('connect.php');
    //session start
    session_start();

    $error = '';
    $validate = '';

    //cek session username
    if (isset($_SESSION['user'])) header('Location: view.php');
    // cek if username kosong
    if (isset($_POST['submit'])) {
        //hilangkan backslash ( / )
        $username = stripslashes($_POST['username']);

        //security form dari sql injection
        $username = mysqli_real_escape_string($conn, $username);

        //untuk semua kolom
        $name = stripslashes($_POST['name']);
        $name = mysqli_real_escape_string($conn, $name);

        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($conn, $email);

        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        $repass = stripslashes($_POST['repass']);
        $repass = mysqli_real_escape_string($conn, $repass);

        //cek nilai form kosong atau tidak
        if (!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))) {
            if ($password == $repass) {
                //panggil method cek nama
                if (cek_uname($username, $conn) == 0) {
                    //hash password sebelum disimpan
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                    //insert data
                    $query = "INSERT INTO _users (username, name, email, password) VALUES ('$username','$name','$email','$password_hash')";
                    $result = mysqli_query($conn, $query);

                    // if insert berhasil, redirect ke view.php dan simpan data ke session
                    if ($result) {
                        $_SESSION['username'] = $username;
                        header('Location: view.php');
                    } else { //if error tampilkan error messages
                        $error = 'Registrasi gagal!';
                    }
                } else {
                    $error = 'Username sudah terdaftar!';
                }
            } else {
                $validate = 'Password tidak sama!';
            }
        } else {
            $error = 'Data tidak boleh kosong!';
        }
    }

    //fungsi cek username sudah terdaftar atau belum
    function cek_uname($username, $conn)
    {
        $nama = mysqli_real_escape_string($conn, $username);
        $query = "SELECT * FROM _users WHERE username = '$nama'";

        if ($result = mysqli_query($conn, $query)) return mysqli_num_rows($result);
    }
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid justify-content-start">
            <div class="navbar-brand">
                <strong>Flextronics Co.</strong>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white">Home</a>
                </li>
                <!-- <li class="nav-item ml-4">
                    <a class="text-center"></a>
                    <a href="logout.php" class="nav-link text-light btn btn-danger">Logout</a>
                </li> -->
            </ul>
        </div>
    </nav>

    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-4">
                <?php if ($error != '') { ?>
                    <div class="alert alert-danger" role="alert"><?= $error; ?> </div>
                <?php } ?>
                <div class="card text-white bg-dark mb-3 pt-auto justify-content-center">
                    <div class="card-header text-center fs-3">
                        <b>Register</b>
                    </div>
                    <div class="card-body">
                        <!-- Form search -->
                        <form class="form-inline" action="register.php" method="POST">
                            <div class="row">
                                <div class="mb-2">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($name)) echo $name; ?>" maxlength="50" placeholder="Nama...">
                                </div>
                                <div class="mb-2">
                                    <label for="InputEmail">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php if (isset($email)) echo $email; ?>" maxlength="50" placeholder="Email...">
                                </div>
                                <div class="mb-2">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php if (isset($username)) echo $username; ?>" maxlength="20" placeholder="Username...">
                                </div>
                                <div class="mb-2">
                                    <label for="InputPassword">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" maxlength="20" placeholder="Password...">
                                </div>
                                <div class="mb-2">
                                    <label for="InputPassword">Ulang Password</label>
                                    <input type="password" class="form-control" id="repass" name="repass" maxlength="20" placeholder="Ulang Password...">
                                    <?php
                                    if ($validate != '') { ?>
                                        <p class="text-danger"> <?= $validate; ?></pc>
                                        <?php } ?>
                                </div>
                                <div class="mb-2 mt-2 text-center">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="form-footer mt-2 text-center">
                    <p>Sudah punya akun? <a href="login.php">Login</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Boostrap jQuery pertama, kemudian Popper.js, lalu Boostrap JS -->
    <script src="https://code.jquery.com.jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com.bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>

</html>