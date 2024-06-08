<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pinjam;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index() {
        $anggota = Anggota::get();
        $pinjaman = Pinjam::get();
        return view('pinjaman', ['anggota' => $anggota, 'pinjaman' => $pinjaman]);
    }
}
