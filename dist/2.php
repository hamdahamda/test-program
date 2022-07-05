<?php

require 'functions.php';
// Tampil Data
$siswa = query("SELECT * FROM tbl_siswa");
$buku = query("SELECT * FROM tbl_buku");
$pinjam = query("SELECT * FROM tbl_pinjam");
// update data

?>

<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

        <a class="navbar-brand ps-3" href="index.php">Hamda</a>

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <?php include('sidebar.php'); ?>
                </div>
                <?php include('username.php'); ?>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tugas 2</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="#">Jawaban Tugas 2</a></li>
                        <li class="breadcrumb-item active">Jawaban</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            2. Buatlah table dengan data seperti di bawah ini menggunakan database MySQL.
                        </div>
                    </div>
                    <!-- tabel 1 -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Siswa
                        </div>
                        <table class="table table-success table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIS</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th>JENIS KELAMIN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa as $row1) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row1["NIS"]; ?></td>
                                        <td><?= $row1["NAMA"]; ?></td>
                                        <td><?= $row1["TGL_LAHIR"]; ?></td>
                                        <td><?= $row1["KELAMIN"]; ?></td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>


                    <!-- tabel 2 -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Buku
                        </div>
                        <table class="table table-warning table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>ID</th>
                                    <th>JUDUL</th>
                                    <th>ISBN</th>
                                    <th>PENGARANG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($buku as $row2) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row2["ID"]; ?></td>
                                        <td><?= $row2["JUDUL"]; ?></td>
                                        <td><?= $row2["ISBN"]; ?></td>
                                        <td><?= $row2["PENGARANG"]; ?></td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- tabel 3 -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Pinjam
                        </div>
                        <table class="table table-info table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>ID</th>
                                    <th>TGL PINJAM</th>
                                    <th>TGL BATAS</th>
                                    <th>TGL KEMBALI</th>
                                    <th>STATUS</th>
                                    <th>NIK</th>
                                    <th>ID BUKU</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pinjam as $row3) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row3["ID"]; ?></td>
                                        <td><?= $row3["TGL_PINJAM"]; ?></td>
                                        <td><?= $row3["TGL_BATAS"]; ?></td>
                                        <td><?= $row3["TGL_KEMBALI"]; ?></td>
                                        <td><?= $row3["STATUS"]; ?></td>
                                        <td><?= $row3["NIK"]; ?></td>
                                        <td><?= $row3["ID_BUKU"]; ?></td>

                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

                </div>


            </main>
            <?php include('footer.php') ?>
        </div>
    </div>
    <?php include('script.php') ?>
</body>

</html>