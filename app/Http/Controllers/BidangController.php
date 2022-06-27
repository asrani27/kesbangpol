<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Bidang;
use App\Kegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidangController extends Controller
{

    public function index()
    {
        $data = Bidang::all();
        return view('backend.bidang.index', compact('data'));
    }

    public function kegiatan()
    {
        $data = Kegiatan::where('bidang_id', Auth::user()->bidang->id)->orderBy('id', 'DESC')->get();

        $data->map(function ($item) {
            $namaHari = Carbon::parse($item->tanggal)->format('D');
            if ($namaHari == 'Mon') {
                $item->hari = 'Senin';
            } elseif ($namaHari == 'Tue') {
                $item->hari = 'Selasa';
            } elseif ($namaHari == 'Wed') {
                $item->hari = 'Rabu';
            } elseif ($namaHari == 'Thu') {
                $item->hari = 'Kamis';
            } elseif ($namaHari == 'Fri') {
                $item->hari = 'Jumat';
            } elseif ($namaHari == 'Sat') {
                $item->hari = 'Sabtu';
            } elseif ($namaHari == 'Sun') {
                $item->hari = 'Minggu';
            }
            return $item;
        });
        return view('bidang.kegiatan.index', compact('data'));
    }

    public function kegiatanadd()
    {
        return view('bidang.kegiatan.add');
    }

    public function kegiatanstore(Request $req)
    {
        $tgl = Carbon::createFromFormat('d/m/Y', $req->tanggal)->format('Y-m-d');
        $s = new Kegiatan;
        $s->tanggal    = $tgl;
        $s->jam        = $req->jam;
        $s->kegiatan   = $req->kegiatan;
        $s->tempat     = $req->tempat;
        $s->keterangan = $req->keterangan;
        $s->bidang_id = Auth::user()->bidang->id;
        $s->save();

        $pesan = array(
            'message' => 'Berhasil Di Simpan',
            'alert-type' => 'success'
        );
        return redirect('/bidang/kegiatan')->with($pesan);
    }

    public function kegiatanedit($id)
    {
        $bidang_id = Auth::user()->bidang->id;
        $data = Kegiatan::find($id);
        if ($bidang_id != $data->bidang_id) {
            $pesan = array(
                'message' => 'Tidak bisa di edit, bukan kegiatan bidang anda',
                'alert-type' => 'error'
            );
            return back()->with($pesan);
        }
        return view('bidang.kegiatan.edit', compact('data'));
    }

    public function kegiatanupdate(Request $req, $id)
    {
        $tgl = Carbon::createFromFormat('d/m/Y', $req->tanggal)->format('Y-m-d');
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
            'alert-type' => 'success'
        );
        return redirect('/bidang/kegiatan')->with($pesan);
    }

    public function kegiatandelete($id)
    {
        $bidang_id = Auth::user()->bidang->id;
        $s = Kegiatan::find($id);
        if ($bidang_id != $s->bidang_id) {
            $pesan = array(
                'message' => 'Tidak bisa di hapus, bukan kegiatan bidang anda',
                'alert-type' => 'error'
            );
            return back()->with($pesan);
        }
        $s->delete();
        $pesan = array(
            'message' => 'Berhasil Di Hapus',
            'alert-type' => 'success'
        );
        return back()->with($pesan);
    }

    public function akun($id)
    {
        $data = Bidang::find($id);

        //create user
        $n = new User;
        $n->name = $data->nama;
        $n->username = 'bidang' . $data->id;
        $n->password = bcrypt('bidangkesbangpol');
        $n->save();

        $data->update([
            'user_id' => $n->id,
        ]);

        $roleUser = Role::where('name', 'bidang')->first();
        $n->attachRole($roleUser);
        $pesan = array(
            'message' => 'Password : bidangkesbangpol',
            'alert-type' => 'success'
        );
        return back()->with($pesan);
    }

    public function reset($id)
    {
        $data = Bidang::find($id);

        $data->user->update([
            'password' => bcrypt('bidangkesbangpol'),
        ]);


        $pesan = array(
            'message' => 'Password : bidangkesbangpol',
            'alert-type' => 'success'
        );
        return back()->with($pesan);
    }

    public function gantipass()
    {
        return view('backend.gantipass.index');
    }

    public function updatepass(Request $req)
    {
        if ($req->password1 == $req->password2) {
            $pass = Auth::User();
            $pass->password = bcrypt($req->password1);
            $pass->save();

            $pesan = array(
                'message' => 'Berhasil Di Ubah!, Login Dengan Password Baru',
                'alert-type' => 'success'
            );
            Auth::logout();
            return redirect('/')->with($pesan);
        } else {
            $pesan = array(
                'message' => 'Password Tidak Sama!',
                'alert-type' => 'error'
            );
        }
        return redirect('/gantipass')->with($pesan);
    }
}
