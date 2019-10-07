<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Urutan extends Model
{
    protected $fillable = [
        'no',
        'kategori_id',
        'personel_id',
    ];

    protected $table = 'urutan';

    public $timestamps = false;

    public function personel()
    {
        return $this->belongsTo(Personel::class, 'personel_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
