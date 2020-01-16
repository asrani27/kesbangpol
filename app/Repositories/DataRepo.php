<?php

namespace App\Repositories;
use App\Riset;
use DataTables;

class DataRepo{

    public function riset()
    {
        $riset = Riset::all();
        $data = $riset->map(function($item){
            $item->datas = json_decode($item->data, true);
            return $item;
        });
        //dd($data);
        return DataTables::of($data)
        ->addColumn('nomorsurat', function($dt){
            if($dt->nosurat == null)
            {
                return'<a class="btn btn-xs btn-primary isi-nomor" data-id="'.$dt->id.'" data-toggle="tooltip">Isi Nomor </a>';
            }
            else
            {
                return '<a class="btn btn-xs btn-default edit-nomor" data-id="'.$dt->id.'" data-nosurat="'.$dt->nosurat.'" data-toggle="tooltip"><b>'.$dt->nosurat.'</b></a>';
            }
           })
        ->addColumn('action', function($dt){
            if($dt->status == 'approved')
            {
                return'<a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>';
            }
            elseif($dt->status == 'cancel')
            {
                return'<a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>';
            }
            else {
                return'
                <a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>
                <a href="' . url('riset_admin/edit', $dt->id) .'" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                <a href="' . url('riset_admin/delete', $dt->id) .'" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus" onclick="return confirm(\'Yakin Ingin Menghapus Data Ini..?\')"><i class="fa fa-trash"></i> </a>
                ';   
            }
           })
        ->addColumn('labelStatus', function($dt){
            if($dt->status == 'pending')
            {
                return '<span class="badge bg-orange">Di Proses</span>';   
            }
            elseif($dt->status == 'revisi')
            {
                return '<span class="badge bg-aqua">Di Revisi</span>';
            }
            elseif($dt->status == 'approved')
            {
                return '<span class="badge bg-green">Di Terima</span>';
            }
            elseif($dt->status == 'cancel')
            {
                return '<span class="badge bg-red">Di Tolak</span>';
            }
        })
        ->addColumn('ubah',function($dt){
            return '<a class="ubah-status" data-id="'.$dt->id.'" data-status="'.$dt->status.'" data-keterangan="'.$dt->keterangan.'"><b>Ubah</b></a>';
        })
        ->addColumn('pdf', function($dt){
            return '<a href="' . url('riset_admin/pdf', $dt->id) .'" target="_blank"  data-toggle="tooltip" title="Cetak"><img src="'.url('assets/pdf.png').'"></a> <a href="' . url('storage', $dt->datas['file']) .'" target="_blank"  data-toggle="tooltip" title="Download Proposal"><img src="'.url('assets/downloads.png').'"></a> ';
        })
        ->addColumn('nopendaftaran', function($dt){
            return 'RISET0'.$dt->id;
        })
        ->rawColumns(['nomorsurat','action', 'ubah', 'pdf', 'labelStatus'])
        ->make(true);
    }

    public function proses()
    {
        $riset = Riset::all();
        $data = $riset->map(function($item){
            $item->datas = json_decode($item->data, true);
            return $item;
        })->where('status','pending');
        return DataTables::of($data)
        ->addColumn('nomorsurat', function($dt){
            if($dt->nosurat == null)
            {
                return'<a class="btn btn-xs btn-primary isi-nomor" data-id="'.$dt->id.'" data-toggle="tooltip">Isi Nomor </a>';
            }
            else
            {
                return '<a class="btn btn-xs btn-default edit-nomor" data-id="'.$dt->id.'" data-nosurat="'.$dt->nosurat.'" data-toggle="tooltip"><b>'.$dt->nosurat.'</b></a>';
            }
           })
        ->addColumn('action', function($dt){
            if($dt->status == 'approved')
            {
                return'<a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>';
            }
            elseif($dt->status == 'cancel')
            {
                return'<a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>';
            }
            else {
                return'
                <a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>
                <a href="' . url('riset_admin/edit', $dt->id) .'" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                <a href="' . url('riset_admin/delete', $dt->id) .'" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus" onclick="return confirm(\'Yakin Ingin Menghapus Data Ini..?\')"><i class="fa fa-trash"></i> </a>
                ';   
            }
           })
        ->addColumn('labelStatus', function($dt){
            if($dt->status == 'pending')
            {
                return '<span class="badge bg-orange">Di Proses</span>';   
            }
            elseif($dt->status == 'revisi')
            {
                return '<span class="badge bg-aqua">Di Revisi</span>';
            }
            elseif($dt->status == 'approved')
            {
                return '<span class="badge bg-green">Di Terima</span>';
            }
            elseif($dt->status == 'cancel')
            {
                return '<span class="badge bg-red">Di Tolak</span>';
            }
        })
        ->addColumn('ubah',function($dt){
            return '<a class="ubah-status" data-id="'.$dt->id.'" data-status="'.$dt->status.'" data-keterangan="'.$dt->keterangan.'"><b>Ubah</b></a>';
        })
        ->addColumn('pdf', function($dt){
            return '<a href="' . url('riset_admin/pdf', $dt->id) .'" target="_blank"  data-toggle="tooltip" title="Cetak"><img src="'.url('assets/pdf.png').'"></a> <a href="' . url('storage', $dt->datas['file']) .'" target="_blank"  data-toggle="tooltip" title="Download Proposal"><img src="'.url('assets/downloads.png').'"></a> ';
        })
        ->addColumn('nopendaftaran', function($dt){
            return 'RISET0'.$dt->id;
        })
        ->rawColumns(['nomorsurat','action', 'ubah', 'pdf', 'labelStatus'])
        ->make(true);
    }

    public function terima()
    {
        $riset = Riset::all();
        $data = $riset->map(function($item){
            $item->datas = json_decode($item->data, true);
            return $item;
        })->where('status','approved');
        return DataTables::of($data)
        ->addColumn('nomorsurat', function($dt){
            if($dt->nosurat == null)
            {
                return'<a class="btn btn-xs btn-primary isi-nomor" data-id="'.$dt->id.'" data-toggle="tooltip">Isi Nomor </a>';
            }
            else
            {
                return '<a class="btn btn-xs btn-default edit-nomor" data-id="'.$dt->id.'" data-nosurat="'.$dt->nosurat.'" data-toggle="tooltip"><b>'.$dt->nosurat.'</b></a>';
            }
           })
        ->addColumn('action', function($dt){
            if($dt->status == 'approved')
            {
                return'<a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>';
            }
            elseif($dt->status == 'cancel')
            {
                return'<a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>';
            }
            else {
                return'
                <a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>
                <a href="' . url('riset_admin/edit', $dt->id) .'" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                <a href="' . url('riset_admin/delete', $dt->id) .'" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus" onclick="return confirm(\'Yakin Ingin Menghapus Data Ini..?\')"><i class="fa fa-trash"></i> </a>
                ';   
            }
           })
        ->addColumn('labelStatus', function($dt){
            if($dt->status == 'pending')
            {
                return '<span class="badge bg-orange">Di Proses</span>';   
            }
            elseif($dt->status == 'revisi')
            {
                return '<span class="badge bg-aqua">Di Revisi</span>';
            }
            elseif($dt->status == 'approved')
            {
                return '<span class="badge bg-green">Di Terima</span>';
            }
            elseif($dt->status == 'cancel')
            {
                return '<span class="badge bg-red">Di Tolak</span>';
            }
        })
        ->addColumn('ubah',function($dt){
            return '<a class="ubah-status" data-id="'.$dt->id.'" data-status="'.$dt->status.'" data-keterangan="'.$dt->keterangan.'"><b>Ubah</b></a>';
        })
        ->addColumn('pdf', function($dt){
            return '<a href="' . url('riset_admin/pdf', $dt->id) .'" target="_blank"  data-toggle="tooltip" title="Cetak"><img src="'.url('assets/pdf.png').'"></a> <a href="' . url('storage', $dt->datas['file']) .'" target="_blank"  data-toggle="tooltip" title="Download Proposal"><img src="'.url('assets/downloads.png').'"></a> ';
        })
        ->addColumn('nopendaftaran', function($dt){
            return 'RISET0'.$dt->id;
        })
        ->rawColumns(['nomorsurat','action', 'ubah', 'pdf', 'labelStatus'])
        ->make(true);
    }

    public function revisi()
    {
        $riset = Riset::all();
        $data = $riset->map(function($item){
            $item->datas = json_decode($item->data, true);
            return $item;
        })->where('status','revisi');
        return DataTables::of($data)
        ->addColumn('nomorsurat', function($dt){
            if($dt->nosurat == null)
            {
                return'<a class="btn btn-xs btn-primary isi-nomor" data-id="'.$dt->id.'" data-toggle="tooltip">Isi Nomor </a>';
            }
            else
            {
                return '<a class="btn btn-xs btn-default edit-nomor" data-id="'.$dt->id.'" data-nosurat="'.$dt->nosurat.'" data-toggle="tooltip"><b>'.$dt->nosurat.'</b></a>';
            }
           })
        ->addColumn('action', function($dt){
            if($dt->status == 'approved')
            {
                return'<a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>';
            }
            elseif($dt->status == 'cancel')
            {
                return'<a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>';
            }
            else {
                return'
                <a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>
                <a href="' . url('riset_admin/edit', $dt->id) .'" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                <a href="' . url('riset_admin/delete', $dt->id) .'" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus" onclick="return confirm(\'Yakin Ingin Menghapus Data Ini..?\')"><i class="fa fa-trash"></i> </a>
                ';   
            }
           })
        ->addColumn('labelStatus', function($dt){
            if($dt->status == 'pending')
            {
                return '<span class="badge bg-orange">Di Proses</span>';   
            }
            elseif($dt->status == 'revisi')
            {
                return '<span class="badge bg-aqua">Di Revisi</span>';
            }
            elseif($dt->status == 'approved')
            {
                return '<span class="badge bg-green">Di Terima</span>';
            }
            elseif($dt->status == 'cancel')
            {
                return '<span class="badge bg-red">Di Tolak</span>';
            }
        })
        ->addColumn('ubah',function($dt){
            return '<a class="ubah-status" data-id="'.$dt->id.'" data-status="'.$dt->status.'" data-keterangan="'.$dt->keterangan.'"><b>Ubah</b></a>';
        })
        ->addColumn('pdf', function($dt){
            return '<a href="' . url('riset_admin/pdf', $dt->id) .'" target="_blank"  data-toggle="tooltip" title="Cetak"><img src="'.url('assets/pdf.png').'"></a> <a href="' . url('storage', $dt->datas['file']) .'" target="_blank"  data-toggle="tooltip" title="Download Proposal"><img src="'.url('assets/downloads.png').'"></a> ';
         })
         ->addColumn('nopendaftaran', function($dt){
             return 'RISET0'.$dt->id;
         })
         ->rawColumns(['nomorsurat','action', 'ubah', 'pdf', 'labelStatus'])
        ->make(true);
    }

    public function tolak()
    {
        $riset = Riset::all();
        $data = $riset->map(function($item){
            $item->datas = json_decode($item->data, true);
            return $item;
        })->where('status','cancel');
        return DataTables::of($data)
        ->addColumn('nomorsurat', function($dt){
            if($dt->nosurat == null)
            {
                return'<a class="btn btn-xs btn-primary isi-nomor" data-id="'.$dt->id.'" data-toggle="tooltip">Isi Nomor </a>';
            }
            else
            {
                return '<a class="btn btn-xs btn-default edit-nomor" data-id="'.$dt->id.'" data-nosurat="'.$dt->nosurat.'" data-toggle="tooltip"><b>'.$dt->nosurat.'</b></a>';
            }
           })
        ->addColumn('action', function($dt){
            if($dt->status == 'approved')
            {
                return'<a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>';
            }
            elseif($dt->status == 'cancel')
            {
                return'<a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>';
            }
            else {
                return'
                <a href="#" class="btn btn-xs btn-primary view-data" data-id="'.$dt->id.'" data-toggle="tooltip" title="View/Lihat"><i class="fa fa-eye"></i> </a>
                <a href="' . url('riset_admin/edit', $dt->id) .'" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                <a href="' . url('riset_admin/delete', $dt->id) .'" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus" onclick="return confirm(\'Yakin Ingin Menghapus Data Ini..?\')"><i class="fa fa-trash"></i> </a>
                ';   
            }
           })
        ->addColumn('labelStatus', function($dt){
            if($dt->status == 'pending')
            {
                return '<span class="badge bg-orange">Di Proses</span>';   
            }
            elseif($dt->status == 'revisi')
            {
                return '<span class="badge bg-aqua">Di Revisi</span>';
            }
            elseif($dt->status == 'approved')
            {
                return '<span class="badge bg-green">Di Terima</span>';
            }
            elseif($dt->status == 'cancel')
            {
                return '<span class="badge bg-red">Di Tolak</span>';
            }
        })
        ->addColumn('ubah',function($dt){
            return '<a class="ubah-status" data-id="'.$dt->id.'" data-status="'.$dt->status.'" data-keterangan="'.$dt->keterangan.'"><b>Ubah</b></a>';
        })
        ->addColumn('pdf', function($dt){
            return '<a href="' . url('riset_admin/pdf', $dt->id) .'" target="_blank"  data-toggle="tooltip" title="Cetak"><img src="'.url('assets/pdf.png').'"></a> <a href="' . url('storage', $dt->datas['file']) .'" target="_blank"  data-toggle="tooltip" title="Download Proposal"><img src="'.url('assets/downloads.png').'"></a> ';
        })
        ->addColumn('nopendaftaran', function($dt){
            return 'RISET0'.$dt->id;
        })
        ->rawColumns(['nomorsurat','action', 'ubah', 'pdf', 'labelStatus'])
        ->make(true);
    }
}