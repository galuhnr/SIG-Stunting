<?php

namespace App\Http\Livewire\Admin\CRUD;

use Livewire\WithPagination;
use App\Models\KabupatenKota;
use Livewire\Component;

class KabupatenController extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['delete'];

    public $paging, $kab_id, $nama_kabkota, $jml_desa;
    
    public $updateMode = false;

    public function mount()
    {
        $this->paging = 10;
    }

    public function render()
    {

        $kabupaten = KabupatenKota::orderBy('id_kab', 'asc')->paginate($this->paging);
        $kab = [
            'data' => $kabupaten
        ];
        return view('livewire.kabupaten.index', $kab);
    }

    private function resetInputFields(){
        $this->nama_kabkota = '';
        $this->jml_desa = '';
    }

    public function store(){
        $this->validate([
            'nama_kabkota' => 'required',
            'jml_desa' => 'required',
        ]);
        KabupatenKota::create([
            'nama_kabkota' => $this->nama_kabkota,
            'jml_desa' => $this->jml_desa,
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
        $kabkota = KabupatenKota::where('id_kab', $id)->first();
        $this->kab_id = $id;
        $this->nama_kabkota = $kabkota->nama_kabkota;
        $this->jml_desa = $kabkota->jml_desa;
        // dd($kabkota);
    }

    public function update()
    {
        $this->validate([
            'nama_kabkota' => 'required',
            'jml_desa' => 'required',
        ]);
        if ($this->kab_id) {
            $kabkota = KabupatenKota::find($this->kab_id);
            $kabkota->update([
                'nama_kabkota' => $this->nama_kabkota,
                'jml_desa' => $this->jml_desa,
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
        // KabupatenKota::destroy($id);
        KabupatenKota::where('id_kab', $id)->delete();
        
    }

}
