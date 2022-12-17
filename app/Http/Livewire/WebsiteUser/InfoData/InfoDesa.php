<?php

namespace App\Http\Livewire\WebsiteUser\InfoData;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\KabupatenKota;
use App\Models\Tahun;
use App\Models\desaUCI;

class InfoDesa extends Component
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
        $data = desaUCI::with('tb_tahun', 'kabupaten_kota')
                ->orderBy('id_desa','asc')->paginate($this->paging);
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        return view('web-user.info-desa', compact('data','tahun','kab'))->layout('layouts.base');
        
    }
}
