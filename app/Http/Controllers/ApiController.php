<?php

namespace App\Http\Controllers;

use App\User2;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function user()
    {
        $data = User2::get();
        return response([
            'status' => 'ok',
            'message' => 'Data Ditemukan',
            'data' => $data
        ],200);
    }

    public function dataUser($id)
    {
        $data = User2::find($id);
        if($data != null){
            return response([
                'status' => 'ok',
                'message' => 'Data Ditemukan',
                'data' => $data
            ],200);
        }else{
            return response([
                'status' => 'not found',
                'message' => 'data tidak ditemuka'
            ],200);
        }
    }
    public function insertUser(Request $req)
    {
        $checkMail = User2::where('email', $req->email)->first();
        if($checkMail == null){
            $insert = new User2;
            $insert->name = $req->name;
            $insert->email = $req->email;
            $insert->password = bcrypt($req->password);
            $insert->save();
            
            return response([
                'status' => 'ok',
                'message' => 'berhasil disimpan',
                'data' => $insert
            ],200);
        }else{
            return response([
                'status' => 'fail',
                'message' => 'email sudah ada, gunakan email lain'
            ],200);
        }
    }
    
    public function updateUser(Request $req, $id)
    {
        $insert = User2::find($id);
        if($insert != null){
            $insert->name = $req->name;
            $insert->email = $req->email;
            if($req->password != null){
                $insert->password = bcrypt($req->password);
            }
            $insert->save();
            
            return response([
                'status' => 'ok',
                'message' => 'berhasil diupdate',
                'data' => $insert
            ],200);
        }else{
            return response([
                'status' => 'not found',
                'message' => 'data tidak ditemukan'
            ],200);

        }
    }
    public function deleteUser($id)
    {
        $delete = User2::find($id);
        if($delete != null){
            $delete->delete();
            
            return response([
                'status' => 'ok',
                'message' => 'data berhasil dihapus',
                'data' => $delete
            ],200);
        }else{
            return response([
                'status' => 'not found',
                'message' => 'data tidak ditemukan'
            ],200);
        }
    }
}
