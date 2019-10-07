<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'nama',
        'nip',
        'tempat_lahir',
        'tgl_lahir',
        'foto',
        'tmt_pangkat',
        'tmt_berkala',
        'tgl_pensiun',
    ];

    protected $table = 'personel';

    protected $dates = ['deleted_at'];

    public function urutan()
    {
        return $this->hasMany(Urutan::class, 'personel_id');
    }

}
