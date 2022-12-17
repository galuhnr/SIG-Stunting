<?php

namespace App\Http\Livewire\Admin\CRUD;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SanitasiJamban;
use App\Models\KabupatenKota;
use App\Models\Tahun;

class SanitasiController extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete'];
    public $paging;
    public $searchTerm;
    public $sanitasi_id, $tahun_id, $kabkota_id, $jml_kk, $jml_akses_jamban;
    public $updateMode = false;

    public function mount()
    {
        $this->paging = 10;
    }

    public function render()
    {
        //$data = SanitasiJamban::with('tb_tahun', 'kabupaten_kota')->orderBy('id_sanitasi','asc')->paginate($this->paging);
        $data = SanitasiJamban::whereIn('kabkota_id',function(
            $query){
                $query->select('id_kab')
                    ->from(with(new KabupatenKota)->getTable())->where('nama_kabkota','like', '%'.$this->searchTerm.'%');
            })
            ->orderBy('id_sanitasi','asc')->paginate($this->paging);
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        return view('livewire.sanitasi-jamban.index', compact('data','tahun','kab'));
    }

    private function resetInputFields(){
        $this->tahun_id = '';
        $this->kabkota_id = '';
        $this->jml_kk = '';
        $this->jml_akses_jamban = '';
    }

    public function create()
    {
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        return view('livewire.sanitasi-jamban.create', compact('tahun', 'kab'));
    }

    public function store(){
        $this->validate([
            'tahun_id' => 'required',
            'kabkota_id' => 'required',
            'jml_kk' => 'required',
            'jml_akses_jamban' => 'required',
        ]);
        
        SanitasiJamban::create([
            'tahun_id' => $this->tahun_id,
            'kabkota_id' => $this->kabkota_id,
            'jml_kk' => $this->jml_kk,
            'jml_akses_jamban' => $this->jml_akses_jamban,
        ]);

        $this->resetInputFields();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Data berhasil ditambahkan',
            'text' => '',
        ]);
        $this->emit('dataStore');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $data = SanitasiJamban::where('id_sanitasi', $id)->first();
        $this->sanitasi_id = $id;
        $this->tahun_id = $data->tahun_id;
        $this->kabkota_id = $data->kabkota_id;
        $this->jml_kk = $data->jml_kk;
        $this->jml_akses_jamban = $data->jml_akses_jamban;

    }

    public function update()
    {
        $this->validate([
            'tahun_id' => 'required',
            'kabkota_id' => 'required',
            'jml_kk' => 'required',
            'jml_akses_jamban' => 'required',
        ]);
        if ($this->sanitasi_id) {
            $sanitasi = SanitasiJamban::find($this->sanitasi_id);
            $sanitasi->update([
                'tahun_id' => $this->tahun_id,
                'kabkota_id' => $this->kabkota_id,
                'jml_kk' => $this->jml_kk,
                'jml_akses_jamban' => $this->jml_akses_jamban,
            ]);
            $this->updateMode = false;
            $this->resetInputFields();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Data berhasil diperbarui',
                'text' => '',
            ]);
        }
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Hapus Data?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        SanitasiJamban::where('id_sanitasi', $id)->delete();
    }

}
