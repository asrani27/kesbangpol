<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use Carbon\Carbon;
class KegiatanController extends Controller
{
    public function index()
    {
        $map = Kegiatan::all();
        $data = $map->map(function($item){
            $namaHari = Carbon::parse($item->tanggal)->format('D');
            if($namaHari == 'Mon')
            {
                $item->hari = 'Senin';
            }
            elseif($namaHari == 'Tue')
            {
                $item->hari = 'Selasa';
            }
            elseif($namaHari == 'Wed')
            {
                $item->hari = 'Rabu';
            }
            elseif($namaHari == 'Thu')
            {
                $item->hari = 'Kamis';
            }
            elseif($namaHari == 'Fri')
            {
                $item->hari = 'Jumat';
            }
            elseif($namaHari == 'Sat')
            {
                $item->hari = 'Sabtu';
            }
            elseif($namaHari == 'Sun')
            {
                $item->hari = 'Minggu';
            }
            return $item;
        });
        return view('backend.kegiatan.index',compact('data'));
    }
    public function add()
    {
        return view('backend.kegiatan.add');
    }

    public function edit($id)
    {
        $data = Kegiatan::find($id);
        return view('backend.kegiatan.edit',compact('data'));
    }

    public function delete($id)
    {
        $s = Kegiatan::find($id);
        $s->delete();
        $pesan = array(
            'message' => 'Berhasil Di Hapus', 
            'alert-type' => 'success');
        return back()->with($pesan);
    }
    
    public function update(Request $req, $id)
    {
        $tgl = Carbon::createFromFormat('d/m/Y',$req->tanggal)->format('Y-m-d');
        $u = Kegiatan::find($id);
        $u->tanggal    = $tgl;
        $u->jam        = $req->jam;
        $u->kegiatan   = $req->kegiatan;
        $u->tempat     = $req->tempat;
        $u->keterangan = $req->keterangan;
        $u->publish    = $req->publish;
        $u->save();
        $pesan = array(
            'message' => 'Berhasil Di update', 
            'alert-type' => 'success');
        return redirect('/jadwalkegiatan')->with($pesan);

    }

    public function store(Request $req)
    {
        $tgl = Carbon::createFromFormat('d/m/Y',$req->tanggal)->format('Y-m-d');
        $s = new Kegiatan;
        $s->tanggal    = $tgl;
        $s->jam        = $req->jam;
        $s->kegiatan   = $req->kegiatan;
        $s->tempat     = $req->tempat;
        $s->keterangan = $req->keterangan;
        $s->save();

        $pesan = array(
            'message' => 'Berhasil Di Simpan', 
            'alert-type' => 'success');
        return redirect('/jadwalkegiatan')->with($pesan);

    }
}
