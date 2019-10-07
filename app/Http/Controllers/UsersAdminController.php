<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class UsersAdminController extends Controller
{

    public function index()
    {
        $user = User::all();
        if ($user == null){
            abort(404);
        }
        return view('content.users.index')
            ->with('user', $user);
    }

    public function create()
    {
        return view('content.users.add');
    }

    public function store(Request $request)
    {
        $data = array(
            'name' =>  $request->input('name'),
            'username' =>  $request->input('username'),
            'alamat' =>  $request->input('alamat'),
            'no_telp' =>  $request->input('no_telp'),
            'email' =>  $request->input('email'),
            'password' =>  bcrypt($request->input('password')),
            'ip' =>  $request->ip(),
        );

        User::create($data);
        $request->session()->flash('status', 'Data berhasil ditambah !');
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if($id != Auth::id()) return redirect()->route('users.index');

        $data = User::where('id', $id)->first();
        return view('content.users.edit')
            ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $data = array(
            'name' =>  $request->input('name'),
            'username' =>  $request->input('username'),
            'alamat' =>  $request->input('alamat'),
            'no_telp' =>  $request->input('no_telp'),
            'email' =>  $request->input('email'),
            'ip' =>  $request->ip(),
        );

        User::where('id', $id)->update($data);
        $request->session()->flash('status', 'Data berhasil dirubah !');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::destroy($id);
        session()->flash('status', 'Data berhasil dihapus !');
        return redirect()->route('users.index');
    }

    public function reset($id)
    {
        $data = User::where('username', $id)->first();
        return view('content.users.reset')
            ->with('data', $data);
    }

    public function update_reset(Request $request, $id)
    {
        $data = array(
            'password' =>  bcrypt($request->input('password')),
            'ip' =>  $request->ip(),
        );

        User::where('id', $id)->update($data);
        $request->session()->flash('status', 'Password berhasil di rubah !');
        return redirect()->route('users.index');
    }
}
