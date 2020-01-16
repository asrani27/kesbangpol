<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = Artikel::all();
        return view('backend.artikel.index',compact('data'));
    }
    
    public function add()
    {
        return view('backend.artikel.add');        
    }
    
    public function edit($id)
    {
        $data = Artikel::find($id);
        return view('backend.artikel.edit',compact('data'));        
    }
    
    public function store(Request $req)
    {
        if($req->hasFile('file'))
        {
            $filename = $req->file->getClientOriginalName();
            $filename = date('d-m-Y-').rand(1,9999).$filename;
            $req->file->storeAs('/public/artikel',$filename);
        }
        $s = new Artikel;
        $s->judul = $req->judul;
        $s->isi = $req->isi;
        $s->publish = $req->publish;
        $s->gambar = $filename;
        $s->save();
        
        $pesan = array(
            'message' => 'Beranda Berhasil Di Simpan', 
            'alert-type' => 'success');
        return redirect('/artikel')->with($pesan);
    }
    
    public function update(Request $req, $id)
    {
        if($req->hasFile('file'))
        {
            $filename = $req->file->getClientOriginalName();
            $filename = date('d-m-Y-').rand(1,9999).$filename;
            $req->file->storeAs('/public/artikel',$filename);
            $s = Artikel::find($id);
            $s->judul = $req->judul;
            $s->isi = $req->isi;
            $s->publish = $req->publish;
            $s->gambar = $filename;
            $s->save();
        }
        else {
            
            $s = Artikel::find($id);
            $s->judul = $req->judul;
            $s->isi = $req->isi;
            $s->publish = $req->publish;
            $s->save();
        }
        
        $pesan = array(
            'message' => 'Beranda Berhasil Di Simpan', 
            'alert-type' => 'success');
        return redirect('/artikel')->with($pesan);   
    }
    
    public function delete($id)
    {
        $delete = Artikel::find($id);
        Storage::delete('public/artikel/'.$delete->gambar);
        $delete->delete();

        $pesan = array(
            'message' => 'Beranda Berhasil Di Hapus', 
            'alert-type' => 'success');
        return back()->with($pesan);
    }
}
