<?php
require 'functions.php';

$idbuku = $_GET["id"];
if (hapuspinjam(
  $idbuku = $_GET["id"]
) > 0) {
  echo "
      <script>
        alert('Data Berhasil Dihapus');
      document.location.href='5.php'
      </script>";
} else {
  echo "
      <script>
          alert('Data Gagal Dihapus');
          document.location.href='5.php'
        
      </script>";
}
