<?php
include ('connection.php');

$nama          = $_POST['nama'];
$nim           = $_POST['nim'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$agama         = $_POST['agama'];
$prodi = $_POST['prodi'];
$ukm = isset($_POST['ukm']) ? implode(", ", $_POST['ukm']) : "-";

$foto_profil = '';
if (isset($_FILES['foto_profil']) && !empty($_FILES['foto_profil']['name'])) {
    $foto_profil = $_FILES['foto_profil']['name'];
    $tmp_name    = $_FILES['foto_profil']['tmp_name'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($foto_profil);
    if (move_uploaded_file($targetFile, $targetFile)) {
        echo "File berhasil diupload.";
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload.";
    } 
}


$id = $_POST['id_mahasiswa'];
echo $id;

if ($id && $id != '') {
    // jika ada id
    $sql = "UPDATE mahasiswa SET nama='$nama',
        nim='$nim', agama='$agama', ukm='$ukm',
        jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir'
        WHERE id_mahasiswa='$id'";
    $script = "<script>
        alert('Data mahasiswa berhasil diubah!');
        window.location.href = 'index.html';
        </script>";
} else {
    $sql = "INSERT INTO mahasiswa (jenis_kelamin, tanggal_lahir, nama, nim, agama, ukm, foto_profil, id_prodi) 
        VALUES ('$jenis_kelamin', '$tanggal_lahir', '$nama', '$nim', '$agama', '$ukm', '$foto_profil', '$prodi')";
    
    $script = "<script>
        alert('Data mahasiswa berhasil disimpan!');
        window.location.href = 'index.html';
        </script>";
}

if ($conn->query($sql) === TRUE) {
    echo $script;
    header("location:daftar-mahasiswa.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>