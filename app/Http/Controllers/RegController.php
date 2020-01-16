<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use App\User;

class RegController extends Controller
{
    use RegistersUsers;

    protected function daftar(Request $req)
    {
        $roleUser = Role::where('name','user')->first();
        
        $e = User::where('email', $req->email)->first();
        if($e == null)
        {
            if($req->password == $req->password_confirmation)
            {
                $d = new User;
                $d->name = $req->name;
                $d->email = $req->email;
                $d->password = bcrypt($req->password);
                $d->save();
                $d->roles()->attach($roleUser);  
                
                $pesan = array(
                    'message' => 'Berhasil Daftar, Silahkan Login', 
                    'alert-type' => 'success');
                return back()->with($pesan);     
            }
            else {
                $pesan = array(
                    'message' => 'Password Confirm Tidak Sama', 
                    'alert-type' => 'warning');
                return back()->with($pesan);   
            }    
        }
        else {
            $pesan = array(
                'message' => 'E-mail Sudah Terdaftar, Silahkan Login Dengan Email Yang Ada', 
                'alert-type' => 'error');
            return back()->with($pesan);
        }
    }

    public function cekmail(Request $req)
    {
        $d = User::where('email', $req->email)->first();
        if($d == null)
        {
            return response()->json(0);
        }
        else {
            return response()->json(1);
        }
    }
}
