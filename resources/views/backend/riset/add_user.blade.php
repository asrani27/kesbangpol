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
          <h3 class="box-title">Permohonan Rekomendasi Penelitian</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action={{route('user.saveriset')}} enctype="multipart/form-data" >
          {{csrf_field()}}
          <div class="box-body">
            <div class="form-group">
              <label>Nama Universitas/Lembaga/Perusahaan</label>
              <input type="text" class="form-control" name="universitas" required>
            </div>
            <div class="form-group">
              <label>Nomor Surat</label>
              <input type="text" class="form-control" name="no_surat" required>
            </div>
            <div class="form-group">
              <label>Tanggal Surat</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right"  name="tgl_surat" id="datepicker" value={{\Carbon\Carbon::today()->format('m/d/Y')}}>
              </div>
            </div>
            <!---- ----------------------------->
            <div class="form-group">
                <label>Nama Pemohon</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>NIK/NIP/NIM/NPM</label>
                <input type="text" class="form-control"  name="nik" required>
            </div>
            <div class="form-group">
                <label>Alamat Rumah</label>
                <input type="text" class="form-control" name="alamat" required>
            </div>
            <div class="form-group">
                <label>Telp/HP</label>
                <input type="text" class="form-control" maxlength="15" name="no_hp" required>
            </div>
            <div class="form-group">
                <label>Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan"required>
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" class="form-control" name="jurusan" required>
            </div>
            <div class="form-group">
                <label>Tujuan Penelitian (Sesuai Proposal Yang Anda Ajukan)</label>
                <input type="text" class="form-control" name="tujuan" required>
            </div>
            <div class="form-group">
                <label>Riset / Permintaan Data Dalam Rangka :</label>
                <input type="text" class="form-control" name="riset" required>
            </div>
            <div class="form-group">
                <label>Judul Skripsi / Makalah Penyuluhan / Tugas Akhir</label>
                <input type="text" class="form-control" name="judul" required>
            </div>
            <div class="form-group">
                <label>Penanggung Jawab</label>
                <input type="text" class="form-control" name="penanggung_jawab" required>
            </div>
            <div class="form-group">
                <label>Tempat/Objek Penelitian/Riset/Penyuluhan :</label>
                <input type="text" class="form-control" name="tempat" required>
            </div>
            <div class="form-group">
                <label>Lama Waktu (MAKSIMAL 6 Bulan)</label>
                <select class="form-control" name="lama_waktu">
                    <option value="1" selected>1 BULAN</option>
                    <option value="2" >2 BULAN</option>
                    <option value="3" >3 BULAN</option>
                    <option value="4" >4 BULAN</option>
                    <option value="5" >5 BULAN</option>
                    <option value="6" >6 BULAN</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tembusan (Nama Unit Kerja/SKPD Kota Banjarmasin Yang Menjadi Sumber Data)<br />Jika Lebih Dari 1 Pisahkan Dengan Tanda "koma"</label>
                <input type="text" class="form-control" name="tembusan" required  placeholder="Contoh : Diskominfo, BKD, Kesbangpol, Dinkes, Disdik">
            </div>
            
            <div class="form-group">
              <label>Anggota TIM Penelitian<br />Jika Lebih Dari 1 Pisahkan Dengan Tanda "koma"</label>
              <input type="text" class="form-control" name="anggota" required placeholder="Contoh : Aldi, Angga, Zakir">
            </div>

            <div class="form-group">
                <label>Upload File Proposal dan Surat Pengantar Dari Kampus (untuk skripsi)</label><br>
                <label>Upload Surat Pengantar Dari Kampus (untuk Pra Penelitian)</label>
                <input type="file" name="file" required>
            </div>
            
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('user.riset')}}" class="btn btn-danger">Kembali</a>
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