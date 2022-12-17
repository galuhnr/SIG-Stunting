<?php

namespace App\Http\Livewire\Admin\TingkatRisiko;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KabupatenKota;
use App\Models\Tahun;
use App\Models\Hasil;

class TRController17 extends Component
{
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public $paging;

    public $searchTerm;

    public function mount()
    {
        $this->paging = 10;
    }

    public function render()
    {
        $data = Hasil::where('tahun_id','1')
                ->where('tingkat_risiko','like', '%'.$this->searchTerm.'%')
                ->orderBy('id_hasil','asc')
                ->paginate($this->paging);
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        return view('livewire.tabel-tr.tr2017', compact('data','tahun','kab'))->layout('layouts.app');
    }

}
