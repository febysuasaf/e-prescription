<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailresepracikanModels extends Model
{
    use HasFactory;

    protected $table = 'detail_resep_racikan';
    protected $fillable = [
            'id_detail_resep',
            'id_obat',
            'quantity'
     ];
    public $timestamps = true;
}
