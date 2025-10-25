<?php
include "config.php";
if (!isset($_GET['id'])) { header("Location: list-siswa.php"); exit; }
$id = (int) $_GET['id'];
$q  = mysqli_query($db, "SELECT * FROM calon_siswa WHERE id=$id");
if (mysqli_num_rows($q) < 1) die("data tidak ditemukan...");
$s = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Edit Pendaftar | SMA Budi Pekerti</title>
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
      <h2>Edit Data Pendaftar</h2>
      <form action="proses-edit.php" method="POST">
        <fieldset class="form-grid">
          <input type="hidden" name="id" value="<?php echo $s['id']; ?>">

          <label>
            <span>Nama Lengkap</span>
            <input type="text" name="nama" value="<?php echo htmlspecialchars($s['nama']); ?>" required>
          </label>

          <label>
            <span>Alamat</span>
            <textarea name="alamat" rows="3" required><?php echo htmlspecialchars($s['alamat']); ?></textarea>
          </label>

          <div>
            <span>Jenis Kelamin</span>
            <div class="radio-row">
              <?php $jk = $s['jenis_kelamin']; ?>
              <label><input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php echo ($jk==='Laki-Laki'?'checked':''); ?>> Laki-Laki</label>
              <label><input type="radio" name="jenis_kelamin" value="Perempuan"  <?php echo ($jk==='Perempuan'?'checked':''); ?>> Perempuan</label>
            </div>
          </div>

          <label>
            <span>Agama</span>
            <?php $agama = $s['agama']; $ops = ['Protestan','Katolik','Buddha','Hindu','Islam','Konghucu']; ?>
            <select name="agama" required>
              <?php foreach ($ops as $o): ?>
                <option <?php echo ($agama===$o?'selected':''); ?>><?php echo $o; ?></option>
              <?php endforeach; ?>
            </select>
          </label>

          <label>
            <span>Sekolah Asal</span>
            <input type="text" name="sekolah_asal" value="<?php echo htmlspecialchars($s['sekolah_asal']); ?>" required>
          </label>

          <button class="btn" type="submit" name="simpan" value="1">Simpan</button>
        </fieldset>
      </form>
    </div>
  </div>
</body>
</html>