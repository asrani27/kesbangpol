<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Role;
use App\Riset;
use App\Ormas;
use DataTables;
use App\Repositories\DataRepo;
use Carbon\Carbon;
use App\Profil;
use App\Kontak;
use App\Layanan;
use App\Pejabat;
use App\Beranda;
use PDF;
use PHPUnit\Util\Json;
use Storage;

class AdminController extends Controller
{

    public function sync()
    {
        $data = Riset::get()->map(function ($item) {
            $item->nama = json_decode($item->data)->nama;
            $item->save();
            return $item;
        });
        $pesan = array(
            'message' => 'Berhasil Di sync',
            'alert-type' => 'success'
        );
        return back()->with($pesan);
    }
    public function cari_riset()
    {
        $search = request()->get('search');

        $data = Riset::where('nama', 'LIKE', '%' . $search . '%')->orderBy('id', 'DESC')->paginate(10);
        request()->flash();
        return view('backend.riset.riset_admin2', compact('data'));
    }
    public function riset2()
    {
        $data = Riset::orderBy('id', 'DESC')->paginate(10);

        return view('backend.riset.riset_admin2', compact('data'));
    }

    public function diproses()
    {
        $data = Riset::orderBy('id', 'DESC')->where('status', 'pending')->paginate(10);

        return view('backend.riset.riset_admin2', compact('data'));
    }

    public function diterima()
    {
        $data = Riset::orderBy('id', 'DESC')->where('status', 'pending')->paginate(10);

        return view('backend.riset.riset_admin2', compact('data'));
    }
    public function riset()
    {
        return view('backend.riset.riset_admin');
    }

    public function getRiset()
    {
        $d = new DataRepo;
        return $d->riset();
    }

    public function getRisetProses()
    {
        $d = new DataRepo;
        return $d->proses();
    }

    public function getRisetTerima()
    {
        $d = new DataRepo;
        return $d->terima();
    }

    public function getRisetRevisi()
    {
        $d = new DataRepo;
        return $d->revisi();
    }

    public function getRisetTolak()
    {
        $d = new DataRepo;
        return $d->tolak();
    }

    public function viewriset($id)
    {
        $riset = Riset::where('id', $id)->get();
        $d = $riset->map(function ($item) {
            $item->datas = json_decode($item->data, true);
            return $item;
        })->first();
        return response()->json($d);
    }

    public function editriset($id)
    {
        $riset = Riset::where('id', $id)->get();
        $d = $riset->map(function ($item) {
            $item->datas = json_decode($item->data, true);
            return $item;
        })->first();

        $anggota = implode(", ", $d->datas['anggota']);
        $tembusan = implode(", ", $d->datas['tembusan']);

        return view('backend.riset.edit_admin', compact('d', 'anggota', 'tembusan'));
    }

    public function delriset($id)
    {
        $d = Riset::findOrFail($id);
        $d->delete();
        $pesan = array(
            'message' => 'Berhasil Di Hapus',
            'alert-type' => 'success'
        );
        return back()->with($pesan);
    }

    public function updatestatusriset(Request $req)
    {
        $u = Riset::find($req->iddata);
        $u->status = $req->status;
        $u->keterangan = $req->keterangan;
        $u->save();

        $pesan = array(
            'message' => 'Status Berhasil Di Ubah',
            'alert-type' => 'success'
        );

        return redirect('/riset_admin')->with($pesan);
    }

    public function updateriset(Request $req, $id)
    {
        $tembusan = array_map('trim', array_filter(explode(',', $req->tembusan)));
        $anggota  = array_map('trim', array_filter(explode(',', $req->anggota)));

        if ($req->hasFile('file')) {
            $filename = $req->file->getClientOriginalName();
            $filename = date('d-m-Y-') . rand(1, 9999) . $filename;
            $req->file->storeAs('/public', $filename);
        } else {
            $file     = Riset::find($id);
            $filename = json_decode($file->data)->file;
        }

        $datajson  = json_encode([
            'universitas' => $req->universitas,
            'no_surat'    => $req->no_surat,
            'tgl_surat'   => $req->tgl_surat,
            'nama'        => $req->nama,
            'nik'         => $req->nik,
            'alamat'      => $req->alamat,
            'no_hp'       => $req->no_hp,
            'pekerjaan'   => $req->pekerjaan,
            'jurusan'     => $req->jurusan,
            'tujuan'      => $req->tujuan,
            'riset'       => $req->riset,
            'judul'       => $req->judul,
            'penanggung_jawab' => $req->penanggung_jawab,
            'tempat'      => $req->tempat,
            'lama_waktu'  => $req->lama_waktu,
            'tembusan'    => $tembusan,
            'anggota'     => $anggota,
            'file'        => $filename
        ]);

        $data          = $datajson;
        $save          = Riset::find($id);
        $save->data    = $data;
        $save->save();

        $pesan = array(
            'message' => 'Berhasil Di Update',
            'alert-type' => 'success'
        );

        return redirect('/riset_admin')->with($pesan);
    }

    public function account()
    {
        $data = User::all();
        $role = Role::all();
        return view('backend.account.index', compact('data', 'role'));
    }

    public function saveaccount(Request $req)
    {
        $cek = User::where('email', $req->email)->first();
        $cekusername = User::where('username', $req->username)->first();
        $roleUser = Role::where('id', $req->role)->first();
        if ($cek == null) {
            if ($cekusername == null) {
                $s = new User;
                $s->name = $req->name;
                $s->email = $req->email;
                $s->username = $req->username;
                $s->password = bcrypt($req->password);
                $s->save();
                $s->attachRole($roleUser);

                $pesan = array(
                    'message' => 'Berhasil Di Simpan',
                    'alert-type' => 'success'
                );
            } else {
                $pesan = array(
                    'message' => 'Telp Sudah Ada',
                    'alert-type' => 'error'
                );
                return back()->with($pesan);
            }
        } else {
            $pesan = array(
                'message' => 'Email Sudah Ada',
                'alert-type' => 'error'
            );
        }
        return back()->with($pesan);
    }

    public function delaccount($id)
    {
        if ($id == Auth::user()->id) {
            $pesan = array(
                'message' => 'Tidak Bisa Di Hapus, User Sedang Login',
                'alert-type' => 'error'
            );
        } else {
            $d = User::find($id);
            $d->delete();

            $pesan = array(
                'message' => 'Berhasil Di Hapus',
                'alert-type' => 'success'
            );
        }

        return back()->with($pesan);
    }

    public function editaccount(Request $req)
    {
        $d = User::find($req->idedit);
        $cekusername = User::where('username', $req->username)->first();
        $roleUser = Role::where('id', $req->role)->first();

        if ($cekusername == null) {
            if ($req->password == null) {
                $d->name = $req->name;
                $d->email = $req->email;
                $d->username = $req->username;
                $d->save();
                $d->roles()->sync([$roleUser->id]);
            } else {
                $d->name = $req->name;
                $d->email = $req->email;
                $d->username = $req->username;
                $d->password = bcrypt($req->password);
                $d->save();
                $d->roles()->sync([$roleUser->id]);
            }
            $pesan = array(
                'message' => 'Berhasil Di Update',
                'alert-type' => 'success'
            );

            return back()->with($pesan);
        } else {
            if ($cekusername->username == $d->username) {
                if ($req->password == null) {
                    $d->name = $req->name;
                    $d->email = $req->email;
                    $d->username = $req->username;
                    $d->save();
                    $d->roles()->sync([$roleUser->id]);
                } else {
                    $d->name = $req->name;
                    $d->email = $req->email;
                    $d->username = $req->username;
                    $d->password = bcrypt($req->password);
                    $d->save();
                    $d->roles()->sync([$roleUser->id]);
                }
                $pesan = array(
                    'message' => 'Berhasil Di Update',
                    'alert-type' => 'success'
                );

                return back()->with($pesan);
            } else {

                $pesan = array(
                    'message' => 'Telp Sudah Ada',
                    'alert-type' => 'error'
                );

                return back()->with($pesan);
            }
        }
    }

    public function ormas()
    {
        $ormas = Ormas::all();
        $d = $ormas->map(function ($item) {
            $item->datas = json_decode($item->data, true);
            return $item;
        });
        return view('backend.ormas.ormas_admin', compact('d'));
    }

    public function addormas()
    {
        return view('backend.ormas.add_admin');
    }

    public function saveormas(Request $req)
    {
        $tglmulai = $req->mulai;
        $explode = explode('/', $tglmulai);
        $day = $explode[0];
        $month = $explode[1];
        $year = $explode[2];
        $extglmulai = ($year . "-" . $month . "-" . $day);
        $carbontgl = Carbon::parse($extglmulai)->addYears($req->masa_berlaku)->format('Y-m-d');

        $data  = json_encode([
            'nama' => $req->nama,
            'mulai' => $extglmulai,
            'masa_berlaku' => $req->masa_berlaku,
            'sampai' => $carbontgl,
            'dasar_hukum' => $req->dasar_hukum,
            'bidang' => $req->bidang,
            'status' => $req->status,
            'keterangan' => $req->keterangan
        ]);

        $save          = new Ormas;
        $save->data    = $data;
        $save->save();

        $pesan = array(
            'message' => 'Berhasil Di Simpan',
            'alert-type' => 'success'
        );

        return redirect('/ormas_admin')->with($pesan);
    }

    public function deleteormas($id)
    {
        $d = Ormas::find($id);
        $d->delete();

        $pesan = array(
            'message' => 'Berhasil Di Hapus',
            'alert-type' => 'success'
        );

        return back()->with($pesan);
    }

    public function editormas($id)
    {
        $ormas = Ormas::where('id', $id)->get();
        $data = $ormas->map(function ($item) {
            $item->datas = json_decode($item->data, true);
            return $item;
        })->first();
        //dd($data);
        return view('backend.ormas.edit_admin', compact('data'));
    }

    public function updateormas(Request $req, $id)
    {

        $tglmulai = $req->mulai;
        $explode = explode('/', $tglmulai);
        $day = $explode[0];
        $month = $explode[1];
        $year = $explode[2];
        $extglmulai = ($year . "-" . $month . "-" . $day);
        $carbontgl = Carbon::parse($extglmulai)->addYears($req->masa_berlaku)->format('Y-m-d');

        $data  = json_encode([
            'nama'         => $req->nama,
            'mulai'        => $extglmulai,
            'masa_berlaku' => $req->masa_berlaku,
            'sampai'       => $carbontgl,
            'dasar_hukum'  => $req->dasar_hukum,
            'bidang'       => $req->bidang,
            'status'       => $req->status,
            'keterangan'   => $req->keterangan
        ]);
        $save          = Ormas::find($id);
        $save->data    = $data;
        $save->save();

        $pesan = array(
            'message' => 'Berhasil Di Update',
            'alert-type' => 'success'
        );

        return redirect('/ormas_admin')->with($pesan);
    }

    public function profil()
    {
        $data = Profil::first();
        return view('backend.profil', compact('data'));
    }

    public function updateprofil(Request $req, $id)
    {
        $badartikel = $req->isi;
        $artikel = str_replace('Â', '', $badartikel);

        $dom = new \DomDocument();

        $dom->loadHtml($artikel);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $k => $img) {

            $data = $img->getAttribute('src');

            if (strlen($data) < 50) {
            } else {
                preg_match("/data:image\/(.*?);/", $data, $image_extension); // extract the image extension
                $data = preg_replace('/data:image\/(.*?);base64,/', '', $data); // remove the type part
                $data = str_replace(' ', '+', $data);

                $data = base64_decode($data);

                $image_name = time() . $k . '.png';

                Storage::put('/public/artikel/' . $image_name, $data);

                $img->removeAttribute('src');

                $img->setAttribute('src', '/storage/artikel/' . $image_name);
            }
        }

        $detail = $dom->saveHTML();
        $detailClear = str_replace('&Acirc;', '', $detail);

        $data = Profil::find($id);
        $data->judul = $req->judul;
        $data->isi = $detailClear;
        $data->save();
        $pesan = array(
            'message' => 'Profil Berhasil Di Update',
            'alert-type' => 'success'
        );
        return back()->with($pesan);
    }

    public function layanan()
    {
        $data = Layanan::all();
        return view('backend.layanan', compact('data'));
    }

    public function addlayanan()
    {
        return view('backend.addlayanan');
    }

    public function editlayanan($id)
    {
        $data = Layanan::find($id);
        return view('backend.editlayanan', compact('data'));
    }

    public function deletelayanan($id)
    {
        $d = Layanan::find($id);
        $d->delete();
        $pesan = array(
            'message' => 'Layanan Berhasil Di Hapus',
            'alert-type' => 'success'
        );
        return back()->with($pesan);
    }

    public function savelayanan(Request $req)
    {
        $badartikel = $req->isi;
        $artikel = str_replace('Â', '', $badartikel);

        $dom = new \DomDocument();

        $dom->loadHtml($artikel);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $k => $img) {

            $data = $img->getAttribute('src');

            if (strlen($data) < 50) {
            } else {
                preg_match("/data:image\/(.*?);/", $data, $image_extension); // extract the image extension
                $data = preg_replace('/data:image\/(.*?);base64,/', '', $data); // remove the type part
                $data = str_replace(' ', '+', $data);

                $data = base64_decode($data);

                $image_name = time() . $k . '.png';

                Storage::put('/public/artikel/' . $image_name, $data);

                $img->removeAttribute('src');

                $img->setAttribute('src', '/storage/artikel/' . $image_name);
            }
        }

        $detail = $dom->saveHTML();
        $detailClear = str_replace('&Acirc;', '', $detail);

        $s = new Layanan;
        $s->nama = $req->nama;
        $s->publish = $req->publish;
        $s->isi = $detailClear;
        $s->save();

        $pesan = array(
            'message' => 'Layanan Berhasil Di Simpan',
            'alert-type' => 'success'
        );
        return redirect('layanan_admin')->with($pesan);
    }

    public function updatelayanan(Request $req, $id)
    {
        $badartikel = $req->isi;
        $artikel = str_replace('Â', '', $badartikel);

        $dom = new \DomDocument();

        $dom->loadHtml($artikel);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $k => $img) {

            $data = $img->getAttribute('src');

            if (strlen($data) < 50) {
            } else {
                preg_match("/data:image\/(.*?);/", $data, $image_extension); // extract the image extension
                $data = preg_replace('/data:image\/(.*?);base64,/', '', $data); // remove the type part
                $data = str_replace(' ', '+', $data);

                $data = base64_decode($data);

                $image_name = time() . $k . '.png';

                Storage::put('/public/artikel/' . $image_name, $data);

                $img->removeAttribute('src');

                $img->setAttribute('src', '/storage/artikel/' . $image_name);
            }
        }

        $detail = $dom->saveHTML();
        $detailClear = str_replace('&Acirc;', '', $detail);

        $s = Layanan::find($id);
        $s->nama = $req->nama;
        $s->publish = $req->publish;
        $s->isi = $detailClear;
        $s->save();

        $pesan = array(
            'message' => 'Layanan Berhasil Di Update',
            'alert-type' => 'success'
        );
        return redirect('layanan_admin')->with($pesan);
    }

    public function kontak()
    {
        $kontak = Kontak::where('id', 1)->get();

        $data = $kontak->map(function ($item) {
            $item->datas = json_decode($item->data, true);
            return $item;
        })->first();
        return view('backend.kontak', compact('data'));
    }

    public function updatekontak(Request $req, $id)
    {
        $data  = json_encode($req->all());
        $kontak = Kontak::find($id);
        $kontak->data = $data;
        $kontak->save();

        $pesan = array(
            'message' => 'Kontak Berhasil Di Update',
            'alert-type' => 'success'
        );
        return back()->with($pesan);
    }

    public function risetPDF($id)
    {
        // $e = PDF::loadView('testing');
        // return $e->download('risetpdf'.date("Y-m-d-H:m:s").'.pdf');

        $data = Pejabat::where('status', 'Y')->first();
        if ($data == null) {
            $pesan = array(
                'message' => 'Pilih Pejabat TTD Terlebih Dahulu',
                'alert-type' => 'error'
            );
            return back()->with($pesan);
        } else {
            $data = Pejabat::where('status', 'Y')->get();
            $map = $data->map(function ($item) {
                $item->data = json_decode($item->data);
                return $item;
            })->first();

            $riset = Riset::where('id', $id)->get();
            $dt = $riset->map(function ($item) {
                $item->data = json_decode($item->data);
                return $item;
            })->first();
        }
        $random = Carbon::now()->format('d-m-Y-h:i:s');
        //dd('test');
        //return view('backend.riset.printdata',compact('map','dt'));

        ob_end_clean();
        $export = PDF::loadView('backend.riset.printdata', compact('map', 'dt'))->setPaper('legal', 'portrait');
        return $export->download('risetpdf' . date("Y-m-d-H:m:s") . '.pdf');
        //array(0,0,609.4488,880.433)git add

    }

    public function pejabat()
    {
        $pejabat = Pejabat::all();
        $p = $pejabat->map(function ($item) {
            $item->data = json_decode($item->data, true);
            return $item;
        });
        //dd($p);
        return view('backend.pejabat.index', compact('p'));
    }

    public function addpejabat()
    {
        return view('backend.pejabat.add');
    }

    public function editpejabat($id)
    {
        $pejabat = Pejabat::where('id', (int)$id)->get();
        $data = $pejabat->map(function ($item) {
            $item->data = json_decode($item->data, true);
            return $item;
        })->first();
        return view('backend.pejabat.edit', compact('data'));
    }

    public function storepejabat(Request $req)
    {
        $data  = json_encode($req->except('_token'));

        $save          = new Pejabat;
        $save->data    = $data;
        $save->status  = 'T';
        $save->save();

        $pesan = array(
            'message' => 'Berhasil Di Simpan',
            'alert-type' => 'success'
        );
        return redirect('/pejabat')->with($pesan);
    }

    public function updatepejabat(Request $req, $id)
    {
        $data  = json_encode($req->except('_token'));

        $save          = Pejabat::find($id);
        $save->data    = $data;
        $save->save();

        $pesan = array(
            'message' => 'Berhasil Di Update',
            'alert-type' => 'success'
        );
        return redirect('/pejabat')->with($pesan);
    }

    public function aktifpejabat($id)
    {
        $cek = Pejabat::where('status', 'Y')->first();
        if ($cek == null) {
            $d = Pejabat::find($id);
            $d->status = 'Y';
            $d->save();
            $pesan = array(
                'message' => 'Pejabat TTD Berhasil Di Aktifkan',
                'alert-type' => 'success'
            );
            return redirect('/pejabat')->with($pesan);
        } else {
            $cek = Pejabat::where('status', 'Y')->first();
            $cek->status = 'T';
            $cek->save();

            $d = Pejabat::find($id);
            $d->status = 'Y';
            $d->save();
            $pesan = array(
                'message' => 'Pejabat TTD Berhasil Di Aktifkan',
                'alert-type' => 'success'
            );
            return redirect('/pejabat')->with($pesan);
        }
    }

    public function isinomor(Request $req)
    {
        $d = Riset::find($req->iddata2);
        $d->nosurat = $req->nosurat;
        $d->save();
        $pesan = array(
            'message' => 'Nomor Surat Berhasil Di Isi',
            'alert-type' => 'success'
        );
        return back()->with($pesan);
    }

    public function updatenomor(Request $req)
    {
        $d = Riset::find($req->iddata3);
        $d->nosurat = $req->nosuratedit;
        $d->save();
        $pesan = array(
            'message' => 'Nomor Surat Berhasil Di Update',
            'alert-type' => 'success'
        );
        return back()->with($pesan);
    }

    public function beranda()
    {
        $data = Beranda::first();
        return view('backend.beranda', compact('data'));
    }


    public function updateberanda(Request $req, $id)
    {
        $data = Beranda::find($id);
        $data->judul = $req->judul;
        $data->deskripsi = $req->deskripsi;
        $data->save();

        $pesan = array(
            'message' => 'Beranda Berhasil Di Update',
            'alert-type' => 'success'
        );
        return back()->with($pesan);
    }

    public function galery($id)
    {
        $ormas = Ormas::where('id', $id)->get();
        $data = $ormas->map(function ($item) {
            $item->data = json_decode($item->data, true);
            return $item;
        })->first();
        $foto = $data->galery;

        return view('backend.ormas.galery', compact('data', 'foto'));
    }
}
