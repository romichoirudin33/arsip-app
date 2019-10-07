<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = [
        'name',
        'personel_id',
    ];

    protected $table = 'jabatan';

    public function personel()
    {
        return $this->hasOne(Personel::class, 'personel_id');
    }
}
