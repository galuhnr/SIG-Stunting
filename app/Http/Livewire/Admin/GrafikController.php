<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class GrafikController extends Component
{
    public function render()
    {
        if(in_array(request()->route()->getName(),['grafik-tingkat-risiko'])){  
            return view('livewire.grafik.grafik-tingkat-risiko')->layout('layouts.base');
        }
        else if(Auth::check() && in_array(request()->route()->getName(),['grafik-tingkatrisiko'])){
            return view('livewire.grafik.grafik-tingkat-risiko')->layout('layouts.app');

        }else if(in_array(request()->route()->getName(),['grafik-pelayanan-kesehatan'])){
            return view('livewire.grafik.grafik-pelayanan-kesehatan')->layout('layouts.base');

        }
        else if(Auth::check() && in_array(request()->route()->getName(),['grafik-pelayanan'])){
            return view('livewire.grafik.grafik-pelayanan-kesehatan')->layout('layouts.app');

        }
        else if(in_array(request()->route()->getName(),['grafik-sanitasi-layak'])){
            return view('livewire.grafik.grafik-sanitasi')->layout('layouts.base');

        }
        else if(Auth::check() && in_array(request()->route()->getName(),['grafik-sanitasi'])){
            return view('livewire.grafik.grafik-sanitasi')->layout('layouts.app');

        }else if(in_array(request()->route()->getName(),['grafik-desa-uci'])){
            return view('livewire.grafik.grafik-desa')->layout('layouts.base');
            
        }
        else if(Auth::check() && in_array(request()->route()->getName(),['grafik-desauci'])){
            return view('livewire.grafik.grafik-desa')->layout('layouts.app');

        }else if(in_array(request()->route()->getName(),['grafik-asi-eksklusif'])){
            return view('livewire.grafik.grafik-asi')->layout('layouts.base');
            
        }
        else if(Auth::check() && in_array(request()->route()->getName(),['grafik-asi'])){
            return view('livewire.grafik.grafik-asi')->layout('layouts.app');

        }else if(in_array(request()->route()->getName(),['grafik-stunting'])){
            return view('livewire.grafik.grafik-stunting')->layout('layouts.base');
            
        }
        else if(Auth::check() && in_array(request()->route()->getName(),['grafik-prevalensi-stunting'])){
            return view('livewire.grafik.grafik-stunting')->layout('layouts.app');
        }
        
    }
}
