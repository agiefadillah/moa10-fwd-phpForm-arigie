<?php
require '../config/function.php';
date_default_timezone_set("Asia/Jakarta");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>naungan</title>
    <link rel="icon" href="../assets/images/naungan-icon.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- EF5D37 -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-dark bg-dark rounded">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../assets/images/naungan-txt-orange.png" alt="" width="100" class="d-inline-block align-text-top" />
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarsExample01">
                    <ul class="navbar-nav me-auto mb-2">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products and Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                    </ul>
                    <form role="search">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                    </form>
                </div>
            </div>
        </nav>

        <main class="container">
            <div class="container col-sm-12 px-2 py-5 row mb-2">
                <div class="d-flex justify-content-between align-items-center pb-2 mb-2">
                    <h3>Peminjaman</h3>
                    <a href="tambah-peminjaman.php" class="btn btn-primary">Tambah</a>

                </div>

                <table class="table table-bordered">
                    <thead>
                        <th width="5%" class="text-center">No</th>
                        <th class="text-center">Nama Kustomer</th>
                        <th class="text-center">Model Mobil</th>
                        <th class="text-center">Tanggal Pinjam</th>
                        <th class="text-center">Tanggal Kembali</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        $peminjamanQuery = "SELECT
                        p.id_peminjaman,
                        k.nama_kustomer,
                        m.model_mobil,
                        DATE_FORMAT(p.tanggal_pinjam, '%d-%m-%Y') as tanggal_pinjam,
                        DATE_FORMAT(p.tanggal_kembali, '%d-%m-%Y') as tanggal_kembali,
                        p.status
                    FROM
                        peminjaman p
                        JOIN kustomer k ON p.id_kustomer = k.id_kustomer
                        JOIN mobil m ON p.id_mobil = m.id_mobil
                        ORDER BY p.tanggal_pinjam ASC";

                        $peminjamanData = query($peminjamanQuery);

                        $i = 1;
                        $ini = date("d-m-Y");
                        foreach ($peminjamanData as $p) :
                        ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td class="text-center"><?= $p['nama_kustomer']; ?></td>
                                <td class="text-center"><?= $p['model_mobil']; ?></td>
                                <td class="text-center"><?= $p['tanggal_pinjam']; ?></td>
                                <td class="text-center"><?= $p['tanggal_kembali']; ?></td>
                                <td class="text-center">
                                    <?php
                                    $tanggal = $p['tanggal_kembali'];
                                    if ($p['status'] == 0) {
                                        $tgl1 = new DateTime($ini);
                                        $tgl2 = new DateTime($tanggal);
                                        $d = $tgl2->diff($tgl1)->days + 1;
                                        $e = $tgl2->diff($tgl1)->days;

                                        if ($tgl2 < $tgl1) {
                                            $denda = 100000;
                                            $totalDenda = $e * $denda;
                                            echo "<p style='color:red;'>Terlambat " . $e . " Hari<br/>Denda Rp. " . number_format($totalDenda, 0, ',', '.') . "</p>";
                                        } else {
                                            if ($d == 1) {
                                                echo "Hari Terakhir";
                                            } else {
                                                echo $d . " Hari Lagi";
                                            }
                                        }
                                    } else {
                                        echo "<p style='color:green;'>Peminjaman Selesai</p>";
                                    }
                                    ?>
                                </td>
                                <td align="center">
                                    <button class="btn btn-warning" onclick="ubahpeminjaman('<?= $p['id_peminjaman']; ?>')">
                                        Edit
                                    </button>

                                    <button class="btn btn-danger" onclick="hapuspeminjaman('<?= $p['id_peminjaman']; ?>')">
                                        Hapus
                                    </button>

                                    <button class="btn btn-success" onclick="selesai('<?= $p['id_peminjaman']; ?>')">
                                        Selesai
                                    </button>
                                </td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>

        <footer class="container footer mt-auto bg-dark text-white text-center py-3 rounded fixed-bottom">
            <div class="container">
                <img src="../assets/images/naungan-txt-orange.png" alt="" width="100" class="d-inline-block align-text-top" />
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        function hapuspeminjaman(data) {
            if (confirm("Hapus Data Mobil?")) {
                window.location.href = "../hapusdata.php?hapuspeminjaman=" + data;
            }
        }

        function ubahpeminjaman(data) {
            window.location.href = "ubah-peminjaman.php?id_peminjaman=" + data;
        }

        function selesai(data) {
            if (confirm("Peminjaman Selesai?")) {
                window.location.href = "../hapusdata.php?selesai=" + data;
            }
        }
    </script>
</body>

</html>