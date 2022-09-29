<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-left ms-3"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute right-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
            <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="...">
            <span class="ms-1 font-weight-bold">Website Admin</span>
        </a>
    </div>
    <hr class="horizontal dark m-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-0">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <!-- <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"> -->
                        <i style="font-size: 1rem;" class="fa-solid fa-house-chimney text-center
                        {{ in_array(request()->route()->getName(),['dashboard']) ? 'text-danger' : 'text-dark' }}"></i>
                    <!-- </div> -->
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-0">
                <a class="nav-link {{ Route::currentRouteName() == 'grafik' ? 'active' : '' }}"
                    href="{{ route('grafik') }}">
                     <i style="font-size: 1rem;" class="fa-solid fa-earth-americas text-center
                        {{ in_array(request()->route()->getName(),['grafik']) ? 'text-danger' : 'text-dark' }}"></i>
                    <span class="nav-link-text ms-1">Peta Prediksi</span>
                </a>
            </li>
            <li class="nav-item mt-0">
                <a class="nav-link {{ Route::currentRouteName() == 'grafik' ? 'active' : '' }}"
                    href="{{ route('grafik') }}">
                      <i style="font-size: 1rem;" class="fa-solid fa-chart-column text-center
                        {{ in_array(request()->route()->getName(),['grafik']) ? 'text-danger' : 'text-dark' }}"></i>
                    <span class="nav-link-text ms-1">Grafik Data</span>
                </a>
            </li>

            <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Tabel Data Kriteria</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'pelayanan-kesehatan-balita' ? 'active' : '' }}"
                    href="{{ route('pelayanan-kesehatan-balita') }}">
                       <i style="font-size: 1rem;" class="fa-solid fa-hospital text-center
                        {{ in_array(request()->route()->getName(),['pelayanan-kesehatan-balita']) ? 'text-danger' : 'text-dark' }}"></i>
                    <span class="nav-link-text ms-1">Pelayanan Balita</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'ASI-eksklusif' ? 'active' : '' }}"
                    href="{{ route('ASI-eksklusif') }}">
                     <i style="font-size: 1rem;" class="fa-solid fa-person-breastfeeding text-center
                        {{ in_array(request()->route()->getName(),['ASI-eksklusif']) ? 'text-danger' : 'text-dark' }}"></i>
                    <span class="nav-link-text ms-1">ASI Ekslusif</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'stunting' ? 'active' : '' }}"
                    href="{{ route('stunting') }}">
                     <i style="font-size: 1rem;" class="fa-solid fa-children text-center
                        {{ in_array(request()->route()->getName(),['stunting']) ? 'text-danger' : 'text-dark' }}"></i>
                    <span class="nav-link-text ms-1">Kasus Stunting</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'desaUCI' ? 'active' : '' }}"
                    href="{{ route('desaUCI') }}">
                       <i style="font-size: 1rem;" class="fa-solid fa-syringe text-center
                        {{ in_array(request()->route()->getName(),['desaUCI']) ? 'text-danger' : 'text-dark' }}"></i>
                    <span class="nav-link-text ms-1">Desa UCI</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'jamban-sehat' ? 'active' : '' }}"
                    href="{{ route('jamban-sehat') }}">
                      <i style="font-size: 1rem;" class="fa-solid fa-faucet-drip text-center
                        {{ in_array(request()->route()->getName(),['jamban-sehat']) ? 'text-danger' : 'text-dark' }}"></i>
                    <span class="nav-link-text ms-1">Sanitasi Layak</span>
                </a>
            </li>

            <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Hasil Tingkat Risiko</h6>
            </li>
            <div class="dropdown" >
                <li class="nav-link dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i style="font-size: 1rem;" class="fa-solid fa-calendar-days text-center text-dark"></i>
                    <span class="nav-link-text ms-1">Pilih Tahun</span>
                </li>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{route('tingkat-risiko2017')}}">2017</a></li>
                    <li><a class="dropdown-item" href="{{route('tingkat-risiko2018')}}">2018</a></li>
                    <li><a class="dropdown-item" href="{{route('tingkat-risiko2019')}}">2019</a></li>
                    <li><a class="dropdown-item" href="{{route('tingkat-risiko2020')}}">2020</a></li>
                    <li><a class="dropdown-item" href="{{route('tingkat-risiko2021')}}">2021</a></li>
                </ul>
            </div>

            <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Informasi Lainnya</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'kabupaten-kota' ? 'active' : '' }}"
                    href="{{ route('kabupaten-kota') }}">
                      <i style="font-size: 1rem;" class="fa-solid fa-city text-center
                        {{ in_array(request()->route()->getName(),['kabupaten-kota']) ? 'text-danger' : 'text-dark' }}"></i>
                    <span class="nav-link-text ms-1">Kabupaten/Kota</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'tahun' ? 'active' : '' }}"
                    href="{{ route('tahun') }}">
                      <i style="font-size: 1rem;" class="fa-solid fa-layer-group text-center
                        {{ in_array(request()->route()->getName(),['tahun']) ? 'text-danger' : 'text-dark' }}"></i>
                    <span class="nav-link-text ms-1">Tahun</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'info' ? 'active' : '' }}"
                    href="{{ route('info') }}">
                    <i style="font-size: 1rem;" class="fa-solid fa-circle-info text-center
                        {{ in_array(request()->route()->getName(),['info']) ? 'text-danger' : 'text-dark' }}"></i>
                    <span class="nav-link-text ms-1">Informasi Stunting</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
