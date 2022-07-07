<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Kabupaten</h5>
                <a href="#" type="button" class="close me-3" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">X</span>
                </a>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="mb-3">
                        <label for="nama_kabkota">{{ __('Nama Kabupaten/Kota') }}</label>
                        <div class="@error('nama_kabkota') border border-danger rounded-3 @enderror">
                            <input wire:model="nama_kabkota" id="nama_kabkota" type="text" class="form-control"
                                placeholder="Isi nama kabupaten/kota" aria-label="Nama Kabupaten" aria-describedby="namakab-addon">
                        </div>
                        @error('nama_kabkota') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jml_desa">{{ __('Jumlah Desa') }}</label>
                        <div class="@error('jml_desa')border border-danger rounded-3 @enderror">
                            <input wire:model="jml_desa" id="jml_desa" type="text" class="form-control"
                                placeholder="Isi jumlah desa" aria-label="Jumlah Desa" aria-describedby="jmldesa-addon">
                        </div>
                        @error('jml_desa') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Perbarui</button>
            </div>
        </div>
    </div>
</div>