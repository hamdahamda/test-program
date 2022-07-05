<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "test_program");
// Check connection
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// tambah siswa
function tambahsiswa($data)
{
    global $conn;
    $nis = htmlspecialchars($data["nis"]);
    $nama = htmlspecialchars($data["nama"]);
    $tgl = htmlspecialchars($data["tgl"]);
    $jekel = htmlspecialchars($data["jekel"]);

    $query = "INSERT INTO tbl_siswa
                VALUES
                ('$nis','$nama','$tgl','$jekel')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// tambah buku
function tambahbuku($data)
{
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $judul = htmlspecialchars($data["judul"]);
    $isbn = htmlspecialchars($data["isbn"]);
    $pengarang = htmlspecialchars($data["pengarang"]);

    $query = "INSERT INTO tbl_buku
                VALUES
                ('$id','$judul','$isbn','$pengarang')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// tambah pinjam
function tambahpinjam($data)
{
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $pinjam = htmlspecialchars($data["pinjam"]);
    $batas = htmlspecialchars($data["batas"]);
    $kembali = htmlspecialchars($data["kembali"]);
    $status = htmlspecialchars($data["status"]);
    $siswa = htmlspecialchars($data["siswa"]);
    $buku = htmlspecialchars($data["buku"]);

    $query = "INSERT INTO tbl_pinjam
                VALUES
                ('$id',
                '$pinjam',
                '$batas',
                '$kembali',
                '$status',
                '$siswa',
                '$buku')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// hapus siswa
function hapussiswa($idsiswa)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_siswa WHERE NIS = '$idsiswa' ");
    return mysqli_affected_rows($conn);
}

// hapus buku
function hapusbuku($idbuku)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_buku WHERE ID = '$idbuku' ");
    return mysqli_affected_rows($conn);
}


// hapus pinjam
function hapuspinjam($idpinjam)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_pinjam WHERE ID = '$idpinjam' ");
    return mysqli_affected_rows($conn);
}

// ubah siswa
function ubahsiswa($data)
{
    global $conn;
    $nis = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $tgl = htmlspecialchars($data["tgl"]);
    $jekel = htmlspecialchars($data["jekel"]);

    $query = "UPDATE tbl_siswa SET 
      NAMA='$nama',
      TGL_LAHIR= '$tgl',
      KELAMIN= '$jekel'
      WHERE 
      NIS= $nis ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// ubah buku
function ubahbuku($data)
{
    global $conn;
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $isbn = htmlspecialchars($data["isbn"]);
    $pengarang = htmlspecialchars($data["pengarang"]);

    $query = "UPDATE tbl_buku SET 
      JUDUL='$judul',
      ISBN= '$isbn',
      PENGARANG= '$pengarang'
      WHERE 
      ID= '$id' ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
