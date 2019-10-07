<?php

namespace App\Http\Controllers;

use App\Models\Personel;
use App\Models\Reminder;
use DateTime;
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

        $date = new DateTime();
        $date->modify('+'.$data->name);
        $formatted_date = $date->format('Y-m-d');
        $berkala = Personel::where('tmt_berkala', '<', $formatted_date)
            ->orderBy('tmt_berkala', 'asc')
            ->get();
        $pangkat = Personel::where('tmt_pangkat', '<', $formatted_date)
            ->orderBy('tmt_pangkat', 'asc')
            ->get();
        return view('content.reminder.index')
            ->with('berkala', $berkala)
            ->with('pangkat', $pangkat)
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
