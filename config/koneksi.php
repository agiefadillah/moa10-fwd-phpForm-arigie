<?php
$server = "127.0.0.1";
$user = "root";
$password = "";
$db = "naungan";

$koneksi = mysqli_connect($server, $user, $password, $db);

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
