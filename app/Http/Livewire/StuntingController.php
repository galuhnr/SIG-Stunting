<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KabupatenKota;
use App\Models\Tahun;
use App\Models\Stunting;

class StuntingController extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete'];
    public $paging;

    public $stunting_id, $tahun_id, $kabkota_id, $jml_balita_diukur, $jml_balita_stunting;
    public $updateMode = false;

    public function mount()
    {
        $this->paging = 10;
    }

    public function render()
    {
        $data = Stunting::with('tb_tahun', 'kabupaten_kota')->orderBy('id_stunting','asc')->paginate($this->paging);
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        return view('livewire.stunting.index', compact('data','tahun','kab'));
    }

    private function resetInputFields(){
        $this->tahun_id = '';
        $this->kabkota_id = '';
        $this->jml_balita_diukur = '';
        $this->jml_balita_stunting = '';
    }

    public function create()
    {
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        return view('livewire.stunting.create', compact('tahun', 'kab'));
    }

    public function store(){
        $this->validate([
            'tahun_id' => 'required',
            'kabkota_id' => 'required',
            'jml_balita_diukur' => 'required',
            'jml_balita_stunting' => 'required',
        ]);
        
        Stunting::create([
            'tahun_id' => $this->tahun_id,
            'kabkota_id' => $this->kabkota_id,
            'jml_balita_diukur' => $this->jml_balita_diukur,
            'jml_balita_stunting' => $this->jml_balita_stunting,
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
        $data = Stunting::where('id_stunting', $id)->first();
        $this->stunting_id = $id;
        $this->tahun_id = $data->tahun_id;
        $this->kabkota_id = $data->kabkota_id;
        $this->jml_balita_diukur = $data->jml_balita_diukur;
        $this->jml_balita_stunting = $data->jml_balita_stunting;

    }

    public function update()
    {
        $this->validate([
            'tahun_id' => 'required',
            'kabkota_id' => 'required',
            'jml_balita_diukur' => 'required',
            'jml_balita_stunting' => 'required',
        ]);
        if ($this->stunting_id) {
            $asi = Stunting::find($this->stunting_id);
            $asi->update([
                'tahun_id' => $this->tahun_id,
                'kabkota_id' => $this->kabkota_id,
                'jml_balita_diukur' => $this->jml_balita_diukur,
                'jml_balita_stunting' => $this->jml_balita_stunting,
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
        Stunting::where('id_stunting', $id)->delete();
    }

}
