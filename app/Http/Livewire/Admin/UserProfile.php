<?php

namespace App\Http\Livewire\Admin;
use App\Models\User;

use Livewire\Component;

class UserProfile extends Component
{
    public User $user;
    
    protected $rules = [
        'user.name' => 'max:40|min:3',
        'user.email' => 'email:rfc,dns',
        'user.phone' => 'max:10',
        'user.about' => 'max:200',
        'user.location' => 'min:3'
    ];

    public function mount() { 
        $this->user = auth()->user();
    }

    public function save() {
        $this->validate([
            'user.name' => 'required',
            'user.email' => 'required',
        ]);
        if($this->user->id){
            $kabkota = User::find($this->user->id);
            $kabkota->update([
                'name' => $this->user->name,
                'email' => $this->user->email,
            ]);
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Data berhasil diperbarui',
                'text' => '',
            ]);
        }
            
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
