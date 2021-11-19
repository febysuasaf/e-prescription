<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obatModels extends Model
{
    use HasFactory;

    protected $table = 'obatalkes_m';
    protected $fillable = [
            'obatalkes_id',
            'obatalkes_kode',
            'obatalkes_nama',
            'stok'
    ];
    public $timestamps = true;
}
