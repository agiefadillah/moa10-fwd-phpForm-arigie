<?php
require '../config/function.php';
session_start();

if (isset($_POST['simpan'])) {
    if (tambahKustomer($_POST) > 0) {
        echo "<script>
       alert('Data Berhasil Ditambahkan');
       document.location.href = 'kustomer.php';
       </script>";
    } else {
        echo "<script>
    alert('Data Gagal Ditambahkan');
    document.location.href = 'kustomer.php';
    </script>";
    }
}

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
                    <h3>Form Tambah Kustomer</h3>
                    <a href="kustomer.php" class="btn btn-dark">Kembali</a>
                </div>

                <div class="container card-body col-sm-12 row">
                    <!-- isi -->
                    <form action="" method="POST">
                        <h5 class="card-title mt-4">Nama</h5>
                        <div class="col-sm">
                            <input type="text" class="form-control " placeholder="Masukan Nama Kustomer" name="nama_kustomer" required>
                        </div>

                        <h5 class="card-title mt-4">Alamat</h5>
                        <div class="col-sm">
                            <input type="text" class="form-control " placeholder="Masukan Alamat Kustomer" name="alamat_kustomer" required>
                        </div>

                        <h5 class="card-title mt-4">Nomor Telepon</h5>
                        <div class="col-sm">
                            <input type="text" class="form-control " placeholder="Masukan Nomor Telepon Kustomer" name="telp_kustomer" required>
                        </div>

                        <div class="col-sm mt-4">
                            <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                        </div>
                    </form>

                </div>
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

</body>

</html>