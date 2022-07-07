<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanitasiJamban extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "sanitasi_jamban";
    protected $primaryKey = 'id_sanitasi';
    protected $fillable = [
        'tahun_id',
        'kabkota_id',
        'jml_kk',
        'jml_akses_jamban',
    ];
    
    public function tb_tahun() {
        return $this->belongsTo(Tahun::class,'tahun_id');
    }

    public function kabupaten_kota() {
        return $this->belongsTo(KabupatenKota::class, 'kabkota_id');
    }
}
