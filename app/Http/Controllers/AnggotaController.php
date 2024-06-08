<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index() {
        // dd(Anggota::get()->toArray());
        return view('anggota', ['data' => Anggota::get()]);
    }

    public function store(Request $request) {
        $data = Anggota::where('nik', $request->nik)->first();
        if ($data) {
            return redirect()->back()->with('error', 'Nik telah terdaftar !!!');
        }

        return Anggota::insert([
            'name' => $request->name,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ])
        ? redirect('/anggota')->with('success', 'berhasil menambahkan data')
        : redirect()->back()->with('error', 'gagal menambahkan data !!!');
    }

    public function update(Request $request, $id) {
        $data = Anggota::where('nik', $request->nik)->first();
        if ($data) {
            if ($data->nik === $request->nik && (int) $id === $data->id ) {
                return $this->saveUpdate($request, $id);
            } else {
                return redirect()->back()->with('error', 'Nik telah terdaftar !!!');
            }
        }
    }

    public function saveUpdate($request, $id) {
        return Anggota::where('id', $id)->update([
            'name' => $request->name,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ])
        ? redirect('/anggota')->with('success', 'berhasil update data')
        : redirect()->back()->with('error', 'gagal update data !!!');
    }

    public function destroy($id) {
        return Anggota::where('id', $id)->delete()
        ? redirect('/anggota')->with('success', 'berhasil menghapus data')
        : redirect()->back()->with('error', 'gagal menghapus data !!!');
    }
}
