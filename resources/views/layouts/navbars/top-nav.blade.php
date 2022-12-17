 <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="50">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="{{ route('login') }}" rel="tooltip" title="Sistem Informasi Pemetaan Stunting" data-placement="bottom">
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
                        <a href="{{ route('beranda') }}" class="nav-link"><i class="fa-solid fa-house"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('fasilitas-kesehatan') }}" class="nav-link"><i class="fa-solid fa-location-dot"></i> Faskes</a>
                    </li>
                    <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-earth-americas"></i> Pemetaan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('peta-stunting-2021') }}">Tingkat Risiko Stunting</a></li>
                                <li><a class="dropdown-item" href="{{ route('peta-prediksi2022') }}">Peta Prediksi</a></li>
                            </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-chart-simple"></i> Grafik
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('grafik-tingkat-risiko') }}">Tingkat Risiko Stunting</a></li>
                            <li><a class="dropdown-item" href="{{ route('grafik-pelayanan-kesehatan') }}">Pelayanan Kesehatan Balita</a></li>
                            <li><a class="dropdown-item" href="{{ route('grafik-sanitasi-layak') }}">Sanitasi Layak</a></li>
                            <li><a class="dropdown-item" href="{{ route('grafik-desa-uci') }}">Desa Imunisasi</a></li>
                            <li><a class="dropdown-item" href="{{ route('grafik-asi-eksklusif') }}">Cakupan ASI Eksklusif</a></li>
                            <li><a class="dropdown-item" href="{{ route('grafik-stunting') }}">Prevalensi Stunting</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Informasi Data
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('info-pelayanan-kesehatan') }}">Data Faktor</a></li>
                            <li><a class="dropdown-item" href="{{ route('info-tingkat-risiko2017') }}">Hasil Tingkat Risiko Stunting</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- End Navbar -->