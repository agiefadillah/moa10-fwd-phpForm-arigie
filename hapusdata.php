<?php
require 'config/function.php';

if (isset($_GET['hapuskustomer'])) {
    $status = $_GET['hapuskustomer'];
    $query = "DELETE FROM kustomer WHERE id_kustomer='$status' ";
    mysqli_query($koneksi, $query);
    header("Location: kustomer/kustomer.php");
}

if (isset($_GET['hapusmobil'])) {
    $status = $_GET['hapusmobil'];
    $query = "DELETE FROM mobil WHERE id_mobil='$status' ";
    mysqli_query($koneksi, $query);
    header("Location: mobil/mobil.php");
}

if (isset($_GET['hapuspeminjaman'])) {
    $status = $_GET['hapuspeminjaman'];
    $query = "DELETE FROM peminjaman WHERE id_peminjaman='$status' ";
    mysqli_query($koneksi, $query);
    header("Location: peminjaman/peminjaman.php");
}

if (isset($_GET['selesai'])) {
    $status = $_GET['selesai'];
    $query = "UPDATE peminjaman SET status=1 WHERE id_peminjaman='$status' ";
    mysqli_query($koneksi, $query);
    header("Location: peminjaman/peminjaman.php");
}
