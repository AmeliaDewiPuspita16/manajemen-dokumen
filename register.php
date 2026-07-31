<?php
require 'config/conn.php';

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('username sudah terdaftar!')
            </script>";
        return false;
        exit();
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script> swal('Registrasi Gagal', 'Konfirmasi Password tidak sesuai', 'error');</script>";
        return false;
        exit();
    }

    //Hash menggunakan algoritma Bycript
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT into user VALUES ('','$username', '$password', 'User')");

    return mysqli_affected_rows($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Manajemen Dokumen</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form action="" class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" required class="form-control form-control-user" id="username" name="username"
                                                placeholder="Enter Username">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" required class="form-control form-control-user" name="password"
                                                    id="password" placeholder="Enter Password">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" required class="form-control form-control-user" name="password2"
                                                    id="password2" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="register">
                                            Create an Account
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="index.php">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>
    <!-- SweetAlert -->
    <script src="admin/js/sweetalert.min.js"></script>
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
<?php
if (isset($_POST['register'])) {
    if (registrasi($_POST) > 0) {
        echo "<script> swal('Registrasi Berhasil', 'User berhasil ditambahkan', 'success').then(function() { window.location = 'index.php'; });</script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
</html>
