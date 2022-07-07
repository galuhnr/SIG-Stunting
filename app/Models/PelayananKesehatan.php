<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelayananKesehatan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "pelayanan_kesehatan";
    protected $primaryKey = 'id_pelayanan';
    protected $fillable = [
        'tahun_id',
        'kabkota_id',
        'jml_balita',
        'jml_balita_sehat',
    ];

    // public function AllData(){
    //     return DB::table('pelayanan_kesehatan')->get();
    // }
     
    public function tb_tahun() {
        return $this->belongsTo(Tahun::class,'tahun_id');
    }

    public function kabupaten_kota() {
        return $this->belongsTo(KabupatenKota::class, 'kabkota_id');
    }
}
