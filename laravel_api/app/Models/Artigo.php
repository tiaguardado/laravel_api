<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    /** @use HasFactory<\Database\Factories\ArtigoFactory> */
    use HasFactory;

    protected $fillable = [
        'titulo',
        'composicao'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
