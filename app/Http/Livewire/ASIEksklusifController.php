<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KabupatenKota;
use App\Models\Tahun;
use App\Models\ASIEksklusif;

class ASIEksklusifController extends Component
{
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public $listeners = ['delete'];
    public $paging;

    public $asi_id, $tahun_id, $kabkota_id, $jml_bayi, $jml_diberi_asi;
    public $updateMode = false;

    public function mount()
    {
        $this->paging = 10;
    }

    public function render()
    {
        $data = ASIEksklusif::with('tb_tahun', 'kabupaten_kota')->orderBy('id_asi','asc')->paginate($this->paging);
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        return view('livewire.asi-eksklusif.index', compact('data','tahun','kab'));
    }

    private function resetInputFields(){
        $this->tahun_id = '';
        $this->kabkota_id = '';
        $this->jml_bayi = '';
        $this->jml_diberi_asi = '';
    }

    public function create()
    {
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        return view('livewire.asi-eksklusif.create', compact('tahun', 'kab'));
    }

    public function store(){
        $this->validate([
            'tahun_id' => 'required',
            'kabkota_id' => 'required',
            'jml_bayi' => 'required',
            'jml_diberi_asi' => 'required',
        ]);
        
        ASIEksklusif::create([
            'tahun_id' => $this->tahun_id,
            'kabkota_id' => $this->kabkota_id,
            'jml_bayi' => $this->jml_bayi,
            'jml_diberi_asi' => $this->jml_diberi_asi,
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
        $data = ASIEksklusif::where('id_asi', $id)->first();
        $this->asi_id = $id;
        $this->tahun_id = $data->tahun_id;
        $this->kabkota_id = $data->kabkota_id;
        $this->jml_bayi = $data->jml_bayi;
        $this->jml_diberi_asi = $data->jml_diberi_asi;

    }

    public function update()
    {
        $this->validate([
            'tahun_id' => 'required',
            'kabkota_id' => 'required',
            'jml_bayi' => 'required',
            'jml_diberi_asi' => 'required',
        ]);
        if ($this->asi_id) {
            $asi = ASIEksklusif::find($this->asi_id);
            $asi->update([
                'tahun_id' => $this->tahun_id,
                'kabkota_id' => $this->kabkota_id,
                'jml_bayi' => $this->jml_bayi,
                'jml_diberi_asi' => $this->jml_diberi_asi,
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
        ASIEksklusif::where('id_asi', $id)->delete();
    }

}
