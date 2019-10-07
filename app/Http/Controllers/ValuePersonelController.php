<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Personel;
use App\Models\Urutan;
use App\Models\ValueDetail;
use function GuzzleHttp\Psr7\try_fopen;
use Illuminate\Http\Request;

class ValuePersonelController extends Controller
{
    public function create(Request $request)
    {
        $kategori = $request->get('kategori');
        $id = $request->get('id');
        if (empty($kategori) || empty($id)) {
            abort(404);
        }

        $kategori = Kategori::where('id', $kategori)->firstOrFail();
        $personel = Personel::where('uuid', $id)->firstOrFail();

        if ($kategori->is_many == '1') {
            return view('content.value_detail.is_many')
                ->with('kategori', $kategori)
                ->with('personel', $personel);
        }else{
            return view('content.value_detail.is_one')
                ->with('kategori', $kategori)
                ->with('personel', $personel);
        }
    }

    public function store(Request $request)
    {
        $kategori = $request->kategori;
        $personel = $request->personel;

        $kategori = Kategori::where('id', $kategori)->first();
        $personel = Personel::where('id', $personel)->first();

        $urutan = Urutan::where('kategori_id', $kategori->id)
            ->where('personel_id', $personel->id)
            ->orderBy('id', 'desc')
            ->first();

        if ($kategori->is_many == '1') {

            if (!$urutan) {
                $no = 1;
            }else{
                $no = $urutan->no + 1;
            }
            $urutan = Urutan::create([
                'no' => $no,
                'kategori_id' => $kategori->id,
                'personel_id' => $personel->id,
            ]);
        }else{
            if (!$urutan) {
                $no = 1;
                $urutan = Urutan::create([
                    'no' => $no,
                    'kategori_id' => $kategori->id,
                    'personel_id' => $personel->id,
                ]);
            }
        }

        foreach ($kategori->detailKategori as $det) {
            if ($det->file == '1'){
                $file = true;
                $value = $request->file('detail_'.$det->id);
            } else{
                $file = false;
                $value = $request->input('detail_'.$det->id);
            }
            $this->save_value($urutan->id, $det->id, $value, $file);
        }

        $request->session()->flash('status', 'Data berhasil di simpan !');
        return redirect()->route('personel.show', ['id' => $personel->uuid]);
    }

    public function destroy(Request $request)
    {
        $data = Urutan::where('id', $request->get('urutan_id'))
            ->first();
        $data->urutan;
        $uuid = $data->personel->uuid;

        $data->delete();
        $request->session()->flash('status', 'Data berhasil dihapus !');
        return redirect()->route('personel.show', ['id' => $uuid]);

    }

    private function save_value($urutan_id, $detail_kategori_id, $value, $file = false)
    {
        if ($file) {
            $name = $value->getClientOriginalName() . '.' . $value->extension();
            $value->move(public_path() . '/assets/upload', $name);
        } else {
            $name = $value;
        }

        $data = ValueDetail::firstOrNew([
            'urutan_id' => $urutan_id,
            'detail_kategori_id' => $detail_kategori_id
        ]);
        $data->value = $name;
        return $data->save();

        $data = array(
            'urutan_id' => $urutan_id,
            'detail_kategori_id' => $detail_kategori_id,
            'value' => $name
        );

        return ValueDetail::create($data);
    }
}
