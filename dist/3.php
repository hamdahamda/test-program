<?php

require 'functions.php';
// Tampil Data
$siswa = query("SELECT * FROM tbl_siswa");


if (isset($_POST["submit"])) {
    if (tambahsiswa($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambah');
              document.location.href='3.php'
            </script>
          ";
    } else {
        echo " <script>
                alert('Data Gagal Ditambah');
              document.location.href='3.php'
            </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>

<body class="sb-nav-fixed">

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah siswa</h5>

                </div>
                <div class="modal-body">
                    <form action="" method="post" role="form">
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">NIS</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="nis" placeholder="NIS" value="" required autocomplete="off"></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Nama</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama" value="" required autocomplete="off"></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Tanggal Lahir</span></label>
                                <div class="col-sm-8"><input type="date" class="form-control" name="tgl" placeholder="tgl" value="" required autocomplete="off"></div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <select name="jekel" class="form-control select2" style="width: 100%;">

                                        <option value="L">Laki Laki</option>
                                        <option value="P">Perempuan</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Batal</button>
                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- end modal -->

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
                    <h1 class="mt-4">Tugas 3</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="#">Jawaban Tugas 3</a></li>
                        <li class="breadcrumb-item active">Jawaban</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            3. Buatlah program untuk editor data siswa dengan 2 sub tampilan (list,editor) seperti layout di bawah ini.
                        </div>
                    </div>
                    <!-- tabel 1 -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Siswa
                        </div>
                        <!-- tombol tambah -->
                        <div class="card-header">

                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Tambah
                            </button>
                        </div>
                        <!-- end tombol tambah -->
                        <table class="table table-warning table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIS</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>AKSI</th>
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
                                        <td>
                                            <a href="u_3.php?id=<?= $row1["NIS"]; ?>" style="color :white;" class="btn btn-warning btn-sm">
                                                Ubah
                                            </a>
                                            <a href="h_3.php?id=<?= $row1["NIS"]; ?>" onclick="return confirm('Data Dihapus?');" style="color :white;" class="btn btn-danger btn-sm">
                                                Hapus
                                            </a>

                                        </td>
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