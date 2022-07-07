<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Informasi</h5>
                <a href="#" type="button" class="close me-3" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">X</span>
                </a>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="mb-3">
                        <label for="nama_info">{{ __('Nama Informasi') }}</label>
                        <div class="@error('nama_info') border border-danger rounded-3 @enderror">
                            <input wire:model="nama_info" id="nama_info" type="text" class="form-control"
                                placeholder="Isi nama informasi" aria-label="Nama Informasi" aria-describedby="namainfo-addon">
                        </div>
                        @error('nama_info') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="isi_info">{{ __('Isi Informasi') }}</label>
                        <div class="@error('isi_info')border border-danger rounded-3 @enderror">
                            <input wire:model="isi_info" id="isi_info" type="text" class="form-control"
                                placeholder="Isi Informasi" aria-label="Isi Info" aria-describedby="info-addon">
                        </div>
                        @error('isi_info') <div class="text-danger">{{ $message }}</div> @enderror
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