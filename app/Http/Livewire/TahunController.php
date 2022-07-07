<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Tahun;
use Livewire\Component;

class TahunController extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['delete'];

    public $paging, $search;

    public $tahun_id, $tahun;
    public $updateMode = false;

    public function mount()
    {
        $this->paging = 10;
    }

    public function render()
    {

        $kabupaten = Tahun::orderBy('id_tahun', 'asc')->paginate($this->paging);
        $kab = [
            'data' => $kabupaten
        ];
        return view('livewire.tahun.index', $kab);
    }

    private function resetInputFields(){
        $this->tahun = '';
    }

    public function store(){
        $this->validate([
            'tahun' => 'required',
        ]);
        Tahun::create([
            'tahun' => $this->tahun,
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
        $kabkota = Tahun::where('id_tahun', $id)->first();
        $this->tahun_id = $id;
        $this->tahun = $kabkota->tahun;
        // dd($kabkota);
    }

    public function update()
    {
        $this->validate([
            'tahun' => 'required',
        ]);
        if ($this->tahun_id) {
            $kabkota = Tahun::find($this->tahun_id);
            $kabkota->update([
                'tahun' => $this->tahun,
            ]);
            $this->updateMode = false;
            $this->resetInputFields();
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
        Tahun::where('id_tahun', $id)->delete();
        
    }

}
