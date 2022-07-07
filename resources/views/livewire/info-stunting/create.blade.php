<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Informasi</h5>
                <a href="#" type="button" class="close me-3" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">
                         <i class="fa-solid fa-close"></i>
                     </span>
                </a>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="mb-3">
                        <label for="nama_info">{{ __('Nama Informasi') }}</label>
                        <div class="@error('nama_info') border border-danger rounded-3 @enderror">
                            <input wire:model="nama_info" id="nama_info" type="text" class="form-control"
                                placeholder="Isi Nama Informasi" aria-label="Nama Informasi" aria-describedby="namainfo-addon">
                        </div>
                        @error('nama_info') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="isi_info">{{ __('Isi Informasi') }}</label>
                        <div class="@error('isi_info')border border-danger rounded-3  @enderror">
                            <textarea wire:model="isi_info" id="isi_info" type="text" class="form-control"
                                placeholder="Isi Informasi" aria-label="Isi Informasi" aria-describedby="info-addon"></textarea>
                        </div>
                        @error('isi_info') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">
                    <i class="fa-solid fa-close"></i>   
                    <span class="ms-2">Tutup</span> 
                </button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal" data-dismiss="modal">
                    <i class="fa-solid fa-save"></i>   
                    <span class="ms-2">Simpan</span> 
                </button>
            </div>
        </div>
    </div>
</div>