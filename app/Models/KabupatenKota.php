<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\desaUCI;
use App\Models\PelayananKesehatan;

class KabupatenKota extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kabupaten_kota';
    
    protected $primaryKey = 'id_kab';

    protected $fillable = [
        'nama_kabkota','jml_desa'
    ];

    public function desaUCI() {
        return $this->hasMany(desaUCI::class);
    }

    public function pelayananKesehatan() {
        return $this->hasMany(PelayananKesehatan::class);
    }

}
