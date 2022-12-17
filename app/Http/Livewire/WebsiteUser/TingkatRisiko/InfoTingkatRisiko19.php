<?php

namespace App\Http\Livewire\WebsiteUser\TingkatRisiko;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\KabupatenKota;
use App\Models\Tahun;
use App\Models\Hasil;

class InfoTingkatRisiko19 extends Component
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

        $data = Hasil::where('tahun_id','3')
                ->orderBy('id_hasil','asc')
                ->paginate($this->paging);
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        return view('web-user.info-tingkatrisiko', compact('data','tahun','kab'))->layout('layouts.base');
        
    }
}
