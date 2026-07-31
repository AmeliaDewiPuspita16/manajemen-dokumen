<?php

$host = "gateway01.ap-southeast-1.prod.aws.tidbcloud.com";
$user = "2Xtu7Gfm51rUyqA.root";
$password = "LhhiEgeA9MDRnRMs";
$database = "database_smd";
$port = 4000;

$conn = mysqli_init();

mysqli_ssl_set(
    $conn,
    NULL,
    NULL,
    "C:/Users/Lenovo/Downloads/isrgrootx1.pem",
    NULL,
    NULL
);

mysqli_real_connect(
    $conn,
    $host,
    $user,
    $password,
    $database,
    $port,
    NULL,
    MYSQLI_CLIENT_SSL
);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>