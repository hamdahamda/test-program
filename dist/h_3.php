<?php
require 'functions.php';

$idsiswa = $_GET["id"];
if (hapussiswa(
    $idsiswa = $_GET["id"]
) > 0) {
    echo "
      <script>
        alert('Data Berhasil Dihapus');
      document.location.href='3.php'
      </script>";
} else {
    echo "
      <script>
          alert('Data Gagal Dihapus');
          document.location.href='3.php'
        
      </script>";
}
