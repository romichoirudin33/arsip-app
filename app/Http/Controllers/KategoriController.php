<?php

namespace App\Http\Controllers;

use App\Models\DetailKategori;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::get();
        return view('content.categorys.index')
            ->with('data', $data);
    }

    public function create()
    {
        return view('content.categorys.add');
    }

    public function store(Request $request)
    {
        $data = array(
            'name' =>  $request->input('name'),
            'is_many' =>  $request->input('is_many'),
        );

        Kategori::create($data);
        $request->session()->flash('status', 'Data berhasil ditambah !');
        return redirect()->route('category.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $data = Kategori::where('id', $id)->first();
        return view('content.categorys.edit')
            ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $data = array(
            'name' =>  $request->input('name'),
            'is_many' =>  $request->input('is_many'),
        );

        Kategori::where('id', $id)->update($data);
        $request->session()->flash('status', 'Data berhasil dirubah !');
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        Kategori::where('id', $id)->delete();
        request()->session()->flash('status', 'Data berhasil dihapus !');
        return redirect()->route('category.index');
    }

    public function create_detail($id)
    {
        $data = Kategori::where('id', $id)->firstOrFail();
        return view('content.categorys.create-detail')
            ->with('data', $data);
    }

    public function store_detail(Request $request, $id)
    {
        $data = array(
            'name' =>  $request->input('name'),
            'required' =>  $request->input('required'),
            'file' =>  $request->input('file'),
            'kategori_id' =>  $id,
        );

        DetailKategori::create($data);
        $request->session()->flash('status', 'Detail kategori berhasil di tambah !');
        return redirect()->route('category.index');
    }

    public function edit_detail($id)
    {
        $data = DetailKategori::where('id', $id)->first();
        return view('content.categorys.edit-detail')
            ->with('data', $data);
    }

    public function update_detail(Request $request, $id)
    {
        $data = array(
            'name' =>  $request->input('name'),
            'required' =>  $request->input('required'),
            'file' =>  $request->input('file'),
        );

        DetailKategori::where('id', $id)->update($data);
        $request->session()->flash('status', 'Detail kategori berhasil di rubah !');
        return redirect()->route('category.index');
    }

    public function destroy_detail($id)
    {
        DetailKategori::where('id', $id)->delete();
        request()->session()->flash('status', 'Detail kategori berhasil dihapus !');
        return redirect()->route('category.index');
    }

}
