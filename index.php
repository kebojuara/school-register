<?php  ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Pendaftaran | SMA Budi Pekerti</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <section class="hero">
      <span class="kicker">SMA Budi Pekerti • Tahun Ajaran Baru</span>
      <h1>Sekolah untuk Prestasi & Karakter, <br>Berdaya Saing Global.</h1>
      <p class="lead">
        Kami menggabungkan kurikulum holistik, bimbingan personal, dan budaya berintegritas
        untuk mempersiapkan siswa menghadapi perguruan tinggi dan dunia kerja.
      </p>
      <div class="cta">
        <a class="btn primary" href="form-daftar.php">Daftar Sekarang</a>
        <a class="btn" href="list-siswa.php">Lihat Pendaftar</a>
      </div>
    </section>

    <section class="card section">
      <h2>Kenapa memilih SMA Budi Pekerti?</h2>
      <ul class="clean">
        <li><strong>Kurikulum holistik</strong> yang menyeimbangkan akademik, karakter, dan kreativitas.</li>
        <li><strong>Guru berpengalaman</strong> dengan pembelajaran modern dan personal.</li>
        <li><strong>Fasilitas relevan</strong> (lab, perpustakaan, ruang multimedia) untuk praktik nyata.</li>
        <li><strong>Pembinaan karakter</strong> menumbuhkan integritas, empati, dan disiplin.</li>
        <li><strong>Ekstrakurikuler beragam</strong>: sains, olahraga, seni, kepemimpinan, wirausaha.</li>
        <li><strong>Kemitraan</strong> dengan kampus dan industri untuk pemetaan karier sejak dini.</li>
      </ul>
    </section>

    <section class="card section reviews">
      <h2>Kata Mereka</h2>
      <div class="carousel" id="carousel">
        <div class="track" id="track">
          <article class="slide">
            <div class="stars" aria-label="Rating 5 dari 5">
              <?php
                function starSvg($filled=true){
                  $fill = $filled ? '#f5c14b' : 'none';
                  $stroke = $filled ? '#f5c14b' : '#f5c14b';
                  return '<span class="star"><svg viewBox="0 0 24 24" fill="'.$fill.'" stroke="'.$stroke.'" stroke-width="1.2"><path d="M12 3.5l2.9 5.9 6.5.9-4.7 4.6 1.1 6.4L12 18.8 6.2 21.3l1.1-6.4-4.7-4.6 6.5-.9L12 3.5z"/></svg></span>';
                }
                echo starSvg(true).starSvg(true).starSvg(true).starSvg(true).starSvg(true);
              ?>
            </div>
            <p>
              “Lingkungan belajarnya kondusif dan suportif. Guru-gurunya sangat membantu,
              bukan hanya soal nilai, tapi juga pengembangan karakter.”
            </p>
            <div class="reviewer">
              <div class="avatar">AN</div>
              <div>
                <div><strong>Andini N.</strong></div>
                <div class="role">Orang Tua Siswa</div>
              </div>
            </div>
          </article>

          <article class="slide">
            <div class="stars" aria-label="Rating 4 dari 5">
              <?php echo starSvg(true).starSvg(true).starSvg(true).starSvg(true).starSvg(false); ?>
            </div>
            <p>
              “Ekstrakurikulernya banyak pilihan. Anak saya jadi menemukan minatnya di robotik
              dan sekarang aktif ikut kompetisi.”
            </p>
            <div class="reviewer">
              <div class="avatar">RB</div>
              <div>
                <div><strong>Rizky B.</strong></div>
                <div class="role">Wali Murid</div>
              </div>
            </div>
          </article>

          <article class="slide">
            <div class="stars" aria-label="Rating 5 dari 5">
              <?php echo starSvg(true).starSvg(true).starSvg(true).starSvg(true).starSvg(true); ?>
            </div>
            <p>
              “Pembelajarannya kekinian, banyak proyek dan presentasi. Bimbingan masuk PTN juga
              terstruktur. Keren!”
            </p>
            <div class="reviewer">
              <div class="avatar">DF</div>
              <div>
                <div><strong>Daffa F.</strong></div>
                <div class="role">Alumni 2024</div>
              </div>
            </div>
          </article>
        </div>

        <div class="ctrl prev"><button id="prevBtn" aria-label="Sebelumnya">‹</button></div>
        <div class="ctrl next"><button id="nextBtn" aria-label="Berikutnya">›</button></div>
      </div>
    </section>

    <?php if (isset($_GET['status'])): ?>
      <section class="card section">
        <h3>Status</h3>
        <div class="notice">
          <?php echo ($_GET['status']==='sukses') ? "Pendaftaran berhasil!" : "Pendaftaran gagal!"; ?>
        </div>
      </section>
    <?php endif; ?>
  </div>

  <script>
    (function(){
      const track = document.getElementById('track');
      const prev = document.getElementById('prevBtn');
      const next = document.getElementById('nextBtn');
      let index = 0;

      function update(){
        track.style.transform = `translateX(${index * -100}%)`;
      }
      next.addEventListener('click', () => {
        index = (index + 1) % track.children.length; update();
      });
      prev.addEventListener('click', () => {
        index = (index - 1 + track.children.length) % track.children.length; update();
      });

      let timer = setInterval(()=>{ next.click(); }, 4500);
      const carousel = document.getElementById('carousel');
      carousel.addEventListener('mouseenter', ()=> clearInterval(timer));
      carousel.addEventListener('mouseleave', ()=> timer = setInterval(()=>{ next.click(); }, 4500));

      document.querySelectorAll('.hero, .section').forEach((el,i)=>{
        el.style.opacity = 0; el.style.transform = 'translateY(8px)';
        setTimeout(()=>{
          el.style.transition = 'opacity .6s cubic-bezier(.2,.8,.2,1), transform .6s cubic-bezier(.2,.8,.2,1)';
          el.style.opacity = 1; el.style.transform = 'translateY(0)';
        }, 100 + i*120);
      });
    })();
  </script>
</body>
</html>