<?php

require 'functions.php';
// Tampil Data pinjam
$pinjam = query("SELECT tbl_pinjam.ID AS id, TGL_PINJAM, TGL_BATAS, TGL_KEMBALI, IF (tbl_pinjam.STATUS = '1', 'Kembali','Terpinjam') AS setatus, tbl_siswa.NAMA AS namasiswa,JUDUL
FROM tbl_pinjam INNER JOIN tbl_buku INNER JOIN tbl_siswa
ON tbl_pinjam.NIK =tbl_siswa.NIS AND tbl_pinjam.ID_BUKU =tbl_buku.ID;");
// siswa
$siswa = query("SELECT * from  tbl_siswa ORDER BY NIS  ASC;");
// buku
$buku = query("SELECT * from  tbl_buku ORDER BY ID  ASC");

if (isset($_POST["submit"])) {
    if (tambahpinjam($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambah');
              document.location.href='5.php'
            </script>
          ";
    } else {
        echo " <script>
                alert('Data Gagal Ditambah');
           
            </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/path/to/select2.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<body class="sb-nav-fixed">

    <!-- Modal -->

    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Pinjam</h5>

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
                                <div class="col-sm-6"><input type="date" class="form-control" id="pinjam" name="pinjam" required autocomplete="off" onchange="myFunction()"></div>
                            </div>
                        </div>

                        <!-- <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Tanggal Batas Pinjam</span></label>
                                <div class="col-sm-6"><input type="date" class="form-control" name="batas" placeholder="" required autocomplete="off">
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Tanggal Batas Pinjam</span></label>
                                <div class="col-sm-6">
                                    <p id="batas"></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Tanggal Kembali</span></label>
                                <div class="col-sm-6"><input type="date" class="form-control" name="kembali" required autocomplete="off"></div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Status</label>
                                <div class="col-sm-4">
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
                                <label class="col-sm-3 control-label text-right">Siswa</label>
                                <div class="col-sm-8">
                                    <select name="siswa" id="siswa" class="form-control" style="width: 100%">
                                        <option selected>---Pilih Siswa---</option>
                                        <?php
                                        foreach ($siswa as $row1) : ?>
                                            <option value="<?= $row1["NIS"]; ?>">
                                                <?= $row1["NAMA"]; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Buku</label>
                                <div class="col-sm-8">
                                    <select name="buku" id="buku" class="form-control" style="width: 100%">
                                        <option selected>---Pilih Buku---</option>
                                        <?php
                                        foreach ($buku as $row1) : ?>
                                            <option value="<?= $row1["ID"]; ?>">
                                                <?= $row1["JUDUL"]; ?>
                                            </option>
                                        <?php endforeach; ?>
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

                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                            <a href="u_5.php?id=<?= $row1["id"]; ?>" style="color :white;" class="btn btn-warning btn-sm">
                                                Ubah
                                            </a>
                                            <a href="h_5.php?id=<?= $row1["id"]; ?>" onclick="return confirm('Data Dihapus?');" style="color :white;" class="btn btn-danger btn-sm">
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


</body>
<?php include('script.php') ?>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
    $('#siswa').select2({
        dropdownParent: $('#exampleModal'),
        theme: 'bootstrap4'
    });
    $('#buku').select2({
        dropdownParent: $('#exampleModal'),
        theme: 'bootstrap4'
    });



    // function myFunction() {
    //     var d = new Date('pinjam');
    //     var text = d.toLocaleString()
    //     document.getElementById("batas").innerHTML = text;
    // }


    // let d = new Date('2021-08-17T08:41:06.147712+07:00');
    // var x = console.log(d.toLocaleDateString("id")); // "17/8/2021"
    // document.getElementById("batas").innerHTML = x;


    // var dateFormat = require('dateformat');
    // var now = new Date();
    // dateFormat(now, "dddd, mmmm dS, yyyy, h:MM:ss TT");
    // const dateFormatter = new Intl.DateTimeFormat('id', {
    //     day: 'numeric',
    //     month: 'long',
    //     weekday: "long",
    //     year: "numeric"
    // });

    // const date = new Date('pinjam');
    // console.log(date.toLocaleString(`en-US`));

    // const d = new Date('pinjam');
    // let text = d.toLocaleDateString();
    // document.getElementById("batas").innerHTML = text;


    const d = new Date();
    let text = d.toLocaleDateString();
    document.getElementById("batas1").innerHTML = text;


    const d = new Date('2021-08-17T08:41:06.147712+07:00');
    var e = new console.log(d.toLocaleDateString("id")); // "17/8/2021"
    document.getElementById("batas2").innerHTML = d;
</script>
</script>

</html>