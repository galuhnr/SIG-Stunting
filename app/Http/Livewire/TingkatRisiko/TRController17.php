<?php

namespace App\Http\Livewire\TingkatRisiko;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KabupatenKota;
use App\Models\Tahun;
use App\Models\Hasil;

use Illuminate\Support\Facades\Auth;

class TRController17 extends Component
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
        $data = Hasil::where('tahun_id','1')->with('tb_tahun', 'kabupaten_kota')->orderBy('id_hasil','asc')->paginate($this->paging);
        $tahun = Tahun::all();
        $kab = KabupatenKota::all();
        if(in_array(request()->route()->getName(),['tabel-tingkat-risiko2017'])){

            return view('livewire.tabel-tr.tr2017', compact('data','tahun','kab'))->layout('layouts.base');
        }else if(Auth::check() && in_array(request()->route()->getName(),['tingkat-risiko2017'])){
           
            return view('livewire.tabel-tr.tr2017', compact('data','tahun','kab'))->layout('layouts.app');
        }
    }

}
