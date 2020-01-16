<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::all();
        return view('backend.kategori.index',compact('data'));
    }

    public function store(Request $req)
    {
        $s = new Kategori;
        $s->nama = $req->nama;
        $s->save();
        $pesan = array(
            'message' => 'Berhasil Di Simpan', 
            'alert-type' => 'success');
        return back()->with($pesan);
    }

    public function update(Request $req)
    {
        $s = Kategori::where('id', $req->idedit)->first();
        $s->nama = $req->nama;
        $s->save();
        $pesan = array(
            'message' => 'Berhasil Di Update', 
            'alert-type' => 'success');
        return back()->with($pesan);
    }

    public function delete($id)
    {
        $del = Kategori::find($id)->delete();
        $pesan = array(
            'message' => 'Berhasil Di Hapus', 
            'alert-type' => 'success');
        return back()->with($pesan);
    }
}
