<div style="overflow-x: hidden !important">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{ __('Hasil Tingkat Risiko Stunting Provinsi Jawa Timur 2020') }}</h5>
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
                                        {{ __('Defuzzifikasi') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('Tingkat Risiko') }}
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
                                            <p class="text-xs font-weight-bold my-1 ms-7">{{ $dt->kabupaten_kota->nama_kabkota }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold my-1">{{ $dt->defuzzifikasi }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold my-1">{{ $dt->tingkat_risiko }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <input type="hidden" id="table_value" name="table_value">
                        <div class="mt-3 ms-4 text-xs">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>