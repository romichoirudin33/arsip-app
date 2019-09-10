<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'name',
        'is_many',
    ];

    protected $table = 'kategori';

    public function urutan()
    {
        return $this->hasMany(Urutan::class, 'kategori_id');
    }

    public function detailKategori()
    {
        return $this->hasMany(DetailKategori::class, 'kategori_id');
    }
}
