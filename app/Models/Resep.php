<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $fillable = ['kategori_id', 'nama_resep', 'bahan', 'cara_masak', 'foto'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}