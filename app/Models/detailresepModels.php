<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailresepModels extends Model
{
    use HasFactory;

    protected $table = 'detail_resep';
    protected $fillable = [
            'id_header_resep',
            'id_obat',
            'nama_racikan',
            'id_signa',
            'jenis_obat',
            'quantity'
     ];
    public $timestamps = true;
}
