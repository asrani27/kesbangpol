<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use App\Kategori;
use Storage;

class DokumenController extends Controller
{
    public function index()
    {
        $data = Dokumen::all();
        $kategori = Kategori::all();
        return view('backend.dokumen.index',compact('data','kategori'));
    }

    public function store(Request $req)
    {
        
        if($req->hasFile('file'))
        {
            $filename = $req->file->getClientOriginalName();
            $filetype = $req->file->getClientOriginalExtension();
            $filesize = number_format($req->file->getClientSize() / 1048576,2); 
            $filename = date('d-m-Y-').rand(1,9999).$filename;
            $req->file->storeAs('/public/dokumen',$filename);
        }     
        $s = new Dokumen;
        $s->judul    = $req->judul;
        $s->filename = $filename;
        $s->jenis    = $filetype;
        $s->size     = $filesize;
        $s->kategori_id = $req->kategori;
        $s->save();
        
        return back();
    }

    public function delete($id)
    {
        $file = Dokumen::where('id', $id)->first()->filename;
        Storage::delete('/public/dokumen/'.$file);
        
        $d = Dokumen::find($id)->delete();
        return back();
    }
}
