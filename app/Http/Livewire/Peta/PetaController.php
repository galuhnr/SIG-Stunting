<?php

namespace App\Http\Livewire\Peta;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PetaController extends Component
{
    public function render()
    {
        if(in_array(request()->route()->getName(),['peta-stunting-2017'])){
            return view('livewire.peta.peta2017')->layout('layouts.base');
        }else if(Auth::check() && in_array(request()->route()->getName(),['peta2017'])){
            return view('livewire.peta.peta2017')->layout('layouts.app');
        }else if(in_array(request()->route()->getName(),['peta-stunting-2018'])){
            return view('livewire.peta.peta2018')->layout('layouts.base');
        }else if(Auth::check() && in_array(request()->route()->getName(),['peta2018'])){
            return view('livewire.peta.peta2018')->layout('layouts.app');
        }else if(in_array(request()->route()->getName(),['peta-stunting-2019'])){
            return view('livewire.peta.peta2019')->layout('layouts.base');
        }else if(Auth::check() && in_array(request()->route()->getName(),['peta2019'])){
            return view('livewire.peta.peta2019')->layout('layouts.app');
        }else if(in_array(request()->route()->getName(),['peta-stunting-2020'])){
            return view('livewire.peta.peta2020')->layout('layouts.base');
        }else if(Auth::check() && in_array(request()->route()->getName(),['peta2020'])){
            return view('livewire.peta.peta2020')->layout('layouts.app');
        }else if(in_array(request()->route()->getName(),['peta-stunting-2021'])){
            return view('livewire.peta.peta2021')->layout('layouts.base');
        }else if(Auth::check() && in_array(request()->route()->getName(),['peta2021'])){
            return view('livewire.peta.peta2021')->layout('layouts.app');
        }
        
    }
}
