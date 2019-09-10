<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Personel;
use Illuminate\Http\Request;

class ValuePersonelController extends Controller
{
    public function create(Request $request)
    {
        $kategori = $request->get('kategori');
        $id = $request->get('id');
        if (empty($kategori) || empty($id)){
            abort(500);
        }

        $kategori = Kategori::where('id', $kategori)->firstOrFail();
        $personel = Personel::where('uuid', $id)->firstOrFail();

        if ($kategori->is_many == '1'){

        }
    }
}
