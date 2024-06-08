<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('admin.user', ['data' => User::get()]);
    }

    public function store(Request $request) {
        $data = User::where('username', $request->username)->first();
        if ($data) {
            return redirect()->back()->with('error', 'username telah terdaftar');
        }

        return User::insert([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nonhash' => $request->password,
            'role' => $request->role
        ]) 
        ? redirect('/admin/user')->with('success', 'sukses menambahkan data')
        : redirect()->back()->with('error', 'gagal menambahkan data');
    }

    public function update(Request $request, $id) {
        $data = User::where('username', $request->username)->first();
        if ($data) {
            if ($data->username == $request->username && $data->id == (int) $id ) {
                return $this->saveUpdate($request, $id);
            } else {
                return redirect()->back()->with('error', 'username telah terdaftar !');
            }
        }
    }

    public function saveUpdate($request, $id) {
        return User::where('id', $id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nonhash' => $request->password,
            'role' => $request->role
        ])
        ? redirect('/admin/user')->with('success', 'sukses update data')
        : redirect()->back()->with('error', 'gagal update data');
    }

    public function destroy($id) {
        return User::where('id', $id)->delete()
        ? redirect('/admin/user')->with('success', 'sukses menambahkan data !')
        : redirect()->back()->with('error', 'gagal delete data');
    }
}
