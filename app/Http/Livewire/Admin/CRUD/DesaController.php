<?php

namespace App\Http\Livewire\Admin\CRUD;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\desaUCI;
use App\Models\KabupatenKota;
use App\Models\Tahun;

class DesaController extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['delete'];

    public $paging;

    public $desa_id, $kabkota_id, $tahun_id, $jml_desa_uci;
    public $updateMode = false;

    public $searchTerm;

    public function mount()
    {
        $this->paging = 10;
    }

    public function render()
    {
        //$data = desaUCI::with('tb_tahun','kabupaten_kota')->orderBy('id_desa', 'asc')->paginate($this->paging);
        $data = desaUCI::whereIn('kabkota_id',function(
            $query){
                $query->select('id_kab')
                    ->from(with(new KabupatenKota)->getTable())->where('nama_kabkota','like', '%'.$this->searchTerm.'%');
            })
            ->orderBy('id_desa','asc')->paginate($this->paging);
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        return view('livewire.desaUCI.index', compact('data', 'tahun', 'kab'));
    }

    private function resetInputFields(){
        $this->tahun_id = '';
        $this->kabkota_id = '';
        $this->jml_desa_uci = '';
    }

    public function create()
    {
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        return view('livewire.desaUCI.create', compact('tahun', 'kab'));
    }

    public function store(){
        $this->validate([
            'kabkota_id' => 'required',
            'tahun_id' => 'required',
            'jml_desa_uci' => 'required',
        ]);
        
        desaUCI::create([
            'kabkota_id' => $this->kabkota_id,
            'tahun_id' => $this->tahun_id,
            'jml_desa_uci' => $this->jml_desa_uci,
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
        $data = desaUCI::where('id_desa', $id)->first();
        $this->desa_id = $id;
        $this->tahun_id = $data->tahun_id;
        $this->kabkota_id = $data->kabkota_id;
        $this->jml_desa_uci = $data->jml_desa_uci;
    }

    public function update()
    {
        $this->validate([
            'tahun_id' => 'required',
            'kabkota_id' => 'required',
            'jml_desa_uci' => 'required',
        ]);
        if ($this->desa_id) {
            $desa = desaUCI::find($this->desa_id);
            $desa->update([
                'tahun_id' => $this->tahun_id,
                'kabkota_id' => $this->kabkota_id,
                'jml_desa_uci' => $this->jml_desa_uci,
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
        desaUCI::where('id_desa', $id)->delete();
    }

}