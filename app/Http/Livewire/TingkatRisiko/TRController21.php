<?php

namespace App\Http\Livewire\TingkatRisiko;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KabupatenKota;
use App\Models\Tahun;
use App\Models\Hasil;

class TRController21 extends Component
{
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public $paging;

    public function mount()
    {
        $this->paging = 10;
    }

    public function render()
    {
        $data = Hasil::where('tahun_id','5')->with('tb_tahun', 'kabupaten_kota')->orderBy('id_hasil','asc')->paginate($this->paging);
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        return view('livewire.tabel-tr.tr2021', compact('data','tahun','kab'));
    }

}
