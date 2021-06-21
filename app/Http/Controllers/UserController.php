<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use Image;
use App\Riset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function riset()
    {
        $riset = Auth::user()->riset;
        $data = $riset->map(function($item){
            $item->datas = json_decode($item->data, true);
            return $item;
        });
        return view('backend.riset.riset_user',compact('data'));   
    }

    public function saveriset(Request $req)
    {
        $tembusan = array_map('trim',array_filter(explode(',', $req->tembusan)));
        $anggota  = array_map('trim',array_filter(explode(',', $req->anggota)));

        $validator = Validator::make($req->all(), [
            'file' => 'mimes:pdf,docx,png,jpg,jpeg|max:2048'
        ]);

        if ($validator->fails()) {            
            $pesan = array(
                'message' => 'File Harus Berupa pdf/docx/png/jpg/jpeg', 
                'alert-type' => 'error');
            
            return back()->with($pesan);
        }
        
        if($req->hasFile('file'))
        {
            $filename = $req->file->getClientOriginalName();
            $filename = date('d-m-Y-').rand(1,9999).$filename;
                        
            $req->file->storeAs('/public',$filename);
        }        
        
        $datajson  = json_encode([
            'universitas' => $req->universitas,
            'no_surat'    => $req->no_surat,
            'tgl_surat'   => $req->tgl_surat,
            'nama'        => $req->nama,
            'nik'         => $req->nik,
            'alamat'      => $req->alamat,
            'no_hp'       => $req->no_hp,
            'pekerjaan'   => $req->pekerjaan,
            'jurusan'     => $req->jurusan,
            'tujuan'      => $req->tujuan,
            'riset'       => $req->riset,
            'judul'       => $req->judul,
            'penanggung_jawab'=> $req->penanggung_jawab,
            'tempat'      => $req->tempat,
            'lama_waktu'  => $req->lama_waktu,
            'tembusan'    => $tembusan,
            'anggota'     => $anggota,
            'file'        => $filename
        ]);

        $user_id       = Auth::user()->id;
        $data          = $datajson;

        $save          = new Riset;
        $save->data    = $data;
        $save->user_id = $user_id;
        $save->save();
        
        $pesan = array(
            'message' => 'Berhasil Di Simpan', 
            'alert-type' => 'success');
        
        return redirect('/riset')->with($pesan);
            
    }

    public function updateriset(Request $req, $id)
    {
        $tembusan = array_map('trim',array_filter(explode(',', $req->tembusan)));
        $anggota  = array_map('trim',array_filter(explode(',', $req->anggota)));
        
        $validator = Validator::make($req->all(), [
            'file' => 'mimes:pdf,docx,png,jpg,jpeg|max:2048'
        ]);

        if ($validator->fails()) {            
            $pesan = array(
                'message' => 'File Harus Berupa pdf/docx/png/jpg/jpeg', 
                'alert-type' => 'error');
            
            return back()->with($pesan);
        }
        //dd($req->file->getClientOriginalName());
        if($req->hasFile('file'))
        {
            $filename = $req->file->getClientOriginalName();
            $filename = date('d-m-Y-').rand(1,9999).$filename;
            $req->file->storeAs('/public',$filename);
        }
        else
        {
            $file     = Riset::find($id);
            $filename = json_decode($file->data)->file;
        }        
        
        $datajson  = json_encode([
            'universitas' => $req->universitas,
            'no_surat'    => $req->no_surat,
            'tgl_surat'   => $req->tgl_surat,
            'nama'        => $req->nama,
            'nik'         => $req->nik,
            'alamat'      => $req->alamat,
            'no_hp'       => $req->no_hp,
            'pekerjaan'   => $req->pekerjaan,
            'jurusan'     => $req->jurusan,
            'tujuan'      => $req->tujuan,
            'riset'       => $req->riset,
            'judul'       => $req->judul,
            'penanggung_jawab'=> $req->penanggung_jawab,
            'tempat'      => $req->tempat,
            'lama_waktu'  => $req->lama_waktu,
            'tembusan'    => $tembusan,
            'anggota'     => $anggota,
            'file'        => $filename
        ]);

        $user_id       = Auth::user()->id;
        $data          = $datajson;
        $save          = Riset::find($id);
        $save->data    = $data;
        $save->user_id = $user_id;
        $save->save();
        
        $pesan = array(
            'message' => 'Berhasil Di Update', 
            'alert-type' => 'success');
        
        return redirect('/riset')->with($pesan);
            
    }

    public function editriset($id)
    {
        $riset = Riset::where('id',$id)->get();
        $user_id = Auth::user()->id;
        if($user_id != $riset->first()->user_id){
            $pesan = array(
                'message' => 'Riset Itu Bukan milik Anda', 
                'alert-type' => 'error');
                return back()->with($pesan);
        }
        
        $d = $riset->map(function($item){
            $item->datas = json_decode($item->data, true);
            return $item;
        })->first();
        $anggota = implode(", ",$d->datas['anggota']);
        $tembusan = implode(", ",$d->datas['tembusan']);
        
        return view('backend.riset.edit_user',compact('d','anggota','tembusan'));
    }

    public function delriset($id)
    {
        
        $d = Riset::findOrFail($id);
        $user_id = Auth::user()->id;
        
        if($user_id != $d->user_id){
            $pesan = array(
                'message' => 'Riset Itu Bukan milik Anda', 
                'alert-type' => 'error');
                return back()->with($pesan);
        }
        $d->delete();
        $pesan = array(
            'message' => 'Berhasil Di Hapus', 
            'alert-type' => 'success');
        return back()->with($pesan);
    }

    public function viewriset($id)
    {
        $riset = Riset::where('id',$id)->get();
        $d = $riset->map(function($item){
            $item->datas = json_decode($item->data, true);
            return $item;
        })->first();
        return response()->json($d);
    }

    public function risetPDF()
    {
        $export = PDF::loadView('backend.riset.pdf2');
        return $export->download('risetpdf.pdf');
    }

    public function addriset()
    {
        return view('backend.riset.add_user');   
    }

    public function ormas()
    {
        return view('backend.ormas.ormas_user');   
    }

    public function addormas()
    {
        return view('backend.ormas.add_user');   
    }

    public function gantipass()
    {
        return view('backend.gantipass.index');
    }

    public function updatepass(Request $req)
    {
        if($req->password1 == $req->password2)
        {
            $pass = Auth::User();
            $pass->password = bcrypt($req->password1);
            $pass->save();

            $pesan = array(
                'message' => 'Berhasil Di Ubah!', 
                'alert-type' => 'success'
                     );
            return redirect('/gantipass')->with($pesan);
        }
        else
        {
            $pesan = array(
                'message' => 'Password Tidak Sama!', 
                'alert-type' => 'error'
                     );
        }
        return redirect('/gantipass')->with($pesan);
    }

    public function printbiodata()
    {
        return view('backend.riset.printuser');
    }

}
