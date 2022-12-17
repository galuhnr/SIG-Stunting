    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <h5 class="mb-0">{{ __('Cakupan Jumlah KK Mendapat Akses Fasilitas Sanitasi Layak') }}</h5>
                        <div class="dropdown">
                            <button class="btn bg-gradient-primary btn-sm mb-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Sanitasi Layak
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{route('info-pelayanan-kesehatan')}}">Pelayanan Kesehatan Balita</a></li>
                                <li><a class="dropdown-item" href="{{route('info-sanitasi-layak')}}">Sanitasi Layak</a></li>
                                <li><a class="dropdown-item" href="{{route('info-desa-uci')}}">Desa Imunisasi</a></li>
                                <li><a class="dropdown-item" href="{{route('info-asi')}}">ASI Eksklusif</a></li>
                                <li><a class="dropdown-item" href="{{route('info-stunting')}}">Stunting</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="table_list">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('No') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('Tahun') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        {{ __('Nama Kabupaten/Kota') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('Jumlah KK') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('Jumlah KK Mendapat Akses Jamban Sehat') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('Persentase (%)') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $dt)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold my-1">{{ $data->firstItem() + $loop->index }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold my-1">{{ $dt->tb_tahun->tahun }}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold my-1 ms-5">{{ $dt->kabupaten_kota->nama_kabkota }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold my-1">{{ $dt->jml_kk }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold my-1">{{ $dt->jml_akses_jamban }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold my-1">{{ round(($dt->jml_akses_jamban / $dt->jml_kk)*100 , 1) }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <input type="hidden" id="table_value" name="table_value">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="mt-3 ms-4 text-xs">
                                {{ $data->links() }}
                            </div>
                            <div class="mt-3 ms-4 p-sumber">
                                <p>{{ __('Sumber: Buku Profil Kesehatan Provinsi Jawa Timur') }}</p>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>