<?php
require('connect.php');
//1
session_start();
//2
$error = '';
$validate = '';

//3 & 13
if (isset($_SESSION['username'])) header('Location: view.php');


if (isset($_POST['submit'])) {
    //4
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($conn, $username);

    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    //5
    if (!empty(trim($username)) && !empty(trim($password))) {
        $query = "SELECT * FROM _users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        //7
        if ($rows != 0) {
            //9
            $hash = mysqli_fetch_assoc($result)['password'];
            //10
            if (password_verify($password, $hash)) {
                //12
                $_SESSION['username'] = $username;
                //13
                header('Location: view.php');
            }
        } else { //8 & 11
            $error = 'Username atau password salah.';
        }
    } else { //6
        $error = 'Form login harus diisi.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Flextronics Co.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous"> -->

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid justify-content-start">
            <div class="navbar-brand">
                <strong>Flextronics Co.</strong>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white">Home</a>
                </li>
                <li class="nav-item ml-4">
                    <a class="text-center"></a>
                    <!-- <a href="logout.php" class="nav-link text-light btn btn-danger">Logout</a> -->
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid mb-4 pt-3">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-4">
                <?php if ($error != '') { ?>
                    <div class="alert alert-danger" role="alert"><?= $error; ?> </div>
                <?php } ?>
                <div class="card text-white bg-dark mb-3 pt-auto justify-content-center">
                    <div class="card-header text-center fs-3">
                        <b>Login</b>
                    </div>
                    <div class="card-body">
                        <!-- Form search -->
                        <form class="form-inline" action="login.php" method="POST">
                            <div class="row">
                                <div class="mb-2">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" maxlength="20" placeholder="Username...">
                                </div>
                                <div class="mb-2">
                                    <label for="InputPassword">Password</label>
                                    <input type="password" class="form-control" id="InputPassword" name="password" maxlength="20" placeholder="Password...">
                                    <?php
                                    if ($validate != '') { ?>
                                        <p class="text-danger"> <?= $validate; ?></p>
                                    <?php } ?>
                                </div>
                                <div class="mb-2 mt-2 text-center">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="form-footer mt-2 text-center">
                    <p>Belum punya akun? <a href="register.php">Register</a></p>
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