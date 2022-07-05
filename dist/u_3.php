<?php

require 'functions.php';
// ambil data url
$id = $_GET["id"];

// query data
$data = query("SELECT * FROM tbl_siswa WHERE NIS = $id")[0];

if (isset($_POST["submit"])) {
    if (ubahsiswa($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
              document.location.href='3.php'
            </script>
          ";
    } else {
        echo " <script>
               alert('Data Gagal Diubah');
              document.location.href='3.php'
            </script>";
    }
}

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
                    <div class="container">
                        <form action="" method="post">

                            <input type="hidden" name="id" value="<?= $data["NIS"]; ?>">
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">NIS</label>
                                    <div class="col-sm-8"><input type="text" class="form-control" id="nis" name="nis" placeholder="NIS" value="<?= $data["NIS"] ?>" required autocomplete="off" disabled></div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Nama</label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= $data["NAMA"] ?>" required autocomplete="off"></div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Tanggal Lahir</span></label>
                                    <div class="col-sm-8"><input type="date" class="form-control" name="tgl" placeholder="tgl" value="<?= $data["TGL_LAHIR"] ?>" required autocomplete="off"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <select id="jekel" class="form-control" name="jekel">
                                            <option value="L" <?php if ($data['KELAMIN'] == 'L') {
                                                                    echo "selected";
                                                                } ?>>
                                                Laki-Laki
                                            </option>
                                            <option value="P" <?php if ($data['KELAMIN'] == 'P') {
                                                                    echo "selected";
                                                                } ?>>
                                                Perempuan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        Update Data
                                    </button>
                                    <button type="button" name="keluar" class="btn btn-danger">
                                        <a href="3.php" class="text-decoration-none text-white">Kembali</a>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
            <?php include('footer.php') ?>
        </div>
    </div>
    <?php include('script.php') ?>

</body>


</html>