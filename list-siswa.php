<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Daftar Pendaftar | SMA Budi Pekerti</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <header class="site">
      <div class="brand">Pendaftaran Siswa Baru</div>
      <nav class="menu">
        <ul>
          <li><a href="form-daftar.php">Daftar Baru</a></li>
          <li><a href="list-siswa.php">Pendaftar</a></li>
        </ul>
      </nav>
    </header>

    <div class="card">
      <div style="display:flex;align-items:center;justify-content:space-between;gap:12px;">
        <h2>Daftar Pendaftar</h2>
        <a class="btn" href="form-daftar.php">+ Tambah Baru</a>
      </div>

      <div class="table-wrap" style="margin-top:12px;">
        <table>
          <thead>
            <tr>
              <th>No</th><th>Nama</th><th>Alamat</th><th>Jenis Kelamin</th>
              <th>Agama</th><th>Sekolah Asal</th><th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM calon_siswa";
              $query = mysqli_query($db, $sql);
              while ($s = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>{$s['id']}</td>";
                echo "<td>".htmlspecialchars($s['nama'])."</td>";
                echo "<td>".htmlspecialchars($s['alamat'])."</td>";
                echo "<td>".htmlspecialchars($s['jenis_kelamin'])."</td>";
                echo "<td>".htmlspecialchars($s['agama'])."</td>";
                echo "<td>".htmlspecialchars($s['sekolah_asal'])."</td>";
                echo "<td class='actions'>
                        <a href='form-edit.php?id={$s['id']}'>Edit</a>
                        <a href='hapus.php?id={$s['id']}'>Hapus</a>
                      </td>";
                echo "</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
      <small class="muted">Total: <?php echo mysqli_num_rows($query ?? null) ?: 0; ?> pendaftar</small>
    </div>
  </div>
</body>
</html>