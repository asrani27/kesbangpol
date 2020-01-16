<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galery;

use Storage;
use File;
class GaleryController extends Controller
{
    public function store(Request $req, $id)
    {
        if ($req->hasFile('file')){
            foreach ($req->file as $file)
              {
              $filename = $file->getClientOriginalName();
              $filename = date('d-m-Y-his').$filename;
              $file->storeAs('/public',$filename);
              
              $file = new Galery;
              $file->judul = $req->judul;
              $file->filename = $filename;
              $file->ormas_id = $id;
              $file->save();
              }
            }
            
        $pesan = array(
            'message' => 'Beranda Berhasil Di Upload', 
            'alert-type' => 'success');
        return back()->with($pesan);
    }

    public function delete($id)
    {
        $d = Galery::find($id);
        $file = $d->filename;
        Storage::delete('public/'.$file);
        $d->delete();
        
        $pesan = array(
            'message' => 'Beranda Berhasil Di Hapus', 
            'alert-type' => 'success');
        return back()->with($pesan);
    }
}
