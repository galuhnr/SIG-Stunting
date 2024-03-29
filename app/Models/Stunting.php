<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stunting extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "stunting";
    protected $primaryKey = 'id_stunting';
    protected $fillable = [
        'tahun_id',
        'kabkota_id',
        'jml_balita_diukur',
        'jml_balita_stunting',
        'persentase'
    ];

    public function tb_tahun() {
        return $this->belongsTo(Tahun::class,'tahun_id');
    }

    public function kabupaten_kota() {
        return $this->belongsTo(KabupatenKota::class, 'kabkota_id');
    }

}
