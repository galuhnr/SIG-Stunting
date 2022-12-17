<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Component
{
    public function render()
    {
        if (Auth::check()){
            return view('livewire.peta.peta2021')->layout('layouts.app');
        }else{
            return view('livewire.peta.peta2021')->layout('layouts.base');
        }
        
    }
}
