<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Role;
use App\Riset;
use App\Ormas;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $totalRiset = count(Riset::all());
            $totalOrmas = count(Ormas::all());
            $totalUser = count(User::all());
            return view('backend.dashboard_admin', compact('totalRiset', 'totalOrmas', 'totalUser'));
        } elseif (Auth::user()->hasRole('bidang')) {

            return view('backend.dashboard_bidang');
        } else {
            $countRiset = Auth::user()->riset->count();
            return view('backend.dashboard_user', compact('countRiset'));
        }
    }

    public function role()
    {
        $data = Role::all();
        return response()->json($data);
    }
}
