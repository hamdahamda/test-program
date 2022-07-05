<?php

require 'functions.php';
// Tampil Data
$buku = query("SELECT * FROM tbl_buku");
if (isset($_POST["submit"])) {
    if (tambahbuku($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambah');
              document.location.href='4.php'
            </script>
          ";
    } else {
        echo " <script>
                alert('Data Gagal Ditambah');
              document.location.href='4.php'
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
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Buku</h5>

                </div>
                <div class="modal-body">
                    <form action="" method="post" role="form">

                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Id</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="id" placeholder="Id" value="" required autocomplete="off"></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Judul</span></label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="judul" placeholder="judul" value="" required autocomplete="off"></div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">ISBN</span></label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="isbn" placeholder="isbn" value="" required autocomplete="off"></div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Pengarang</span></label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="pengarang" placeholder="pengarang" value="" required autocomplete="off"></div>
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
                    <h1 class="mt-4">Tugas 4</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="#">Jawaban Tugas 4</a></li>
                        <li class="breadcrumb-item active">Jawaban</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            Buatlah program untuk editor data buku dengan 2 sub tampilan (tampilan list & editor) seperti
                            layout di bawah ini.
                        </div>
                    </div>
                    <!-- tabel 1 -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Buku
                        </div>
                        <!-- tombol tambah -->
                        <div class="card-header">

                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Tambah
                            </button>
                        </div>
                        <!-- end tombol tambah -->
                        <table class="table table-info table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>ID</th>
                                    <th>JUDUL</th>
                                    <th>ISBN</th>
                                    <th>PENGARANG</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($buku as $row1) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row1["ID"]; ?></td>
                                        <td><?= $row1["JUDUL"]; ?></td>
                                        <td><?= $row1["ISBN"]; ?></td>
                                        <td><?= $row1["PENGARANG"]; ?></td>
                                        <td>
                                            <a href="u_4.php?id=<?= $row1["ID"]; ?>" style="color :white;" class="btn btn-warning btn-sm">
                                                Ubah
                                            </a>
                                            <a href="h_4.php?id=<?= $row1["ID"]; ?>" onclick="return confirm('Data Dihapus?');" style="color :white;" class="btn btn-danger btn-sm">
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