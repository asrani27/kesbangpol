@extends('layouts.master')

@push('add_css')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endpush

@section('konten')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Permohonan Rekomendasi Penelitian</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
    <form role="form" method="post" action={{route('admin.updateriset', $d->id)}} enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="box-body">
            
            <div class="form-group">
              <label>Nama Universitas/Lembaga/Perusahaan</label>
                <input type="text" class="form-control" name="universitas" value="{{$d->datas['universitas']}}">
            </div>
            <div class="form-group">
              <label>Nomor Surat</label>
              <input type="text" class="form-control" name="no_surat" value="{{$d->datas['no_surat']}}">
            </div>
            <div class="form-group">
              <label>Tanggal Surat</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right"  name="tgl_surat" id="datepicker" value="{{$d->datas['tgl_surat']}}">
              </div>
            </div>
            <!---- ----------------------------->
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="{{$d->datas['nama']}}">
            </div>
            <div class="form-group">
                <label>NIK/NIP/NIM/NPM</label>
                <input type="text" class="form-control"  name="nik" value="{{$d->datas['nik']}}">
            </div>
            <div class="form-group">
                <label>Alamat Rumah</label>
                <input type="text" class="form-control" name="alamat" value="{{$d->datas['alamat']}}">
            </div>
            <div class="form-group">
                <label>Telp/HP</label>
                <input type="text" class="form-control" maxlength="15" name="no_hp" value="{{$d->datas['no_hp']}}">
            </div>
            <div class="form-group">
                <label>Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan" value="{{$d->datas['pekerjaan']}}">
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" class="form-control" name="jurusan" value="{{$d->datas['jurusan']}}">
            </div>
            <div class="form-group">
                <label>Tujuan Penelitian (Sesuai Proposal Yang Anda Ajukan)</label>
                <input type="text" class="form-control" name="tujuan" value="{{$d->datas['tujuan']}}">
            </div>
            <div class="form-group">
                <label>Riset / Permintaan Data Dalam Rangka :</label>
                <input type="text" class="form-control" name="riset" value="{{$d->datas['riset']}}">
            </div>
            <div class="form-group">
                <label>Judul Skripsi / Makalah Penyuluhan / Tugas Akhir</label>
                <input type="text" class="form-control" name="judul" value="{{$d->datas['judul']}}">
            </div>
            <div class="form-group">
                <label>Penanggung Jawab</label>
                <input type="text" class="form-control" name="penanggung_jawab" value="{{$d->datas['penanggung_jawab']}}">
            </div>
            <div class="form-group">
                <label>Tempat/Objek Penelitian/Riset/Penyuluhan :</label>
                <input type="text" class="form-control" name="tempat" value="{{$d->datas['tempat']}}">
            </div>
            <div class="form-group">
                <label>Lama Waktu (MAKSIMAL 6 Bulan)</label>
                <select class="form-control" name="lama_waktu">
                  @if($d->datas['lama_waktu'] == "1")
                  <option value="1" selected>1 BULAN</option>
                  <option value="2" >2 BULAN</option>
                  <option value="3" >3 BULAN</option>
                  <option value="4" >4 BULAN</option>
                  <option value="5" >5 BULAN</option>
                  <option value="6" >6 BULAN</option>
                  @elseif($d->datas['lama_waktu'] == "2")
                  <option value="1" >1 BULAN</option>
                  <option value="2" selected>2 BULAN</option>
                  <option value="3" >3 BULAN</option>
                  <option value="4" >4 BULAN</option>
                  <option value="5" >5 BULAN</option>
                  <option value="6" >6 BULAN</option>
                  @elseif($d->datas['lama_waktu'] == "3")
                  <option value="1" >1 BULAN</option>
                  <option value="2" >2 BULAN</option>
                  <option value="3" selected>3 BULAN</option>
                  <option value="4" >4 BULAN</option>
                  <option value="5" >5 BULAN</option>
                  <option value="6" >6 BULAN</option>
                  @elseif($d->datas['lama_waktu'] == "4")
                  <option value="1" >1 BULAN</option>
                  <option value="2" >2 BULAN</option>
                  <option value="3" >3 BULAN</option>
                  <option value="4" selected>4 BULAN</option>
                  <option value="5" >5 BULAN</option>
                  <option value="6" >6 BULAN</option>
                  @elseif($d->datas['lama_waktu'] == "5")
                  <option value="1" >1 BULAN</option>
                  <option value="2" >2 BULAN</option>
                  <option value="3" >3 BULAN</option>
                  <option value="4" >4 BULAN</option>
                  <option value="5" selected>5 BULAN</option>
                  <option value="6" >6 BULAN</option>
                  @elseif($d->datas['lama_waktu'] == "6")
                  <option value="1" >1 BULAN</option>
                  <option value="2" >2 BULAN</option>
                  <option value="3" >3 BULAN</option>
                  <option value="4" >4 BULAN</option>
                  <option value="5" >5 BULAN</option>
                  <option value="6" selected>6 BULAN</option>
                  @endif
                </select>
            </div>
            {{-- <div class="form-group">
                <label>Tembusan (Nama Unit Kerja/SKPD Kota Banjarmasin Yang Menjadi Sumber Data)</label>
                <input type="text" class="form-control" name="tembusan" value="{{$d->datas['tembusan']}}">
            </div> --}}
            <div class="form-group">
                <label>Tembusan (Nama Unit Kerja/SKPD Kota Banjarmasin Yang Menjadi Sumber Data)<br />Jika Lebih Dari 1 Pisahkan Dengan Tanda "koma"</label>
                <input type="text" class="form-control" name="tembusan" required  value="{{$tembusan}}">
            </div>
            
            <div class="form-group">
              <label>Anggota TIM Penelitian<br />Jika Lebih Dari 1 Pisahkan Dengan Tanda "koma"</label>
              <input type="text" class="form-control" name="anggota" required value="{{$anggota}}">
            </div>
            
            <div class="form-group">
              <label>Upload File Proposal (Format PDF/Word)</label>
              <input type="file" name="file">
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('admin.riset')}}" class="btn btn-danger">Kembali</a>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection

@push('add_js')
<!-- bootstrap datepicker -->
<script src="{{url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
</script>
@endpush    