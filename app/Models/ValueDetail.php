<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValueDetail extends Model
{
    protected $fillable = [
        'urutan_id',
        'value',
        'detail_kategori_id',
    ];

    protected $table = 'value_detail';

    public function detailKategori()
    {
        return $this->belongsTo(DetailKategori::class, 'detail_kategori_id');
    }

    public function urutan()
    {
        return $this->belongsTo(Urutan::class, 'urutan_id');
    }
}
