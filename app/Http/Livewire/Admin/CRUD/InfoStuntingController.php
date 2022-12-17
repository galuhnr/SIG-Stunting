<?php

namespace App\Http\Livewire\Admin\CRUD;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InfoStunting;

class InfoStuntingController extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['delete'];

    public $paging, $info_id, $nama_info, $isi_info;
   
    public $updateMode = false;

    public function mount()
    {
        $this->paging = 10;
    }

    public function render()
    {
        $data = InfoStunting::orderBy('id_info','asc')->paginate($this->paging);
        $info = [
            'data' => $data
        ];
        return view('livewire.info-stunting.index', $info);
    }

    private function resetInputFields(){
        $this->nama_info = '';
        $this->isi_info = '';
    }

    public function store(){
        $this->validate([
            'nama_info' => 'required',
            'isi_info' => 'required',
        ]);
        InfoStunting::create([
            'nama_info' => $this->nama_info,
            'isi_info' => $this->isi_info,
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
        $info = InfoStunting::where('id_info', $id)->first();
        $this->info_id = $id;
        $this->nama_info = $info->nama_info;
        $this->isi_info = $info->isi_info;
        // dd($kabkota);
    }

    public function update()
    {
        $this->validate([
            'nama_info' => 'required',
            'isi_info' => 'required',
        ]);
        if ($this->info_id) {
            $info = InfoStunting::find($this->info_id);
            $info->update([
                'nama_info' => $this->nama_info,
                'isi_info' => $this->isi_info,
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
        InfoStunting::where('id_info', $id)->delete();
        
    }
}
