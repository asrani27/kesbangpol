<?php

namespace App\Http\Controllers;

use App\User;
use App\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{

    public function index()
    {
        $data = Bidang::all();
        return view('backend.bidang.index', compact('data'));
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
}
