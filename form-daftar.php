<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Form Pendaftaran | SMA Budi Pekerti</title>
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
      <h2>Formulir Pendaftaran — SMA Budi Pekerti</h2>
      <form action="proses-pendaftaran.php" method="POST">
        <fieldset class="form-grid">
          <label>
            <span>Nama Lengkap</span>
            <input type="text" name="nama" placeholder="John Doe" required>
          </label>

          <label>
            <span>Alamat</span>
            <textarea name="alamat" rows="3" placeholder="Jl. Contoh No. 123" required></textarea>
          </label>

          <div>
            <span>Jenis Kelamin</span>
            <div class="radio-row">
              <label><input type="radio" name="jenis_kelamin" value="Laki-Laki" required> Laki-Laki</label>
              <label><input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan</label>
            </div>
          </div>

          <label>
            <span>Agama</span>
            <select name="agama" required>
              <option>Protestan</option>
              <option>Katolik</option>
              <option>Buddha</option>
              <option>Hindu</option>
              <option>Islam</option>
              <option>Konghucu</option>
            </select>
          </label>

          <label>
            <span>Sekolah Asal</span>
            <input type="text" name="sekolah_asal" placeholder="SMP / sekolah sebelumnya" required>
          </label>

          <button class="btn" type="submit" name="daftar" value="1">Daftar</button>
        </fieldset>
      </form>
    </div>
  </div>
</body>
</html>