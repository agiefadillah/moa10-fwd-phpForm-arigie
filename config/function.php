<?php
date_default_timezone_set("Asia/Jakarta");
include 'koneksi.php';


function tambahKustomer($data)
{
    global $koneksi;

    $nama = $data['nama_kustomer'];
    $alamat = $data['alamat_kustomer'];
    $telp = $data['telp_kustomer'];

    $query = "INSERT INTO kustomer (nama_kustomer, alamat_kustomer, telp_kustomer) VALUES ('$nama', '$alamat', '$telp')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function ubahKustomer($data)
{
    global $koneksi;

    $id = $data['id_kustomer'];
    $nama = $data['nama_kustomer'];
    $alamat = $data['alamat_kustomer'];
    $telp = $data['telp_kustomer'];

    $query = "UPDATE kustomer SET
    nama_kustomer='$nama',
    alamat_kustomer='$alamat',
    telp_kustomer='$telp' WHERE id_kustomer='$id'";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function tambahMobil($data)
{
    global $koneksi;

    $model = $data['model_mobil'];
    $nopol = $data['nopol_mobil'];
    $tahun = $data['tahun_mobil'];

    $query = "INSERT INTO mobil (model_mobil, nopol_mobil, tahun_mobil) VALUES ('$model', '$nopol', '$tahun')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function ubahMobil($data)
{
    global $koneksi;

    $id = $data['id_mobil'];
    $model = $data['model_mobil'];
    $nopol = $data['nopol_mobil'];
    $tahun = $data['tahun_mobil'];

    $query = "UPDATE mobil SET
    model_mobil='$model',
    nopol_mobil='$nopol',
    tahun_mobil='$tahun' WHERE id_mobil='$id'";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function tambahPeminjaman($data)
{
    global $koneksi;

    $id_kustomer = $data['id_kustomer'];
    $id_mobil = $data['id_mobil'];
    $tanggal_kembali = $data['tanggal_kembali'];

    $query = "INSERT INTO peminjaman (id_kustomer, id_mobil, tanggal_pinjam, tanggal_kembali, status) VALUES ('$id_kustomer', '$id_mobil', NOW() ,'$tanggal_kembali', '0')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function ubahPeminjaman($data)
{
    global $koneksi;

    $id_peminjaman = $data['id_peminjaman'];
    $id_kustomer = $data['id_kustomer'];
    $id_mobil = $data['id_mobil'];
    $tanggal_kembali = $data['tanggal_kembali'];

    $query = "UPDATE peminjaman SET
        id_kustomer='$id_kustomer',
        id_mobil='$id_mobil',
        tanggal_kembali='$tanggal_kembali',
        status='0'
        WHERE id_peminjaman='$id_peminjaman'";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
