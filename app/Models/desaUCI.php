<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tahun;
use App\Models\KabupatenKota;
use Illuminate\Support\Facades\DB;

class desaUCI extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "desa_uci";
    protected $primaryKey = 'id_desa';
    protected $fillable = [
        'kabkota_id',
        'tahun_id',
        'jml_desaUCI',
    ];

    public function AllData(){
        return DB::table('desaUCI')->get();
    }
     
    public function tb_tahun() {
        return $this->belongsTo(Tahun::class,'tahun_id');
    }

    public function kabupaten_kota() {
        return $this->belongsTo(KabupatenKota::class, 'kabkota_id');
    }
}
