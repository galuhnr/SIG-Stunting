<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoStunting extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'info_stunting';

    protected $primaryKey = 'id_info';

    protected $fillable = [
        'nama_info', 'isi_info'
    ];

}
