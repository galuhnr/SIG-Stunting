<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PetaApiController extends Component
{
    public function result1()
    {
        $fuzz = DB::table('hasil_risiko')
                     ->select()
                     ->where('tahun_id', '=', 1)
                     ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

    public function result2()
    {
        $fuzz = DB::table('hasil_risiko')
                     ->select()
                     ->where('tahun_id', '=', 2)
                     ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

    public function result3()
    {
        $fuzz = DB::table('hasil_risiko')
                     ->select()
                     ->where('tahun_id', '=', 3)
                     ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

    public function result4()
    {
        $fuzz = DB::table('hasil_risiko')
                     ->select()
                     ->where('tahun_id', '=', 4)
                     ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

    public function result5()
    {
        $fuzz = DB::table('hasil_risiko')
                     ->select()
                     ->where('tahun_id', '=', 5)
                     ->get();
        $result = json_encode($fuzz);
        echo $result;
    }
}