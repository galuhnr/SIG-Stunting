<?php

namespace App\Http\Livewire\Peta;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PetaPrediksiController extends Component
{
    public function render()
    {
        if(in_array(request()->route()->getName(),['peta-prediksi2019'])){
            return view('livewire.peta-prediksi.prediksi2019')->layout('layouts.base');
        }else if(Auth::check() && in_array(request()->route()->getName(),['prediksi2019'])){
            return view('livewire.peta-prediksi.prediksi2019')->layout('layouts.app');
        }else if(in_array(request()->route()->getName(),['peta-prediksi2020'])){
            return view('livewire.peta-prediksi.prediksi2020')->layout('layouts.base');
        }else if(Auth::check() && in_array(request()->route()->getName(),['prediksi2020'])){
            return view('livewire.peta-prediksi.prediksi2020')->layout('layouts.app');
        }else if(in_array(request()->route()->getName(),['peta-prediksi2021'])){
            return view('livewire.peta-prediksi.prediksi2021')->layout('layouts.base');
        }else if(Auth::check() && in_array(request()->route()->getName(),['prediksi2021'])){
            return view('livewire.peta-prediksi.prediksi2021')->layout('layouts.app');
        }else if(in_array(request()->route()->getName(),['peta-prediksi2022'])){
            return view('livewire.peta-prediksi.prediksi2022')->layout('layouts.base');
        }else if(Auth::check() && in_array(request()->route()->getName(),['prediksi2022'])){
            return view('livewire.peta-prediksi.prediksi2022')->layout('layouts.app');
        }
    }
}
