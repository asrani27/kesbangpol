<?php

namespace App\Http\Controllers;

use Auth;
use App\Ormas;
use Validator;
use App\Galery;
use App\Grafik;
use App\Kontak;
use App\Profil;
use App\Artikel;
use App\Beranda;
use App\Dokumen;
use App\Layanan;
use App\Kategori;
use App\Kegiatan;
use Carbon\Carbon;
use App\Background;
use App\DataGrafik;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/home');
        }

        $kegiatan = Kegiatan::orderBy('id', 'DESC')->get();
        $dokumen = Dokumen::orderBy('id', 'DESC')->get();
        $artikel = Artikel::orderBy('id', 'DESC')->get();
        $orma = Ormas::all();
        $ormas = $orma->map(function ($item) {
            $item->datas = json_decode($item->data, true);
            return $item->datas;
        });

        return view('desain1', compact('kegiatan', 'ormas', 'artikel', 'dokumen'));
    }

    public function login1()
    {
        return view('desain1.login');
    }

    public function desain2()
    {
        return view('desain2');
    }

    public function upload()
    {
        return view('upload_file');
    }
    public function uploadstore(Request $request)
    {
        //dd($request->all());
        $rules = array(
            'file'  => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $image = $request->file('file');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        //dd($new_name, $image->getClientOriginalExtension());
        $request->file->storeAs('/public/images', $new_name);


        $output = array(
            'success' => 'Image uploaded successfully',
            'image'  => '<img src="/storage/images/' . $new_name . '" class="img-thumbnail" />'
        );

        return response()->json($output);
    }
    public function index2()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        $data = Beranda::first();
        $image = Background::first()->background;
        $cek = Grafik::where('aktif', 'Y')->first();
        $kegg = Kegiatan::where('publish', 'Y')->get();
        $keg = $kegg->map(function ($item) {
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

        if ($cek == null) {
            $judulchart = 'Grafik Tidak Ada Yg Aktif';
        } else {
            $judulchart = $cek->judul;
        }
        //dd($chart);
        //dd($data, $image);
        return view('color.home', compact('data', 'image', 'judulchart', 'keg'));
    }

    public function chartdata()
    {
        $cek = Grafik::where('aktif', 'Y')->first();
        if ($cek == null) {
            $label = null;
            $data = null;
            $bgcolor = null;
            $bodercolor = null;
        } else {
            $label = $cek->datagrafik->map(function ($item) {
                return $item->label . ' (' . $item->value . '%)';
            });
            $data  = $cek->datagrafik->map(function ($item) {
                return $item->value;
            });
            $bgcolor = $cek->datagrafik->map(function ($item) {
                return $item->bgcolor;
            });

            $bordercolor = $cek->datagrafik->map(function ($item) {
                return $item->bordercolor;
            });
        }
        return response()->json([$label, $data, $bgcolor, $bordercolor]);
    }

    public function layanan()
    {
        $data = Layanan::where('publish', 'Ya')->get();
        return view('color.layanan', compact('data'));
    }

    public function profil()
    {
        $data = Profil::first();
        return view('color.profil', compact('data'));
    }

    public function kontak()
    {
        $kontak = Kontak::where('id', 1)->get();

        $data = $kontak->map(function ($item) {
            $item->datas = json_decode($item->data, true);
            return $item;
        })->first();
        return view('color.kontak', compact('data'));
    }

    public function ormas()
    {
        $ormas = Ormas::all();
        $d = $ormas->map(function ($item) {
            $item->datas = json_decode($item->data, true);
            return $item;
        });
        return view('color.ormas', compact('d'));
    }

    public function riset()
    {
        return view('color.riset');
    }

    public function galery($id)
    {
        $data = Galery::where('ormas_id', $id)->get();
        $ormas = $data->first();
        if ($ormas == null) {
            $namaOrmas = '';
        } else {
            $namaOrmas = json_decode($ormas->first()->ormas->data)->nama;
        }

        return view('color.galery', compact('data', 'namaOrmas'));
    }

    public function artikel()
    {
        $data = Artikel::orderBy('created_at', 'desc')->paginate(5);
        return view('color.artikel', compact('data'));
    }

    public function detailartikel($id)
    {
        $data = Artikel::where('id', $id)->get();
        return view('color.detailartikel', compact('data'));
    }

    public function chart()
    {
        return view('color.chart');
    }

    public function kategori($id)
    {
        $kat = Kategori::find($id);
        $data = $kat->dokumen;
        return view('color.dokumen', compact('data', 'kat'));
    }
}
