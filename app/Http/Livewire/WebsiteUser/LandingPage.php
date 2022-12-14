<?php

namespace App\Http\Livewire\WebsiteUser;

use Livewire\Component;

class LandingPage extends Component
{
    public function render()
    {
        return view('web-user.landing')->layout('layouts.base');
    }
}
