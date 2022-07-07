<div style="overflow-x: hidden !important">
    @include('livewire.tahun.create')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{ __('Tahun') }}</h5>
                        </div>
                        <button class="btn bg-gradient-primary btn-sm mb-0" type="button" data-toggle="modal" data-target="#exampleModal">+&nbsp; Tambah Data</button>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('ID') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        {{ __('Tahun') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $dt)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $dt->id_tahun }}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0">{{ $dt->tahun }}</p>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" wire:click="edit({{ $dt->id_tahun }})" class="mx-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="Edit" data-toggle="modal" data-target="#updateModal">
                                                <i class="fas fa-edit text-secondary"></i>
                                            </a>
                                            <span>
                                            <a href="#" wire:click="deleteConfirm({{ $dt->id_tahun }})"  data-bs-toggle="tooltip"
                                                data-bs-original-title="Hapus">
                                                <i class="cursor-pointer fas fa-trash text-danger"></i>
                                            </a>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 ms-4 text-xs">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


