<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{

    public function index()
    {
        $data = Reminder::first();
        if (!$data){
            Reminder::create(['name' => '6 months']);
            $data = Reminder::first();
        }
        return view('content.reminder.index')
            ->with('data', $data);
    }

    public function create()
    {
        $data = Reminder::first();
        if (!$data){
            Reminder::create(['name' => '6 months']);
            $data = Reminder::first();
        }

        list($angka, $satuan) = explode(' ', $data->name);
        return view('content.reminder.add')
            ->with('angka', $angka)
            ->with('satuan', $satuan);
    }

    public function store(Request $request)
    {
        $data = Reminder::first();
        if (!$data){
            Reminder::create(['name' => '6 months']);
            $data = Reminder::first();
        }

        $data->name = $request->angka . ' ' . $request->satuan;
        if ($data->save()){
            $request->session()->flash('status', 'Setting berhasil dirubah !');
        }
        return redirect()->route('reminder.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
