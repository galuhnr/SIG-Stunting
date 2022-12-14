<?php

namespace App\Http\Livewire\Peta;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PetaApiController extends Component
{
    public function result1()
    {
        $fuzz = DB::table('hasil_risiko_new')
                     ->select()
                     ->where('tahun_id', '=', 1)
                     ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

    public function result2()
    {
        $fuzz = DB::table('hasil_risiko_new')
                     ->select()
                     ->where('tahun_id', '=', 2)
                     ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

    public function result3()
    {
        $fuzz = DB::table('hasil_risiko_new')
                     ->select()
                     ->where('tahun_id', '=', 3)
                     ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

    public function result4()
    {
        $fuzz = DB::table('hasil_risiko_new')
                     ->select()
                     ->where('tahun_id', '=', 4)
                     ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

    public function result5()
    {
        $fuzz = DB::table('hasil_risiko_new')
                     ->select()
                     ->where('tahun_id', '=', 5)
                     ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

    public function result6()
    {
        $fuzz = DB::table('hasil_risiko')
                        ->select()
                        ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

    public function result7()
    {
        $fuzz = DB::table('prediksi_risiko')
                        ->select()
                        ->where('tahun_id', '=', 4)
                        ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

    public function result8()
    {
        $fuzz = DB::table('prediksi_risiko')
                        ->select()
                        ->where('tahun_id', '=', 5)
                        ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

    public function result9()
    {
        $fuzz = DB::table('prediksi_risiko')
                        ->select()
                        ->where('tahun_id', '=', 6)
                        ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

    public function result10()
    {
        $fuzz = DB::table('prediksi_risiko')
                        ->select()
                        ->where('tahun_id', '=', 3)
                        ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

    public function result11()
    {
        $fuzz = DB::table('fasilitas_kesehatan')
                        ->select()
                        ->get();
        $result = json_encode($fuzz);
        echo $result;
    }

}