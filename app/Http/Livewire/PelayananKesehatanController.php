<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PelayananKesehatan;
use App\Models\KabupatenKota;
use App\Models\Tahun;

class PelayananKesehatanController extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete'];
    public $paging;

    public $pelayanan_id, $tahun_id, $kabkota_id, $jml_balita, $jml_balita_sehat;
    public $updateMode = false;

    public function mount()
    {
        $this->paging = 10;
    }

    public function render()
    {
        $data = PelayananKesehatan::with('tb_tahun', 'kabupaten_kota')->orderBy('id_pelayanan','asc')->paginate($this->paging);
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        return view('livewire.pelayanan-kesehatan.index', compact('data','tahun','kab'));
    }

    private function resetInputFields(){
        $this->tahun_id = '';
        $this->kabkota_id = '';
        $this->jml_balita = '';
        $this->jml_balita_sehat = '';
    }

    public function create()
    {
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        return view('livewire.pelayanan-kesehatan.create', compact('tahun', 'kab'));
    }

    public function store(){
        $this->validate([
            'tahun_id' => 'required',
            'kabkota_id' => 'required',
            'jml_balita' => 'required',
            'jml_balita_sehat' => 'required',
        ]);
        
        PelayananKesehatan::create([
            'tahun_id' => $this->tahun_id,
            'kabkota_id' => $this->kabkota_id,
            'jml_balita' => $this->jml_balita,
            'jml_balita_sehat' => $this->jml_balita_sehat,
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
        $data = PelayananKesehatan::where('id_pelayanan', $id)->first();
        $this->pelayanan_id = $id;
        $this->tahun_id = $data->tahun_id;
        $this->kabkota_id = $data->kabkota_id;
        $this->jml_balita = $data->jml_balita;
        $this->jml_balita_sehat = $data->jml_balita_sehat;

    }

    public function update()
    {
        $this->validate([
            'tahun_id' => 'required',
            'kabkota_id' => 'required',
            'jml_balita' => 'required',
            'jml_balita_sehat' => 'required',
        ]);
        if ($this->pelayanan_id) {
            $pelayanan = PelayananKesehatan::find($this->pelayanan_id);
            $pelayanan->update([
                'tahun_id' => $this->tahun_id,
                'kabkota_id' => $this->kabkota_id,
                'jml_balita' => $this->jml_balita,
                'jml_balita_sehat' => $this->jml_balita_sehat,
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
        PelayananKesehatan::where('id_pelayanan', $id)->delete();
    }

}
