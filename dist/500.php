<?php

require 'functions.php';
// Tampil Data

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
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Pinjam</h5>

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
                                <label class="col-sm-3 control-label text-right">Tanggal Pinjam</span></label>
                                <div class="col-sm-8"><input type="date" class="form-control" name="pinjam" placeholder="" value="" required autocomplete="off"></div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Tanggal Batas</span></label>
                                <div class="col-sm-8"><input type="date" class="form-control" name="batas" placeholder="-" disabled value="<?php echo $date_plus->format("Y-m-d"); ?>" required autocomplete="off"></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Tanggal Kembali</span></label>
                                <div class="col-sm-8"><input type="date" class="form-control" name="kembali" placeholder="" value="" required autocomplete="off"></div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Status</label>
                                <div class="col-sm-8">
                                    <select name="status" class="form-control select2" style="width: 100%;">
                                        <option selected>Pilih..</option>
                                        <option value="0">Terpinjam</option>
                                        <option value="1">Kembali</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">NIS</span></label>
                                <div class="col-sm-8">
                                    <select name="buku" id="buku" class="form-control">
                                        <option value="">Pilih Siswa..</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">ID Buku</span></label>
                                <div class="col-sm-8">

                                    <select name="buku" id="buku" class="form-control">
                                        <option value="">Pilih Buku..</option>

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
                    <h1 class="mt-4">Tugas 5</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="#">Jawaban Tugas 5</a></li>
                        <li class="breadcrumb-item active">Jawaban</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            5. Buatlah program untuk editor data transaksi peminjaman buku seperti contoh layout di bawah ini.
                        </div>
                    </div>
                    <!-- tabel 1 -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Pinjam
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
                                    <th>PINJAM</th>
                                    <th>BATAS</th>
                                    <th>KEMBALI</th>
                                    <th>STATUS</th>
                                    <th>SISWA</th>
                                    <th>BUKU</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pinjam as $row1) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row1["id"]; ?></td>
                                        <td><?= $row1["TGL_PINJAM"]; ?></td>
                                        <td><?= $row1["TGL_BATAS"]; ?></td>
                                        <td><?= $row1["TGL_KEMBALI"]; ?></td>
                                        <td><?= $row1["setatus"]; ?></td>
                                        <td><?= $row1["namasiswa"]; ?></td>
                                        <td><?= $row1["JUDUL"]; ?></td>
                                        <td>
                                            <a href="u_4.php?id=<?= $row1["id"]; ?>" style="color :white;" class="btn btn-warning btn-sm">
                                                Ubah
                                            </a>
                                            <a href="h_4.php?id=<?= $row1["id"]; ?>" onclick="return confirm('Data Dihapus?');" style="color :white;" class="btn btn-danger btn-sm">
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