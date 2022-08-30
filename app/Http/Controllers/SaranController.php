<?php

namespace App\Http\Controllers;

use App\Saran;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    public function index()
    {
        $data = Saran::orderBy('id', 'DESC')->get();
        return view('backend.saran.index', compact('data'));
    }

    public function qrcode()
    {
        return view('backend.saran.qrcode');
    }
}
