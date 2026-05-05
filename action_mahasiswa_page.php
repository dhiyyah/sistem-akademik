<?php
include "connection.php";

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$id_prodi = $_POST['prodi'];

echo "<h4>Selamat Datang ".$nama."</h4>";
$query = "INSERT into mahasiswa (nama, nim, id_prodi) VALUES ('$nama', '$nim', '$id_prodi')";
$result = $conn->query($query);
if ($result) {
    echo "Simpan data atas nama ".$nama.", NIM ".$nim." Berhasil ";
} else {
    echo "Gagal simpan data";
}



?>