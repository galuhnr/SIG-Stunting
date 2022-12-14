 <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="300">
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
                        <a href="{{ route('web-user') }}" class="nav-link"><i class="fa-solid fa-house"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('peta-stunting-2021') }}" class="nav-link"><i class="fa-solid fa-earth-americas"></i> Pemetaan</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('grafik-tingkat-risiko') }}" class="nav-link"><i class="fa-solid fa-chart-simple"></i> Grafik</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('fasilitas-kesehatan') }}" class="nav-link"><i class="fa-solid fa-location-dot"></i> Faskes</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Informasi Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- End Navbar -->