<?php
include "connection.php";

$id_mahasiswa = $_GET['id_mahasiswa'];
$result = $conn->query("DELETE FROM mahasiswa WHERE id_mahasiswa='$id_mahasiswa'");


$conn->close();
header("location:daftar-mahasiswa.php");

?>