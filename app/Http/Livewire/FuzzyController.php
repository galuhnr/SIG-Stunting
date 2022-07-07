<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FuzzyController extends Component
{
    

    public function result1()
    {
        set_time_limit(500);
        $result = shell_exec("python " . base_path(). "\python\data2017.py 2>&1");
        echo $result;
    }
}