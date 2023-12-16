<?php
require '../config/function.php';
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
                    <h3>Kustomer</h3>
                    <a href="tambah-kustomer.php" class="btn btn-primary">Tambah</a>

                </div>

                <table class="table table-bordered">
                    <thead>
                        <th width="5%" class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Telp</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        $kustomer = query("SELECT * FROM kustomer");
                        $i = 1;
                        foreach ($kustomer as $k) :
                        ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td><?= $k['nama_kustomer']; ?></td>
                                <td><?= $k['alamat_kustomer']; ?></td>
                                <td><?= $k['telp_kustomer']; ?></td>
                                <td align="center">
                                    <button class="btn btn-warning" onclick="ubahkustomer('<?= $k['id_kustomer']; ?>')">
                                        Edit
                                    </button>

                                    <button class="btn btn-danger" onclick="hapuskustomer('<?= $k['id_kustomer']; ?>')">
                                        Hapus
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
        function hapuskustomer(data) {
            if (confirm("Hapus Data Kustomer?")) {
                window.location.href = "../hapusdata.php?hapuskustomer=" + data;
            } else {}
        }

        function ubahkustomer(data) {
            window.location.href = "ubah-kustomer.php?id_kustomer=" + data;
        }
    </script>
</body>

</html>