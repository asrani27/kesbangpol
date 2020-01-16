<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Background;

class BackgroundController extends Controller
{
    public function index()
    {
    	$image = Background::first()->background;
    	return view('backend.background',compact('image'));
    }

    public function update(Request $req)
    { 
    	if($req->hasFile('file'))
        {
            $filename = $req->file->getClientOriginalName();
            $filename = date('d-m-Y-').rand(1,9999).$filename;
            $req->file->storeAs('/public/background',$filename);

            $b = background::first();
            $b->background = $filename;
            $b->save();
    	}
        return redirect('background');
    }
}
