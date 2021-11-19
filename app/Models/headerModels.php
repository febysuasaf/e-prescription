<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class headerModels extends Model
{
    use HasFactory;

    protected $table = 'header';
    protected $fillable = [
            'id_resep'
     ];
    public $timestamps = true;
}
