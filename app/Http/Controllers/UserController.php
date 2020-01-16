<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Riset;
use PDF;
use Image;

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
