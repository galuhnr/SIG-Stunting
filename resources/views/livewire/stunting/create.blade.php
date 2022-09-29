<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Stunting Balita</h5>
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
                        <label for="jml_balita_diukur">{{ __('Jumlah Balita diukur') }}</label>
                        <div class="@error('jml_balita_diukur')border border-danger rounded-3 @enderror">
                            <input wire:model="jml_balita_diukur" id="jml_balita_diukur" type="number" class="form-control"
                                placeholder="Isi jumlah balita yang diukur tinggi badan">
                        </div>
                        @error('jml_balita_diukur') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jml_balita_stunting">{{ __('Jumlah Balita Stunting (Pendek)') }}</label>
                        <div class="@error('jml_balita_stunting')border border-danger rounded-3 @enderror">
                            <input wire:model="jml_balita_stunting" id="jml_balita_stunting" type="number" class="form-control"
                                placeholder="Isi jumlah balita pendek">
                        </div>
                        @error('jml_balita_stunting') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="persentase">{{ __('Persentase Jumlah Balita Stunting (Pendek)') }}</label>
                        <div class="@error('persentase')border border-danger rounded-3 @enderror">
                            <input wire:model="persentase" id="persentase" type="number" class="form-control"
                                placeholder="Isi persentase">
                        </div>
                        @error('persentase') <div class="text-danger">{{ $message }}</div> @enderror
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