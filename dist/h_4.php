<?php
require 'functions.php';

$idbuku = $_GET["id"];
if (hapusbuku(
  $idbuku = $_GET["id"]
) > 0) {
  echo "
      <script>
        alert('Data Berhasil Dihapus');
      document.location.href='4.php'
      </script>";
} else {
  echo "
      <script>
          alert('Data Gagal Dihapus');
          document.location.href='4.php'
        
      </script>";
}
