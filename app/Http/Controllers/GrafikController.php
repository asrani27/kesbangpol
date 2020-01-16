<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grafik;
use App\DataGrafik;

class GrafikController extends Controller
{
    public function index()
    {
        $data = Grafik::all();
        return view('backend.grafik.index',compact('data'));
    }

    public function add()
    {
        return view('backend.grafik.add');
    }

    public function store(Request $req)
    {
        $s = new Grafik;
        $s->judul = $req->judul;
        $s->save();
        $pesan = array(
            'message' => 'Berhasil Di Simpan', 
            'alert-type' => 'success');
        return redirect('/grafikadmin')->with($pesan);
    }

    public function update(Request $req, $id)
    {
        $s = Grafik::find($id);
        $s->judul = $req->judul;
        $s->save();
        $pesan = array(
            'message' => 'Berhasil Di Update', 
            'alert-type' => 'success');
        return redirect('/grafikadmin')->with($pesan);
    }
    
    public function delete($id)
    {
        $d = Grafik::find($id);
        $d->delete();
        $pesan = array(
            'message' => 'Berhasil Di Hapus', 
            'alert-type' => 'success');
        return back()->with($pesan);
    }
    public function deletedatagrafik($id)
    {
        $d = DataGrafik::find($id);
        $d->delete();
        $pesan = array(
            'message' => 'Berhasil Di Hapus', 
            'alert-type' => 'success');
        return back()->with($pesan);
    }
    public function edit($id)
    {
        $data = Grafik::find($id);
        return view('backend.grafik.edit',compact('data'));
    }

    public function data($id)
    {
        $data = Grafik::find($id);
        return view('backend.grafik.datagrafik',compact('data'));
    }

    public function aktifkan($id)
    {
        $cek = Grafik::where('aktif','Y')->first();
        if($cek == null)
        {
            $d = Grafik::find($id);
            $d->aktif = 'Y';
            $d->save();
            $pesan = array(
                'message' => 'Berhasil Di Aktifkan', 
                'alert-type' => 'success');
            return redirect('/grafikadmin')->with($pesan);
        }
        else {
            $cek = Grafik::where('aktif', 'Y')->first();
            $cek->aktif = 'T';
            $cek->save();
            
            $d = Grafik::find($id);
            $d->aktif = 'Y';
            $d->save();
            $pesan = array(
                'message' => 'Berhasil Di Aktifkan', 
                'alert-type' => 'success');
            return redirect('/grafikadmin')->with($pesan);
        }
    }
    
    public function storedatagrafik(Request $req)
    {
        //dd($req->all());
        if($req->warna == 'merah')
        {
            $bgcolor = 'rgba(255, 99, 132, 0.2)';
            $bordercolor = 'rgba(255,99,132,1)';
        }
        elseif($req->warna == 'biru')
        {
            $bgcolor = 'rgba(54, 162, 235, 0.2)';
            $bordercolor = 'rgba(54, 162, 235, 1)';
        }
        elseif($req->warna == 'kuning')
        {
            $bgcolor = 'rgba(255, 206, 86, 0.2)';
            $bordercolor = 'rgba(255, 206, 86, 1)';
        }
        elseif($req->warna == 'hijau')
        {
            $bgcolor = 'rgba(75, 192, 192, 0.2)';
            $bordercolor = 'rgba(75, 192, 192, 1)';
        }
        elseif($req->warna == 'ungu')
        {
            $bgcolor = 'rgba(153, 102, 255, 0.2)';
            $bordercolor = 'rgba(153, 102, 255, 1)';
        }
        else
        {
            $bgcolor = 'rgba(255, 159, 64, 0.2)';
            $bordercolor = 'rgba(255, 159, 64, 1)';
        }
        $s = new DataGrafik;
        $s->label = $req->label;
        $s->value = $req->value;
        $s->warna = $req->warna;
        $s->bgcolor = $bgcolor;
        $s->bordercolor = $bordercolor;
        $s->grafik_id = $req->grafik_id;
        $s->save();
        $pesan = array(
            'message' => 'Berhasil Di Simpan', 
            'alert-type' => 'success');
        return back()->with($pesan);
    }
    public function updatedatagrafik(Request $req)
    {
        //dd($req->all());
        if($req->warna == 'merah')
        {
            $bgcolor = 'rgba(255, 99, 132, 0.2)';
            $bordercolor = 'rgba(255,99,132,1)';
        }
        elseif($req->warna == 'biru')
        {
            $bgcolor = 'rgba(54, 162, 235, 0.2)';
            $bordercolor = 'rgba(54, 162, 235, 1)';
        }
        elseif($req->warna == 'kuning')
        {
            $bgcolor = 'rgba(255, 206, 86, 0.2)';
            $bordercolor = 'rgba(255, 206, 86, 1)';
        }
        elseif($req->warna == 'hijau')
        {
            $bgcolor = 'rgba(75, 192, 192, 0.2)';
            $bordercolor = 'rgba(75, 192, 192, 1)';
        }
        elseif($req->warna == 'ungu')
        {
            $bgcolor = 'rgba(153, 102, 255, 0.2)';
            $bordercolor = 'rgba(153, 102, 255, 1)';
        }
        else
        {
            $bgcolor = 'rgba(255, 159, 64, 0.2)';
            $bordercolor = 'rgba(255, 159, 64, 1)';
        }
        $s = DataGrafik::where('id', $req->idedit)->first();
        $s->label = $req->label;
        $s->value = $req->value;
        $s->warna = $req->warna;
        $s->bgcolor = $bgcolor;
        $s->bordercolor = $bordercolor;
        $s->save();
        $pesan = array(
            'message' => 'Berhasil Di Update', 
            'alert-type' => 'success');
        return back()->with($pesan);
    }
}
