<?php
include "connection.php";
?>
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
    <div class="container" style="margin-top:1rem">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nama</th><th>NIM</th><th>Jenis Kelamin</th><th>Tanggal Lahir</th><th>Agama</th><th>UKM</th><th>Foto Profil</th><th>Aksi</th>
        </tr>
      </thead>
    </tbody>     
    <?php
    $query = "SELECT * FROM mahasiswa";
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            ?>
              <tr>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['nim']; ?></td>
                <td><?= $row['jenis_kelamin'] ?></td> 
                <td><?= $row['tanggal_lahir'] ?></td>
                <td><?= $row['agama'] ?></td>
                <td><?= $row['ukm'] ?></td>  
                <td><img src="uploads/<?= $row['foto_profil'] ?>" width="50px" /></td>
                <td>
                  <a href="index.php?id_mahasiswa=<?= $row['id_mahasiswa']; ?>&nama_mahasiswa=<?= $row['nama']; ?>"> <button class="btn btn-sm btn-primary">Edit</button></a>
                <a href="delete.php?id_mahasiswa=<?= $row['id_mahasiswa']; ?>&nama_mahasiswa=<?= $row['nama']; ?>"> <button class="btn btn-sm btn-danger">Delete</button></a></td>
          <?php }
              }
          ?>
    </tbody>
    </table>
</div>
  </body>
</html>

