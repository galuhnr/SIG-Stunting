<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\desaUCI;
use App\Models\PelayananKesehatan;

class Tahun extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tb_tahun';
    
    protected $primaryKey = 'id_tahun';

    protected $fillable = [
        'tahun'
    ];

    public function desaUCI() {
        return $this->hasMany(desaUCI::class);
    }

    public function pelayananKesehatan() {
        return $this->hasMany(PelayananKesehatan::class);
    }
}
