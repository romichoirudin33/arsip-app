<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Personel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class PersonelController extends Controller
{

    public function index()
    {
        $personel = Personel::all();
        return view('content.personel.index')
            ->with('personel', $personel);
    }

    public function create()
    {
        return view('content.personel.add');
    }

    public function store(Request $request)
    {
        $dt = new Carbon();
        $lahir = $dt->subYears(15)->format('Y-m-d');
        $uuid = uniqid();

        $this->validate($request, [
            'tgl_lahir' => 'required|before:' . $lahir,
            'foto' => 'required|image',
        ]);

        $files = $request->file('foto');

        $thumbnail = Image::canvas(200, 200, '#f9f9f9');
        $image = Image::make($files)->resize(200, 200, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });
        $thumbnail->insert($image, 'center');
        $ext = $files->getClientOriginalExtension();
        $nama = $uuid;
        $namaFoto = $nama . '.' . $ext;

        $thumbnail->save(public_path('assets/upload/' . $namaFoto));

        $t = strtotime($request->input('tgl_lahir'));
        $t2 = strtotime('+58 years', $t);


        $data = array(
            'uuid' => $uuid,
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'foto' => $namaFoto,
            'tmt_pangkat' => date('Y-m-d', strtotime($request->input('tmt_pangkat'))),
            'tmt_berkala' => date('Y-m-d', strtotime($request->input('tmt_berkala'))),
            'tgl_pensiun' => date('Y-m-d', $t2),
        );

        Personel::create($data);
        $request->session()->flash('status', 'Data berhasil di tambah !');
        return redirect()->route('personel.index');
    }

    public function show($id)
    {
        $personel = Personel::where('uuid', $id)->first();
        if ($personel == null) {
            abort(404);
        }

        $kategori = Kategori::all();
        return view('content.personel.show')
            ->with('kategori', $kategori)
            ->with('data', $personel);
    }

    public function edit($id)
    {
        $data = Personel::where('uuid', $id)->first();
        return view('content.personel.edit')
            ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $dt = new Carbon();
        $lahir = $dt->subYears(15)->format('Y-m-d');

        $this->validate($request, [
            'tgl_lahir' => 'required|before:' . $lahir,
        ]);

        $t = strtotime($request->input('tgl_lahir'));
        $t2 = strtotime('+58 years', $t);

        $uuid = $request->input('uuid');

        $data = array(
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'tmt_pangkat' => date('Y-m-d', strtotime($request->input('tmt_pangkat'))),
            'tmt_berkala' => date('Y-m-d', strtotime($request->input('tmt_berkala'))),
            'tgl_pensiun' => date('Y-m-d', $t2),
        );

        Personel::where('id', $id)->update($data);
        $request->session()->flash('status', 'Data berhasil diubah !');
        return redirect()->route('personel.show', ['id'=> $uuid]);
    }

    public function destroy($id, Request $request)
    {
        if ($request->get('delete') == 'permanen'){
            Personel::where('id', $id)->forceDelete();
            $request->session()->flash('status', 'Data di hapus secara permanen !');
            return redirect()->route('personel.trash');
        }

        Personel::where('id', $id)->delete();
        $request->session()->flash('status', 'Data dipindahkan ke tong sampah !');
        return redirect()->route('personel.index');
    }

    public function trash()
    {
        $personel = Personel::onlyTrashed()->get();
        return view('content.personel.trash')
            ->with('personel', $personel);
    }

    public function restore($id)
    {
        Personel::where('id', $id)->restore();
        request()->session()->flash('status', 'Data berhasil di restore !!');
        return redirect()->route('personel.index');
    }

    public function search(Request $request)
    {
        $cari = $request->input('cari');
        $personel = Personel::where('nama', 'LIKE', '%' . $cari . '%')->get();
        return view('content.personel.cari')
            ->with('personel', $personel);
    }
}
