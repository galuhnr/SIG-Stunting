<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ASIEksklusif extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "asi_eksklusif";
    protected $primaryKey = 'id_asi';
    protected $fillable = [
        'tahun_id',
        'kabkota_id',
        'jml_bayi',
        'jml_diberi_asi',
    ];

    public function tb_tahun() {
        return $this->belongsTo(Tahun::class,'tahun_id');
    }

    public function kabupaten_kota() {
        return $this->belongsTo(KabupatenKota::class, 'kabkota_id');
    }
}
