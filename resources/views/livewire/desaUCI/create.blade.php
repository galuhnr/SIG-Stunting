<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Desa UCI</h5>
                <a href="#" type="button" class="close me-3" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">
                         <i class="fa-solid fa-close"></i>
                     </span>
                </a>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="mb-3">
                        <label for="tahun">{{ __('Tahun') }}</label>
                        <div class="@error('tahun_id')border border-danger rounded-3 @enderror">
                            <select wire:model="tahun_id" class="form-control" name="tahun_id" id="tahun_id">
                                    <option enabled value>Pilih Tahun</option>
                                    @foreach($tahun as $dt)
                                        <option value="{{ $dt->id_tahun }}">{{ $dt->tahun }}</option>
                                    @endforeach
                            </select>
                        </div>
                        @error('tahun_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_kabkota">{{ __('Kabupaten/Kota') }}</label>
                        <div class="@error('nama_kabkota')border border-danger rounded-3 @enderror">
                            <select wire:model="kabkota_id" class="form-control" name="kabkota_id" id="kabkota_id">
                                    <option enabled value>Pilih Kabupaten/Kota</option>
                                    @foreach($kab as $dt)
                                        <option value="{{ $dt->id_kab }}">{{ $dt->nama_kabkota }}</option>
                                    @endforeach
                            </select>
                        </div>
                        @error('nama_kabkota') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jml_desaUCI">{{ __('Jumlah Desa UCI (Universal Child Immunization)') }}</label>
                        <div class="@error('jml_desaUCI')border border-danger rounded-3 @enderror">
                            <input wire:model="jml_desaUCI" id="jml_desaUCI" type="number" class="form-control"
                                placeholder="Isi jumlah desa uci" aria-label="Jumlah Desa UCI" aria-describedby="jmldesauci-addon">
                        </div>
                        @error('jml_desaUCI') <div class="text-danger">{{ $message }}</div> @enderror
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