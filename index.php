<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include "connection.php";
$id = $_GET['id_mahasiswa'];
$data = [];
if (!empty($id)) {
    $result = $conn->query("SELECT * FROM mahasiswa WHERE id_mahasiswa='$id'");
    $data = $result->fetch_assoc();
}

?>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Form Data Mahasiswa</h3>
        </div>

        <div class="card-body">
            <form action="insert.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" value="<?= $id ?>" name="id_mahasiswa" />
                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" name="nama" value="<?= $data['nama']; ?>">
                </div>

                <!-- NIM -->
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" placeholder="Masukkan NIM" name="nim" value="<?= $data['nim']; ?>">
                </div>

                <!-- Gender -->
                <div class="mb-3">
                    <label class="form-label d-block">Gender</label>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="L" <?php if ($data['jenis_kelamin'] == "L") echo "checked" ?>>
                        <label class="form-check-label" for="laki">Laki-laki</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P" <?php if ($data['jenis_kelamin'] == "P") echo "checked" ?>>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>">
                </div>

                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <select class="form-select" id="agama" name="agama" required>
                        <option selected disabled value="">Pilih Agama</option>
                        <option value="Islam" <?php if($data['agama'] == "Islam") echo "selected"; ?> >Islam</option>
                        <option value="Kristen" <?php if($data['agama'] == "Kristen") echo "selected"; ?>>Kristen</option>
                        <option value="Katolik" <?php if($data['agama'] == "Katolik") echo "selected"; ?>>Katolik</option>
                        <option value="Hindu" <?php if($data['agama'] == "Hindu") echo "selected"; ?>>Hindu</option>
                        <option value="Buddha" <?php if($data['agama'] == "Budha") echo "selected"; ?>>Buddha</option>
                        <option value="Konghucu" <?php if($data['agama'] == "Konghucu") echo "selected"; ?>>Konghucu</option>
                    </select>
                </div>

                <!-- Program Studi -->
                <div class="mb-3">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <select class="form-select" id="prodi" name="prodi">
                        <?php
                        $result = $conn->query("SELECT * from prodi");
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?= $row['id_prodi'] ?>" <?php if($data['id_prodi'] == $row['id_prodi']) echo "selected" ?>><?= $row['nama_prodi'] ?></option>
                           <?php }
                        } ?>
                    </select>
                </div>

                <div class="mb-3">
                        <label class="form-label d-block">UKM</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="seni" name="ukm[]" value="Seni" <?php if (str_contains($data['ukm'], "Seni")) echo "checked"; ?>>
                            <label class="form-check-label" for="seni">Seni</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="olahraga" name="ukm[]" value="Olahraga" <?php if (str_contains($data['ukm'], "Olahraga")) echo "checked"; ?>>
                            <label class="form-check-label" for="olahraga">Olahraga</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="robotika" name="ukm[]" value="Robotika" <?php if (str_contains($data['ukm'], "Robotika")) echo "checked"; ?>>
                            <label class="form-check-label" for="robotika">Robotika</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="pemrograman" name="ukm[]" value="Pemrograman" <?php if (str_contains($data['ukm'], "Pemrograman")) echo "checked"; ?>>
                            <label class="form-check-label" for="pemrograman">Pemrograman</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="kerohanian" name="ukm[]" value="Kerohanian" <?php if (str_contains($data['ukm'], "Kerohanian")) echo "checked"; ?>>
                            <label class="form-check-label" for="kerohanian">Kerohanian</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload Pass Foto</label>
                        <input class="form-control" type="file" id="foto" name="foto_profil" accept="image/*" required>
                        <img src="uploads/<?= $data['foto_profil'] ?>" width="200px" />
                    </div>

                <!-- Tombol -->
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>

                <button type="reset" class="btn btn-secondary">
                    Reset
                </button>

            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>