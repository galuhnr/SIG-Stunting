<?php

namespace App\Http\Livewire\WebsiteUser;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class InfoFaskes extends Component
{
    public function render()
    {   
        if(in_array(request()->route()->getName(),['fasilitas-kesehatan'])){
            
            return view('web-user.faskes')->layout('layouts.base');

        }else if(Auth::check() && in_array(request()->route()->getName(),['faskes'])){

            return view('web-user.faskes')->layout('layouts.app');

        }
    }
}
