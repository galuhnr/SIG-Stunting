<main class="landing-page sidebar-collapse" >
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="300">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="#" rel="tooltip" title="Sistem Informasi Pemetaan Stunting" data-placement="bottom" target="_blank">
          STUNTING JATIM
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="nav-link" ><i class="fa-solid fa-house"></i> Beranda</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('peta2021') }}" target="_blank" class="nav-link"><i class="fa-solid fa-earth-americas"></i> Pemetaan</a>
          </li>
          <li class="nav-item">
            <a href="#" target="_blank" class="nav-link"><i class="fa-solid fa-chart-simple"></i> Grafik</a>
          </li>
          <li class="nav-item">
            <a href="#" target="_blank" class="nav-link">Informasi Data</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <div class="page-header" style="background-color: yellow;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mt-5">
          <div class="motto text-left">
            <h1>Cegah Stunting</h1>
            <div style="display: flex;">
                <h2 style="margin-top: 15px !important;">Sebelum</h2>
                <h2 style="color: black; margin-top: 15px !important;"> &nbspGenting</h2>
            </div>
            <div class="mt-5">
              <p style="color: #565252; line-height: 30px;">Masalah stunting penting untuk diselesaikan, karena berpotensi mengganggu potensi sumber daya manusia dan berhubungan dengan tingkat kesehatan, bahkan kematian anak. Prevalensi stunting Indonesia pada tahun 2021 berada pada angka 24,4 persen.  
                Angka tersebut masih dinilai tinggi, mengingat WHO menargetkan angka stunting tidak boleh lebih dari 20 persen.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mt-5" >
          <img src="../assets/img/landing.jpg" alt="" height="450px" style="float: right;">
        </div>
      </div>
    </div>
  </div>

  <div class="main">

    <!-- Section 2 Pilihan-->
    <div class="section text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="kotak">
              <div class="info">
                <div class="icon icon-danger" style="margin-top: 10px;">
                  <i class="nc-icon nc-bulb-63"></i>
                </div>
                <div class="mb-3 kotak-text">
                  <a href="#tentangStunting" style="color: #565252; font-weight: 400; font-size: medium;">Tentang Stunting</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="kotak">
              <div class="info">
                <div class="icon icon-danger" style="margin-top: 10px;">
                  <i class="nc-icon nc-atom"></i>
                </div>
                <div class="mb-3 kotak-text">
                  <a href="#penyebabStunting" style="color: #565252; font-weight: 400; font-size: medium;">Penyebab Stunting</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="kotak">
              <div class="info">
                <div class="icon icon-danger" style="margin-top: 10px;">
                  <i class="nc-icon nc-tile-56"></i>
                </div>
                <div class="mb-3 kotak-text">
                  <a href="#dampakStunting" style="color: #565252; font-weight: 400; font-size: medium;">Dampak Stunting</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="kotak">
              <div class="info">
                <div class="icon icon-danger" style="margin-top: 10px;">
                  <i class="nc-icon nc-sun-fog-29"></i>
                </div>
                <div class="mb-3 kotak-text">
                  <a href="#pencegahanStunting" style="color: #565252; font-weight: 400; font-size: medium;">Pencegahan Stunting</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Section 2 Pilihan-->

    <!-- Section 3 Tentang Stunting-->
    <div class="section" id="tentangStunting">
      <div class="container">
        <div class="row">
          <div class="col-4">
            <div class="text-left">
              <h3 style="color: #E5352B;">Tentang Stunting</h3>
              <p style="text-align: justify; margin-top: 30px; line-height: 30px;">Stunting  adalah kondisi gagal tumbuh pada anak berusia di bawah lima tahun (balita) akibat kekurangan gizi secara kronis 
                dan infeksi berulang terutama pada periode 1000 Hari Pertama Kehidupan (HPK).</p>
            </div>
          </div>
          <div class="col-8">
            <div class="row">
              <div class="col-6">
                <div class="card card-profile card-plain" style="margin-left: 80px !important;"> 
                  <div class="bunder">
                    <img src="../assets/img/icon/height.png" alt="">
                  </div>
                  <div class="card-body text-left">
                    <h4 class="card-title" style="color: #E5352B !important;">Tubuh Pendek</h4>
                    <p style="text-align: left; margin-top: 10px; line-height: 25px;">
                      Secara fisik, anak  stunting  terlihat lebih pendek dari teman sebayanya. 
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="card card-profile card-plain ml-2"> 
                  <div class="bunder">
                    <img src="../assets/img/icon/neuron.png" alt="">
                  </div>
                  <div class="card-body text-left">
                    <h4 class="card-title" style="color: #E5352B !important;">Perkembangan Terlambat</h4>
                    <p style="text-align: left; margin-top: 10px; line-height: 25px;">
                      Pertumbuhan gigi terlambat, wajah tampak lebih muda, anak jarang malakukan kontak mata dan lebih pendiam.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6" style="margin-top: -30px !important;">
                <div class="card card-profile card-plain" style="margin-left: 80px !important;"> 
                  <div class="bunder">
                    <img src="../assets/img/icon/sakit.png" alt="">
                  </div>
                  <div class="card-body text-left">
                    <h4 class="card-title" style="color: #E5352B !important; line-height: 35px;">Mudah Terserang Penyakit</h4>
                    <p style="text-align: left; margin-top: 10px; line-height: 25px;">
                      Anak stunting lebih beresiko terserang penyakit infeksi akibat kurangnya nutrisi sehingga kekebalan tubuh menurun.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-6" style="margin-top: -30px !important;">
                <div class="card card-profile card-plain" style="margin-right: 80px !important;"> 
                  <div class="bunder">
                    <img src="../assets/img/icon/kognitif.png" alt="">
                  </div>
                  <div class="card-body text-left">
                    <h4 class="card-title" style="color: #E5352B !important; line-height: 35px;">Penurunan Kemampuan Kognitif</h4>
                    <p style="text-align: left; margin-top: 10px; line-height: 25px;">
                      Kemampuan kognitif anak menurun yang ditandai dengan IQ rendah bahkan hingga dapat dikategorikan disabilitas intelektual.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    <!-- End Section 3 Tentang Stunting-->

    <!-- Section 4 Penyebab Stunting-->
    <div class="section" id="penyebabStunting">
      <div class="container">
        <div class="row">
          <div class="col-8">
            <img src="../assets/img/icon/gambar-penyebab.png" alt="">
          </div>
          <div class="col-4" style="margin-left: -10px !important;">
            <div class="text-left">
              <h3 style="color: #E5352B; margin-bottom: 20px;">Penyebab Stunting</h3>
              <p style="text-align: justify; line-height: 25px;">
                Status gizi buruk pada ibu hamil dan bayi merupakan faktor utama yang menyebabkan anak balita mengalami stunting. Berikut adalah penyebab yang masih sering ditemui:
              </p>
              <ul type="disc" style="line-height: 30px;">
                <li>Kurang asupan gizi selama hamil</li>
                <li>Kebutuhan gizi anak tidak tercukupi</li>
                <li>Infeksi berulang atau kronis</li>
                <li>Pengetahuan ibu yang kurang memadai mengenai gizi sebelum hamil, saat hamil, dan setelah melahirkan</li>
                <li>Terbatasnya layanan kesehatan, termasuk layanan kehamilan dan postnatal</li>
                <li>Masih kurangnya akses makanan bergizi karena tergolong mahal</li>
                <li>Kurangnya akses air bersih atau sanitasi yang buruk</li>
              </ul>      
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Section 4 Penyebab Stunting-->

    <!-- Section 5 Dampak Stunting-->
    <div class="section" id="dampakStunting">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <h3 style="color: #E5352B;">Apa Dampak Stunting ?</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="kotak-biru" style="margin-left: -10px;"></div>
          </div>
        </div>
            <div class="row">
              <div class="col-4">
                <div class="kotak-dampak" style="margin-left: 35px !important;">
                  <h4 class="text-center mb-2">Segi Kesehatan</h4>
                  <ul type="disc" style="line-height: 30px;">
                    <li>Penurunan sistem kekebalan tubuh anak</li>
                    <li>Menghambat perkembangan otak, metobolisme tubuh, dan pertumbuhan fisik</li>
                    <li>Lebih beresiko menderita penyakit degeneratif  kerika beranjak dewasa</li>
                  </ul>
                </div>
              </div>
              <div class="col-4">
                <div class="kotak-dampak">
                  <h4 class="text-center mb-2">Segi Perkembangan</h4>
                  <ul type="disc" style="line-height: 30px;">
                    <li>Terhambatnya perkembangan kognitif pada anak</li>
                    <li>Mempengaruhi prestasi belajar dan mutu sumber daya manusia di masa depan</li>
                    <li>Perkembangan motorik dan tingkat intelegensi yang lebih rendah</li>
                  </ul>
                </div>
              </div>
              <div class="col-4">
                <div class="kotak-dampak mr-4">
                  <h4 class="text-center mb-2">Segi Ekonomi</h4>
                  <ul type="disc" style="line-height: 30px;">
                    <li>Diperkirakan dapat menurunkan produk domestik bruto (PDB) sekitar 3% per tahun</li>
                    <li>Meningkatkan pengeluaran untuk biaya kesehatan dan perawatan untuk anak yang sakit.</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Section 5 Dampak Stunting-->

     <!-- Section 6 Pencegahan Stunting-->
    <div class="section" id="pencegahanStunting">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <h3 style="color: #E5352B;">Bagaimana cara mencegah Stunting ?</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <iframe width="100%" height="680px" src="https://www.youtube.com/embed/aM5vFHn9I9o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
    <!-- End Section 6 Pencegahan Stunting-->

  </div>

  <footer class="footer" style="background-color: #1A2E35; color: white;">
    <div class="container">
      <div class="row">
        <div class="col-6 p-4">
          <h5 class="mb-2 mt-4">Tentang</h5>
          <p style="font-size: 12px !important; text-align: justify;">
            Website ini merupakan sistem informasi stunting yang juga menyajikan visualisasi pemetaan tingkat risiko stunting pada tiap daerah di provinsi Jawa Timur. 
            Penentuan tingkat risiko ditentukan dengan beberapa kriteria dan diolah menggunakan metode fuzzy.
          </p>
          <div class="copyright text-muted text-lg-left" style="color: white !important;">
            Copyright ©  <script>
                document.write(new Date().getFullYear())
              </script> PENS by 
              <a style="color: white;" href="#" class="font-weight-bold ml-1" target="_blank">Galuh Nurul</a> 
          </div>
        </div>
        <div class="col-6 p-4">
          <h5 class="mt-4">Lainnya</h5>
          <p><a href="https://stunting.go.id/" style="color: #E5352B;">Website Percepatan Pencegahan Stunting</a></p>
          <p class="mt-2"><a href="https://www.pens.ac.id/" style="color: white;">Politeknik Elektronika Negeri Surabaya</a></p>
          <a href="https://dinkes.jatimprov.go.id/#" style="color: white;"><i class="fa-solid fa-earth-americas"></i></a>
          <a href="#" style="color: white; margin-left: 10px;"><i class="fa-brands fa-instagram"></i></a>
          <a href="https://www.youtube.com/channel/UCLCW7E-ViTZEd2jVBSEsMKg" style="color: white; margin-left: 10px;"><i class="fa-brands fa-youtube"></i></a>
        </div>
      </div>
    </div>
  </footer>

</main>
