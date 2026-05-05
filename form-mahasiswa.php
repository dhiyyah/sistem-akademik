<?php
include "connection.php";
?>
<html>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
    <form action="action_mahasiswa_page.php" method="POST">
        <div class="container">
            <div class="mb-3 mt-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" placeholder="Nama Mahasiswa " name="nama">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">NIM:</label>
                <input type="text" class="form-control" id="nim" placeholder="Enter password" name="nim">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Prodi:</label>
                <select class="form-select" name="prodi">
                    <?php
                    $result = $conn->query("SELECT * from prodi");
                    while($row = $result->fetch_assoc()) { ?>
                        <option value="<?= $row['id_prodi']?>"><?= $row['nama_prodi']; ?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="form-check mb-3">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</body>
</html>