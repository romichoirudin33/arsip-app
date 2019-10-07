<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailKategori extends Model
{
    protected $fillable = [
        'name',
        'required',
        'file',
        'kategori_id',
    ];

    protected $table = 'detail_kategori';

    public $timestamps = false;

    public function valueDetail()
    {
        return $this->hasMany(ValueDetail::class, 'detail_kategori_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
