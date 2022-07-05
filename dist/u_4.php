<?php

require 'functions.php';
// ambil data url
$id = $_GET["id"];

// query data
$data = query("SELECT * FROM tbl_buku WHERE ID = '$id' ")[0];

if (isset($_POST["submit"])) {
    if (ubahbuku($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
              document.location.href='4.php'
            </script>
          ";
    } else {
        echo " <script>
               alert('Data Gagal Diubah');
              document.location.href='4.php'
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
                    <h1 class="mt-4">Tugas 4</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="#">Jawaban Tugas 4</a></li>
                        <li class="breadcrumb-item active">Jawaban</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            4. Buatlah program untuk editor data buku dengan 2 sub tampilan (tampilan list & editor) seperti
                            layout di bawah ini.
                        </div>
                    </div>
                    <div class="container">
                        <form action="" method="post">

                            <input type="hidden" name="id" value="<?= $data["ID"]; ?>">
                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Id</label>
                                    <div class="col-sm-8"><input type="text" class="form-control" id="id" name="id" placeholder="id" value="<?= $data["ID"] ?>" required autocomplete="off" disabled></div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Judul</label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="judul" placeholder="judul" value="<?= $data["JUDUL"] ?>" required autocomplete="off"></div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">ISBN</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="isbn" placeholder="isbn" value="<?= $data["ISBN"] ?>" required autocomplete="off"></div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="row">
                                    <label class="col-sm-3 control-label text-right">Pengarang</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="pengarang" placeholder="pengarang" value="<?= $data["PENGARANG"] ?>" required autocomplete="off"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        Update Data
                                    </button>
                                    <button type="button" name="keluar" class="btn btn-danger">
                                        <a href="4.php" class="text-decoration-none text-white">Kembali</a>
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